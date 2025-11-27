<?php

namespace App\Http\Controllers;

use App\Models\Query;
use App\Models\LocalSession;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Facility;

class ApiController extends Controller
{
    public function getSessionData(Request $request){
        $sessionData = $request->session()->all();
        return response()->json($sessionData);
    }

    public function getDataFromDW(Request $request){
       $startDate = $request->start_date;
         $endDate = $request->end_date;
         $hfrcode = 'all';
         
         if($request->has('start_date') && $request->has('end_date')){
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
         }
         if($request->has('hfrcode')){
            $hfrcode = $request->input('hfrcode');
         }
        $queryId = $request->id;
        $query = Query::find($queryId);
        //replase params in query
        if($query){
            $queryString = base64_decode($query->sql_statement);
           $queryString =  str_replace("@param1", "'".$startDate."'", $queryString);
           $queryString =  str_replace("@param2", "'".$endDate."'", $queryString);
           $queryString =  str_replace("@hfrcode", "'".$hfrcode."'", $queryString);
        }
        

        //using curl to get data from data warehouse api http://qi-mis.org:8080/api/runquery/v2
        $api = "http://qi-mis.org:8080/api/runquery/v2";
        $postData = [
            'Query' => $queryString,
            'format' => 'json'
        ];
        $ch = curl_init($api);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        $response = curl_exec($ch);
        // Avoid calling curl_close on CurlHandle objects (deprecated); only close if it's a resource
        if (is_resource($ch)) {
            curl_close($ch);
        } else {
            unset($ch);
        }
        
        $data = json_decode($response, true);
        return response()->json(['data' => $data, 'dataType' => $query->graph_type ?? 'table', 'resposnse' => $response]);
    }

    function getFacilitiesByRegion(Request $request){
        $region = $request->input('region');
        if($region && $region !== 'all'){
            $facilities = Facility::where('snu_region', $region)->orderBy('facility_name')->get();
        }else{
            $facilities = Facility::orderBy('facility_name')->get();
        }
        return response()->json($facilities);
    }

    function getCouncilsByRegion(Request $request){
        $region = $request->input('region');
        if($region && $region !== 'all'){
            $councils = Facility::getCouncils($region);
        }else{
            $councils = Facility::select('psnu_council')
                ->distinct()
                ->orderBy('psnu_council')
                ->get();
        }
        return response()->json($councils);
    }

    function getFacilitiesByRegionAndCouncil(Request $request){
        $region = $request->input('region');
        $council = $request->input('council');
        $query = Facility::query();

        if($region && $region !== 'all'){
            $query->where('snu_region', $region);
        }

        if($council && $council !== 'all'){
            $query->where('psnu_council', $council);
        }

        $facilities = $query->orderBy('facility_name')->get();
        return response()->json($facilities);
    }
}

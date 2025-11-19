<?php

namespace App\Http\Controllers;

use App\Models\Query;
use App\Models\LocalSession;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ApiController extends Controller
{
    public function getSessionData(Request $request){
        $sessionData = $request->session()->all();
        return response()->json($sessionData);
    }

    public function getDataFromDW(Request $request){
       $startDate = '2025-10-01';
         $endDate = '2025-10-02';
        $queryId = $request->id;
        $query = Query::find($queryId);
        //replase params in query
        if($query){
            $queryString = base64_decode($query->sql_statement);
           $queryString =  str_replace("@param1", "'".$startDate."'", $queryString);
           $queryString =  str_replace("@param2", "'".$endDate."'", $queryString);
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
        curl_close($ch);

        $data = json_decode($response, true);
        return response()->json(['data' => $data, 'dataType' => $query->graph_type ?? 'table']);
    }
}

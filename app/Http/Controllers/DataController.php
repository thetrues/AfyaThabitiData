<?php

namespace App\Http\Controllers;

use App\Models\LocalSession;
use App\Models\Query;
use Illuminate\Http\Request;

class DataController extends Controller
{
  public function index(Request $request){
        $localSession = new LocalSession();
        $localSession = $localSession->getFromSession();
        $queryId = $request->id;
        $query = Query::find($queryId);
        //replase params in query
        if($queryId && $localSession &&  $localSession['start_date'] &&  $localSession['end_date'] ){
        if($query){
            $queryString = base64_decode($query->sql_statement);
           $queryString =  str_replace("@param1", "'".$localSession['start_date']."'", $queryString);
           $queryString =  str_replace("@param2", "'".$localSession['end_date']."'", $queryString);
         //  $queryString =  str_replace("@param3", $localSession['param3'], $queryString);
        }
        
        return view('data.index', compact('localSession', 'query'));
      }else{
        return redirect()->route('dashboard')->with('error', 'Please set filter parameters first');
      }
    }


    public function filter(Request $request){
       // dd($request->all());
        //put to session
        $request->session()->put('filter_parameters', $request->all());
        $request->session()->save();
        //get session
        $localSession = new LocalSession();
        $data = $localSession->getFromSession();
        
        return Response()->json(['status' => 'success', 'message' => 'Filter parameters saved to session', 'data' => $data]);
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Query;
use Illuminate\Http\Request;
use App\Models\QueryCategory;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class QueryController extends Controller
{
    public function addQuery(Request $request){
        $categories = QueryCategory::all();
        return view('query.add', compact('categories'));
    }

    public function storeQuery(Request $request){

       // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sql_statement' => 'required|string',
            'keyword' => 'nullable|string|max:100',
            'query_category_id' => 'nullable|exists:query_categories,id'
        ]);

        $sql = base64_encode($request->sql_statement);

        \App\Models\Query::create([
            'name' => $request->name,
            'description' => $request->description,
            'sql_statement' => $sql,
            'keyword' => $request->keyword,
            'query_category_id' => $request->query_category,
            'is_active' => true,
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('query.list')->with('success', 'Query created successfully');
    }

    public function editQuery(Request $request){
        $categories = QueryCategory::all();
        $query = Query::findOrFail($request->id);
        return view('query.edit', compact('categories', 'query'));
    }

    public function listQuery(Request $request){

        $queries = \App\Models\Query::all();
        return view('query.list', compact('queries'));
    }

    public function deleteQuery(Request $request){
        //
    }

    public function categories(Request $request){
        $categories = QueryCategory::all();
        return view('query.categories', compact('categories'));
    }

    public function storeCategory(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        QueryCategory::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return Response()->json([
            'success'=> true,
            'message' => 'Category created successfully',
        ], Response::HTTP_CREATED);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Articles::latest()->get();
        if($data->isEmpty()){
            return Response()->json(["data"=>"there is no data","status"=>Response::HTTP_NO_CONTENT],Response::HTTP_OK);

        }else{
            return Response()->json(["data"=>$data,"status"=>Response::HTTP_ACCEPTED],Response::HTTP_OK);

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $name = $request->all('title','content','image');
         Articles::create( $request->all('title','content','image'));
        // Store the user...
 
        return $name;
        // $validator=Validator::Validate($request->all(),[
        //     "title"=>"requiead|string",
        //     "content"=>"requiead|text",
        //     "image"=>"requiead|string",
        
        // ]);
        // if($validator->fails()){
        //     return Response()->json(["data"=>$validator->errors(),"status"=>Response::HTTP_UNPROCESSABLE_ENTITY],Response::HTTP_OK);

        // }
        // else{
        //     $validator=$validator->validated();
         
            
            return Response()->json(["data"=>"success","status"=>Response::HTTP_CREATED],Response::HTTP_OK);

        

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $article=Articles::find($id);
        if($article!=null){
            return Response()->json(["data"=>$article,"status"=>Response::HTTP_FOUND],Response::HTTP_OK);
   
        }else{
            return Response()->json(["data"=>"article with id {$id} not exist","status"=>Response::HTTP_NOT_FOUND],Response::HTTP_OK);

        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Articles $articles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $name = $request->all('title','content','image');
       // Store the user...

    //    return $name;
        
        
        $article=Articles::find($id);
        if($article!=null){
        $article->update($name);
        // Articles::updated( $request->all('title','content','image'));

        // Articles::updated($article);
        return "updated";
   
        }else{
            return Response()->json(["data"=>"article with id {$id} not exist","status"=>Response::HTTP_NOT_FOUND],Response::HTTP_OK);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $article=Articles::find($id);
        if($article!=null){
        $article->delete();
        return "deleted";
   
        }else{
            return Response()->json(["data"=>"article with id {$id} not exist","status"=>Response::HTTP_NOT_FOUND],Response::HTTP_OK);

        }
    }
}

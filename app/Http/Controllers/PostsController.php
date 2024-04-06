<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class PostsController extends Controller
{

    public function index()
    {


        try {
            $Posts=Post::with("category","tag")->paginate(5);
            return view("layouts.articles",["posts"=>$Posts]);

        }catch (Exception $e){
            return view("layouts.articles")->with("error",$e);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {



        try {
            $Post=Post::where("id",$id)->with("category","tag")->get();
            return view("layouts.article",["post"=>$Post]);

        }catch (Exception $e){
            return view("layouts.articles")->with("error",$e);
        }


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    public function search(Request $request ){

        try {
            $tag=$request->input("tag");
            $category=$request->input("category");
            $date=$request->input("date");
            $query=$request->input("name");
            $Posts=Post::where("title","like","%{$query}%")
                ->whereDate(DB::raw('DATE(created_at)'), '=', $date)

                ->with("category","tag")->paginate(5);
            return view("layouts.articles",["posts"=>$Posts]);


        }
        catch(Exception $e){
            redirect()->route("layouts.articles")->with("error",$e);

        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

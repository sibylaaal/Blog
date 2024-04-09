<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Post;
use App\Models\tag;
use Illuminate\Http\Request;
use Mockery\Exception;

class blogscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        try {
            $Posts=Post::paginate(5);
            $categories=category::all();
            $tags=tag::all();
            return view("layouts.dashboard.main.blogs.index",["posts"=>$Posts,'categories'=>$categories,'tags'=>$tags]);

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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

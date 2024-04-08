<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Post;
use App\Models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class PostsController extends Controller
{

    public function index()
    {


        try {
            $Posts=Post::with("category","tag")->paginate(5);
            $categories=category::all();
            $tags=tag::all();
            return view("layouts.articles",["posts"=>$Posts,'categories'=>$categories,'tags'=>$tags]);

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
    public function search(Request $request)
    {
        try {
            $tag = $request->input("tag");
            $category = $request->input("category");
            $date = $request->input("date");
            $query = $request->input("name");

            $queryBuilder = Post::query();

            if (!empty($query)) {
                $queryBuilder->where("title", "like", "%{$query}%");
            }

            if (!empty($date)) {
                $queryBuilder->whereDate('created_at', '=', $date);
            }

            // Include tag and category relationships
            $queryBuilder->with("category", "tag");

            // Paginate the results
            $posts = $queryBuilder->paginate(5);

            $categories=category::all();
            $tags=tag::all();
            return view("layouts.articles",["posts"=>$posts,'categories'=>$categories,'tags'=>$tags]);        } catch (Exception $e) {
            // Redirect with error message
            return redirect()->route("layouts.articles")->withErrors([$e->getMessage()]);
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

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\comment;
use App\Models\Post;
use App\Models\tag;
use Illuminate\Http\Request;
use Mockery\Exception;

class commentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        try {

            if (auth()->user()->role=="admin"){

                $comments=comment::paginate(5);
            }
            else{
                $comments=comment::where("user_id",auth()->user()->id)->paginate(5);
            }

            return view("layouts.dashboard.main.comment.index",["comments"=>$comments]);

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

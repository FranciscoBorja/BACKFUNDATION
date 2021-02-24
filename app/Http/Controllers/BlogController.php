<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'error' => false,
            'blog'  => blog::all(),
        ], 200);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'image'=> 'required',
            'link'=> 'required',
        ]);

        $blog = new blog;
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->image = $request->input('image');
        $blog->link = $request->input('link');
      

        $blog->save();
        return response()->json([
                'error'=> false,
                'blog' => $blog
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = blog::findOrFail($id);
        return response()->json([
            'data' =>[
                'blog' => $blog
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(blog $blog)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=> 'required',
            'description'=> 'required',
            'image'=> 'required',
            'link'=> 'required',
        ]);
        $blog = blog::find($id);

        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->image = $request->input('image');
        $blog->link = $request->input('link');
        $blog->save();
        return response()->json([
                'error'=> false,
                'blog' => $blog
        ], 201);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog $blog,$id)
    {
        $blog = blog::findOrFail($id);
        $blog->delete();
        return response()->json(['message'=>'Blog quitado', 'Blog'=>$blog],200);
    }
}

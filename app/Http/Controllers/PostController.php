<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
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
            'category_id' => 'required|integer',
            'date' => 'required|date_format:d-m-Y',
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = new Post();
        $post->category_id = $request->input('category_id');
        // Convert date from input DD-MM-YYYY to DB format
        $post->date = Carbon::createFromFormat('d-m-Y', $request->input('date'));
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        
        // Save and upload file/image
        // check if uploaded file is valid file
        if($request->hasFile('image')){
            // Set destination file
            $destination = 'uploads/images/';

            // Get original file name
            $file_name = $request->file('image')->getClientOriginalName();

            // move upload file to destination folder with file name
            $request->file('image')->move($destination, $file_name);

            // Save addres file in db as string
            $post->image = $destination . $file_name;
        }

        $post->save();
        $post->tags()->sync($request->input('tags'));

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|integer',
            'date' => 'required|date_format:d-m-Y',
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::find($id);
        $post->category_id = $request->input('category_id');
        // Convert date from input DD-MM-YYYY to DB format
        $post->date = Carbon::createFromFormat('d-m-Y', $request->input('date'));
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        
        // Save and upload file/image
        // check if uploaded file is valid file
        if($request->hasFile('image')){
            // Set destination file
            $destination = 'uploads/images/';

            // Get original file name
            $file_name = $request->file('image')->getClientOriginalName();

            // move upload file to destination folder with file name
            $request->file('image')->move($destination, $file_name);

            // Save addres file in db as string
            $post->image = $destination . $file_name;
        }

        $post->save();
        $post->tags()->sync($request->input('tags'));

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        // delete record dalam pivot table dahulu
        $post->tags()->detach();
        // and then, baru delete record dalam table post
        $post->delete();
        return redirect()->route('posts.index');
    }
}

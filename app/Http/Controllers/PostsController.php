<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.posts.index')->with('posts', Post::all());
    }

    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('trashed', $trashed);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Iki gawe cek nek data kategori sek kosong pas gawe post anyar.
        $categories = Category::all();
        if($categories->count()==0){
            return redirect()->back();
        }
        return view('admin.posts.create')->with('categories', $categories)->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request->all());

        $this->validate($request, [
            'title' => 'required',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
        ]);

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/posts', $featured_new_name);


        $post = Post::create([
            'title' => $request->title,
            'featured' => 'uploads/posts/' . $featured_new_name,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title)
        ]);

        $post->tags()->attach($request->tags);

        return redirect()->back();

        //dd($request->all());

        // $post = new Post;
        // $post->title = $request->title;
        // $post->featured = $request->featured;
        // $post->content = $request->content;
        //$post->save();


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
        //
        $post = Post::find($id);
        return view('admin.posts.edit')->with('post', $post)->with('categories', Category::all())->with('tags', Tag::all());
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
        //
        $post = Post::find($id);

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
            
        ]);

        if($request->hasFile('featured')){
            $featured = $request->featured;

            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads/posts', $featured_new_name);

            $post->featured = 'uploads/posts/' . $featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();
        $post->tags()->sync($request->tags);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);

        $post->delete();

        return redirect()->back();
    }
    
    public function kill($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        //dd($post->all());
        $post->forceDelete();

        return redirect()->back();
    }
    
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        //dd($post->all());
        $post->restore();

        return redirect()->back();
    }
}

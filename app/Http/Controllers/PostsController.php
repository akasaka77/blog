<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;
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
        $posts = Post::all();

        return view('admin.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $tags = Tag::all();

        if($categories->count() == 0 || $tags->count() == 0){
            Session::flash('info', 'You have to create a category and a tag before attempting to create a new post.');

            return redirect()->route('home', []);
        }


        return view('admin.posts.create')->with('categories', $categories)
                                        ->with('tags', $tags);
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
        $this->validate($request, [
            'title' => 'required',
            'featured' => 'required|image',
            'content_post' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
        ]);

        $featured = $request->featured;

        $featured_new_name = time(). " - " .$featured->getClientOriginalName();

        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create([
            'title' => $request->title,
            'content_post' => $request->content_post,
            'featured' => 'uploads/posts/'.$featured_new_name,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title),
            'user_id' => Auth::id(),
        ]);
//        Mass asignment can be usedd by make $fillable on the Model in this case post

        $post->tags()->attach($request->tags);

        Session::flash('success', 'You have successfully created a post');

        return redirect()->route('posts', []);
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
        $categories = Category::all();
        $tags = Tag::all();

        $post = Post::find($id);

//        if($categories->count() == 0){
//            Session::flash('info', 'You have to create a category before attempting to create a new post.');
//
//            return redirect()->route('category.create', []);
//        }


        return view('admin.posts.edit')->with('post', $post)
                                    ->with('categories', $categories)
                                    ->with('tags', $tags);
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


        $this->validate($request, [
            'title' => 'required',
            'content_post' => 'required',
            'category_id' => 'required',
        ]);

        $post = Post::find($id);



        if($request->hasFile('featured')){
            $featured = $request->featured;

            $featured_new_name = time(). " - " .$featured->getClientOriginalName();

            $featured->move('uploads/posts', $featured_new_name);

            $post->featured = 'uploads/posts/' . $featured_new_name;

        }

        $post->title = $request->title;
        $post->content_post = $request->content_post;
        $post->category_id = $request->category_id;
        $post->slug = str_slug($request->title);

        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('success', 'Post has been edited.');


        return redirect()->route('posts', []);
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

        Session::flash('success', 'The post has been trashed.');

        return redirect()->back();
    }

    public function trashed(){
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts', $posts);
    }

    public function kill($id){
        $post = Post::withTrashed()->where('id', $id)->first();

        if(file_exists($post->getOriginal('featured'))){
            @unlink($post->getOriginal('featured'));
        }


        $post->forceDelete();

        Session::flash('success', 'Post deleted permanently.');

        return redirect()->back();
    }

    public function restore($id){
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();

        Session::flash('success', 'Post has been restore.');

        return redirect()->route('posts');
    }
}

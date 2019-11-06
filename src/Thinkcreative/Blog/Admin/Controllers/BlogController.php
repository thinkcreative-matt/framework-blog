<?php 

namespace Thinkcreative\Blog\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Thinkcreative\Blog\Http\Requests\StoreBlogPost;
use Thinkcreative\Blog\Blog;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //  Do nothing and send back the results
        return view('admin-blog::index', [
            'posts' => Blog::all()
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Blog();
        return view('admin-blog::create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {   
        $post = new Blog;

        // Testing
        // @todo: change to the authenticated user
        $post->user_id = 1;
        // $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->intro = $request->intro;
        $post->body  = $request->body;
        $post->status = $request->status;

        $post->published_at = $request->published_at;

        try {

            $post->save();
            Log::debug("New post, {$request->title}, created");
            flash("New post, {$request->title}, created")->success(); 

        } catch(QueryException $e) {
            Log::error('Create Blog -- ' . $e);
            flash('Something went wrong. Please try again')->error();
        }

        return redirect()->route('admin.blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $post = Blog::where('slug', $slug)->first();
        return view('admin-blog::show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Blog::where('slug', $slug)->first();

        if(is_null($post)) 
        {
            // we dont have that blog post available to edit. 
            abort(404, 'weird... This blog post isn\'t available.');
        }
        
        return view('admin-blog::edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBlogPost $request, $slug)
    {
        $post = Blog::where('slug', $slug)->first();

        // Testing
        // @todo: change to the authenticated user
        $post->user_id = 1;
        // $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->intro = $request->intro;
        $post->body  = $request->body;
        $post->status = $request->status;

        $post->published_at = $request->published_at;

        try {

            $post->save();
            Log::debug("{$request->title} updated");
            flash("Post, {$request->title}, updated")->success(); 

        } catch(QueryException $e) {
            Log::error('Update Blog -- ' . $e);
            flash("Something went wrong. Please try again")->error();
        }

        return redirect()->route('admin.blog.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Blog::where('slug', $slug)->firstOrFail();

        try {

            $post->delete();
            Log::debug("{$post->title} deleted");
            flash("Post, {$post->title}, deleted")->error(); 

        } catch(QueryException $e) {
            Log::error('Deleted Blog -- ' . $e);
            flash("Something went wrong. Please try again")->warning();
        }

        return redirect()->route('admin.blog.index');
        
    }
}

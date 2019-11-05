<?php 

namespace Thinkcreative\Blog\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Thinkcreative\Blog\Http\Requests\StoreBlogPost;
use Thinkcreative\Blog\Blog;

use Illuminate\Support\Facades\Validator;

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
        // dd(resource_path());
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
        $post->user_id = 1;
        // $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->intro = $request->intro;
        $post->body  = $request->body;
        $post->status = $request->status;

        $post->published_at = $request->published_at;

        if ($post->save() )
        {
            flash('success', 'New post, {$request->title}, created');    
        } else {
            flash('danger','Something went wrong. Please try again');
        }

        return route('admin.blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        dd($post);

        abort(404, 'No need to show. Try something different.');
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
    public function update(Request $request, $id)
    {
        //
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
        dd('delete');
    }
}

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
        // dump($request);

        // $request->validate([
        //     'title' => 'required|max:100|',
        //     'slug' => 'unique:blog',
        //     'intro' => 'required|max:255',
        //     'body' => 'required|min:50',
        //     'status' => 'required|in:draft,published,unpublished'
        // ]);

        // dd($request->validated);
        // $validated = $request->validated();
        // dd($validated);
        // dd( new StoreBlogPost() );
        //
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

<?php 

namespace Thinkcreative\Blog\Controllers;

use App\Http\Controllers\Controller;
use Thinkcreative\Blog\Blog;
use Thinkcreative\Blog\BlogOptions;

class BlogController extends Controller {


    /**
     * WE only need to disply the blog
     * @return [Array] [return a collection of blog posts]
     */
    public function index() 
    {


        $bo = new BlogOptions;

        $query = Blog::query();

        $query->orderBy($bo->getOrderBy(), $bo->getOrderDir());
        
        return view('blog::blog', [
            'posts' => $query->get()
        ]);

    }

    /**
     * Show the individual blog post
     * @return [Array] [A single collection of the requested blog post]
     */
    public function show($slug)
    {

        $blog = Blog::where('slug', $slug)->first();

        return view('blog::single', [
            'post' => $blog
        ]);
    }

}
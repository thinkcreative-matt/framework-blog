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

    	dd( new BlogOptions::all() );

        return 'Think!Creative';

    }

    /**
     * Show the individual blog post
     * @return [Array] [A single collection of the requested blog post]
     */
    public function show(Blog $post)
    {

    }

}
<?php 

namespace Thinkcreative\Blog\Controllers;

use App\Http\Controllers\Controller;
use Thinkcreative\Blog;

class BlogController extends Controller {


	/**
	 * WE only need to disply the blog
	 * @return [Array] [return a collection of blog posts]
	 */
    public function index() 
    {

        return 'Think!';

    }

    /**
     * Show the individual blog post
     * @return [Array] [A single collection of the requested blog post]
     */
    public function show(Blog $post)
    {

    }

}
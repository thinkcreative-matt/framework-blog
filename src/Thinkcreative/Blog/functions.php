<?php 

if(! function_exists('blog')) {
	// Aloow people to just call all the defaults for the blog. 
	function blog() 
	{
		// Load up a new instance of  
		// whatever your alias is. 
		$blog = app('blog');

		$blog->all()->dd();

	}
}
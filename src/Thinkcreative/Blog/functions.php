<?php 

if(! function_exists('default_blog')) {
	// Aloow people to just call all the defaults for the blog. 
	function blog() 
	{
		// Load up a new instance of  
		// whatever your alias is. 
		$blog = app('blog');

		dd($whatever);

		return '1-0';

	}
}
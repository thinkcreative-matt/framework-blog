<?php 

if(! function_exists('score')) {

	function score() 
	{
		// Load up a new instance of  
		// whatever your alias is. 
		$whatever = app('blankz');

		dd($whatever);

		return '1-0';

	}
}
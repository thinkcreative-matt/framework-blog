<?php 

namespace Thinkcreative\Blankpackage;

class Blank 
{

	/**
	 * Returns a word, or defaults to hello 
	 * @param string $word [override the default word returned]
	 * @return string 
	 */

	public function Hello($word = NULL)
	{

		if( is_null($word) ) 
			return 'hello';

		return $word;

	}	
}
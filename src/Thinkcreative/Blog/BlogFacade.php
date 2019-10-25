<?php 

namespace Thinkcreative\Blog;

use Illuminate\Suppoort\Facades\Facade;

class BlogFacade extends Facade
{

	protected static function getFacadeAccessor()
	{
		return 'blog';
	}

}

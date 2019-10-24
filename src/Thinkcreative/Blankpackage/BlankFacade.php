<?php 

namespace Thinkcreative\Blankpackage;

use Illuminate\Suppoort\Facades\Facade;

class BlankFacade extends Facade
{

	protected static function getFacadeAccessor()
	{
		return 'blankz';
	}

}

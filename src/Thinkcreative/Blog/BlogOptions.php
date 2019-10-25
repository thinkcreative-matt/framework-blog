<?php 

namespace Thinkcreative\Blog;

use Illuminate\Database\Eloquent\Model;

class BlogOptions extends Model
{

	/**
	 * Set the default blog admin table to be `blog`
	 * @var string
	 */
	protected $table = 'blog_options';

	/**
	 * $order - Which direction to order the $order by as
	 * @var string
	 */
	private $order = 'DESC';

	/**
	 * $order_by - the default column to order by
	 * @var string
	 */
	private $order_by = 'published_at';

	public function __construct() 
	{
		// dd($this);

	}

	public function getOrderAttribute() 
	{
		
		if( is_null($this->order_by))


			return $this->order_by;

	}


}
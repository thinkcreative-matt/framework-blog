<?php 

namespace Thinkcreative\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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
	private $order_dir = 'DESC';

	/**
	 * $order_by - the default column to order by
	 * @var string
	 */
	private $order_by = 'published_at';

	/**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();


        // we only ever want one results. 
        static::addGlobalScope('id', function (Builder $builder) {
            $builder->where('id', '=', 1);
        });
    }

    public function getOrderBy() {

    	$bo = BlogOptions::first();

    	if( is_null($bo) ) 
    	{	
    		return $this->order_by;
    	}
    	return $bo->order_by;

    }

    public function getOrderDir() {

    	$bo = BlogOptions::first();

    	if( is_null($bo) ) 
    	{
    		return $this->order_dir;
    	}
    	return $bo->order_dir;
    }


}
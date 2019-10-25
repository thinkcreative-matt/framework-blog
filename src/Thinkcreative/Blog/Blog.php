<?php 

namespace Thinkcreative\Blog;

class Blog extends Model
{

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

	/**
	 * Set the default blog post table to be `blog`
	 * @var string
	 */
	protected $table = 'blog';

	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
	    return 'slug';
	}

	public function setSlugAttribute($value)
	{

		if(is_null($value))
        {
            return $this->attributes['slug'] = Str::slug($this->attributes['name']);
        } else {
            return $this->attributes['slug'] = Str::slug($value);
        }
		
	}



}
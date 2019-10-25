<?php 

namespace Thinkcreative\Blog;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

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
<?php 

namespace Thinkcreative\Blog;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;

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

	public function getPublishedAtDateAttribute() 
	{

		$date = Carbon::create($this->published_at);

		return $date->format('l jS \\of F Y h:i:s A'); 

	}

	public function getLimitedBodyAttribute() 
	{

		return Str::limit($this->body, 100);

	}


}
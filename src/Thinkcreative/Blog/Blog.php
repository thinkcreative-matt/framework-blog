<?php 

namespace Thinkcreative\Blog;

use App\User;
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

	protected $dates = ['published_at'];

	protected $fillable = ['title', 'slug', 'intro', 'body', 'status'];

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
            return $this->attributes['slug'] = Str::slug($this->attributes['title']);
        } else {
            return $this->attributes['slug'] = Str::slug($value);
        }
		
	}

	public function setPublishedAtAttribute($value)
	{
		if($this->status == 'published' && is_null($this->published_at) )
		{
			return $value = Carbon::now();

		} else if($this->status != 'published' && is_null($this->published_at))
		{
			return null;

		}

		return $this->published_at;
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

	public function getStatusColorAttribute() {

		switch ($this->status) {
			case 'published':
				$color = 'success';
				break;
			case 'unpublished':
				$color = 'warning';
				break;
			case 'draft':
				$color = 'info';
				break;
			default:
				$color = 'danger';
				break;
		}

		return $color;

	}

	public function user() {
		return $this->belongsTo('App\User');
	}

}
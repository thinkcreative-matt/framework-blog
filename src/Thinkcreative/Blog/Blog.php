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
	private $table = 'blog';




}
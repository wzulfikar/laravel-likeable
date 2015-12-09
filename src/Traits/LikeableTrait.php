<?php 

namespace App\Libraries\Likeable;

trait LikeableTrait{
	/**
	 * Get all of the likes for the campaign comment.
	 *
	 * @return collection
	 */
	public function likes()
	{
	  return $this->morphMany(Like::class, 'likeable');
	}
}
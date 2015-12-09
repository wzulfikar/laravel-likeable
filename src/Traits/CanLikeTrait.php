<?php 

namespace App\Libraries\Likeable;

trait CanLikeTrait{

	/**
	 * add given likeable model to user's likes
	 * 
	 * @param  model   $likeable model that uses LikeableTrait
	 * @return boolean
	 */
	public function like($likeable)
	{
	  $like = new Like();
	  $like->user_id = $this->id;

	  return $likeable->likes()->save($like) ? true : false;
	}

	/**
	 * remove given likeable model from user's likes
	 * 
	 * @param  model   $likeable model that uses LikeableTrait
	 * @return boolean
	 */
	public function undoLike($likeable)
	{
	  return $likeable->likes()->where('user_id',$this->id)->delete() > 0;
	}

	/**
	 * check if a given likeable model is in liked by the user
	 * 
	 * @param  model    model that uses LikeableTrait
	 * @return boolean
	 */
	public function liked($likeable)
	{
	  if(! is_null($likes = $likeable->likes) ){
	    return in_array($this->id, $likes->lists('user_id')->toArray());
	  }
	  return false;
	}
}
<?php

namespace App\Libraries\Likeable;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
  /**
   * Get all of the owning likeable models.
   */
  public function likeable()
  {
      return $this->morphTo();
  }
}

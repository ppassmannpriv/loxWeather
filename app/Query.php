<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
  //Mass assignable attributes
  protected $fillable = ['decription', 'request_uri', 'response_json', 'location', 'user_id', 'date'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}

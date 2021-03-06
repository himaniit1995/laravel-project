<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
   
   protected $fillable = ['commentbody','post_id'];

   public function post(){

   	return $this->belongsTo(Post::class);
   }
}

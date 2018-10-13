<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model

{
   protected $table = 'posts';
   
   protected $fillable = ['title', 'body' ,'image'];

// Relationships Concept in Laravel


   public function comments()

   {
		return $this->hasMany(Comment::class);
   }
}




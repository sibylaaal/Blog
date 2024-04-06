<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

   public function User()
   {
       return $this->belongsTo(User::class);
   }
   public  function  Comment()
   {
       return $this->hasMany(comment::class,'post_id');
   }
    public  function  category()
    {
        return $this->belongsTo(category::class);

    }
public  function  tag()
{
    return $this->belongsTo(tag::class);

}

}

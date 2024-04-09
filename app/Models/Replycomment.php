<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replycomment extends Model
{
    use HasFactory;


public  function  comment()
{

    return $this->belongsTo(comment::class);
}

public  function  User()
{
    return $this->belongsTo(User::class);
}


}

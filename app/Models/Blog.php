<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    // use SoftDeletes;
    use HasFactory;
    protected $fillable = ['title', 'body', 'image','user_id'];
    function user(){
        return $this->belongsTo(User::class);
    }
}

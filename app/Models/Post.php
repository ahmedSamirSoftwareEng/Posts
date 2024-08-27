<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    use SoftDeletes;
    
    protected $fillable=[
        'title',
        'description',
        'image',
        'user_id'
    ];
    protected $dates = ['deleted_at'];

    function user(){
        return $this->belongsTo(User::class);
    }
}

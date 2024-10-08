<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Http\Controllers\Api\PostController;

class Post extends Model
{
    use HasFactory;

    use SoftDeletes, Sluggable;

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
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'likes',
    ];

    protected $withCount =['likes'];

       //eager loading every the post model is used it will use user and comments relations by default
       //if u dont want in some pages u can use without function ex.without('user)
       protected $with = ['user:id,name,image','comments.user'];

    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class,'like_post')->withTimestamps();
    }


    //Local Scope
    public function scopeSearch($query,$search)
    {
        $query->where('content','like', '%'. $search. '%');
    }

}

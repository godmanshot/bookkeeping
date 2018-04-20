<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $fillable = ['title', 'description', 'body', 'img', 'slug', 'user_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function shortText($count = 100) {
    	return strip_tags(mb_strimwidth($this->body, 0, $count, "..."));
    }

    public function createTime() {
    	return $this->created_at->diffForHumans();
    }

    public function path() {
    	return route('posts.one', [$this]);
    }

    public function imgPath() {
        return asset('storage/'.$this->img);
    }
    
    public function owner() {
         return $this->belongsTo(User::class, 'user_id');
    }
    
    public function ownerName() {
         return $this->owner->name;
    }

    public function imgMiniPath() {
        return asset('storage/'.str_replace(".jpeg", "", $this->img).'-min.jpeg');
    }
}

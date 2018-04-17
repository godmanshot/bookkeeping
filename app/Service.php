<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $fillable = ['name', 'img', 'body', 'price', 'slug'];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function shortText($count = 100) {
    	return strip_tags(mb_strimwidth($this->body, 0, $count, "..."));
    }

    public function path() {
    	return route('services.one', [$this]);
    }

    public function imgPath() {
        return asset('storage/'.$this->img);
    }

    public function imgMiniPath() {
        return asset('storage/'.str_replace(".jpeg", "", $this->img).'-min.jpeg');
    }

    public function price() {
        return 'от '.$this->price.' тг.';
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public $fillable = ['img'];
	
    public function imgPath() {
        return asset('storage/'.$this->img);
    }

    public function imgMiniPath() {
        return asset('storage/'.str_replace(".jpeg", "", $this->img).'-min.jpeg');
    }
}

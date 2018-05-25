<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public $fillable = ['url', 'title', 'content'];
    
	public function getRefAttribute()
	{
		return url($this->url);
	}
}

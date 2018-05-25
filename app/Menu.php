<?php

namespace App;

use App\Page;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	public $fillable = ['url', 'title', 'page_id', 'place'];

	public $childs = [];
	public $parent;

	public function getRefAttribute()
	{
		if($this->page_id === null && empty($this->url))
			return "javascript:void(0)";
		
		if($this->page_id === null && !empty($this->url))
			return url($this->url);

		if($this->page_id !== null)
			return $this->page->ref;
	}
	
	public function page()
	{
		return $this->belongsTo(Page::class);
	}
}

<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class AboutController extends Controller
{
	public function index()
	{
		$page = Page::where('title', 'О нас')->firstOrFail();
		
		return view('page', compact('page'));
	}
}

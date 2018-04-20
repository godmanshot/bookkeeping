<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class SharesController extends Controller
{
	public function index()
	{
		$page = Page::where('title', 'Акции')->firstOrFail();
		
		return view('page', compact('page'));
	}
}

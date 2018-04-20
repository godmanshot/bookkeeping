<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class OfferController extends Controller
{
	public function index()
	{
		$page = Page::where('title', 'Оферта')->firstOrFail();
		
		return view('page', compact('page'));
	}
}

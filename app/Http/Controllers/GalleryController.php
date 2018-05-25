<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
	function index()
	{
		$photos = Gallery::latest()->get();
		return view('gallery.index', compact('photos'));
	}
}

<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
	public function index()
	{
		$page = Page::where('title', 'Контакты')->firstOrFail();
		
		return view('contacts.index', compact('page'));
	}
}

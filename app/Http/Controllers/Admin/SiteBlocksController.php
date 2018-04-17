<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteBlocksController extends Controller
{
	public function index() {
		return view('admin.blocks.index');
	}


	public function store(Request $request) {

		$site_settings = resolve('site-block');

		foreach($site_settings->getInstance() as $idx => $val)
		{
        	$site_settings->$idx = $request->$idx;
		}

        $site_settings->save();

        return back();
	}
}

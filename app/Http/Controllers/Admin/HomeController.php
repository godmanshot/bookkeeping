<?php

namespace App\Http\Controllers\Admin;

use App\Call;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
	public function index() {
		return view('admin.index');
	}
}

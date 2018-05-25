<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Menu;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::orderBy('place')->get();
        return view('admin.menu.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::all();
        return view('admin.menu.create', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'place' => 'required',
        ]);

        $menu = Menu::create([
            'url' => !empty($request->input('url')) ? $request->input('url') : '',
            'title' => $request->title,
            'page_id' => !empty($request->input('page_id')) ? $request->input('page_id') : null,
            'place' => $request->place,
        ]);

        return redirect()->route('admin.menu');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $pages = Page::all();
        return view('admin.menu.edit', compact('menu', 'pages'));
    }

    // *
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\menu  $menu
    //  * @return \Illuminate\Http\Response
     
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'title' => 'required',
            'place' => 'required',
        ]);

        $menu->fill([
            'url' => !empty($request->input('url')) ? $request->input('url') : '',
            'title' => $request->title,
            'page_id' => !empty($request->input('page_id')) ? $request->input('page_id') : null,
            'place' => $request->place,
        ]);

        $menu->save();

        return redirect()->route('admin.menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('admin.menu');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::latest()->paginate(20);
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
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
            'content' => 'required',
        ]);

        $page = Page::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.pages');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    // *
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\page  $page
    //  * @return \Illuminate\Http\Response
     
    public function update(Request $request, page $page)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $page->fill([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        $page->save();

        return redirect()->route('admin.pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages');
    }
}

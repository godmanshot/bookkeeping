<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
	public function index() {
        $photos = Gallery::latest()->get();

		return view('admin.gallery.index', compact('photos'));
	}

    public function create()
    {
    	return view('admin.gallery.create');
    }

	public function store(Request $request) {

		$request->validate([
			'img' => 'required'
		]);

        $path = $request->file('img')->store('img/gallery', 'public');
        Image::make('storage/'.$path)->fit(370, 250)->save('storage/'.str_replace(".jpeg", "", $path).'-min.jpeg', 50)->destroy();
        Image::make('storage/'.$path)->fit(1200, 720)->save()->destroy();

        $photo = Gallery::create([
            'img' => $path,
        ]);

        return redirect()->route('admin.gallery');
	}

    public function edit(Gallery $gallery)
    {
    	return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'img' => 'required'
        ]);

        Storage::disk('public')->delete($gallery->img);
        Storage::disk('public')->delete(str_replace(".jpeg", "", $gallery->img).'-min.jpeg');

        $path = $request->file('img')->store('img/gallery', 'public');

        Image::make('storage/'.$path)->fit(370, 250)->save('storage/'.str_replace(".jpeg", "", $path).'-min.jpeg', 50)->destroy();
        Image::make('storage/'.$path)->fit(1200, 720)->save()->destroy();

        $gallery->img = $path;

        $gallery->save();

        return redirect()->route('admin.gallery');
    }

    public function destroy(Gallery $gallery)
    {
        Storage::disk('public')->delete($gallery->img);
        Storage::disk('public')->delete(str_replace(".jpeg", "", $gallery->img).'-min.jpeg');
        $gallery->delete();
        return redirect()->route('admin.gallery');
    }
}

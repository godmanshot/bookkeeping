<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::latest()->paginate(20);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
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
            'name' => 'required',
            'img' => 'required',
            'body' => 'required',
            'price' => 'required',
        ]);

        $path = $request->file('img')->store('img/services', 'public');
		$image = Image::make('storage/'.$path);
        $image->fit(1920, 700)->save();
        $image->fit(150, 150)->save('storage/'.str_replace(".jpeg", "", $path).'-min.jpeg');
		$image->destroy();

        $service = Service::create([
            'name' => $request->name,
            'img' => $path,
            'body' => $request->body,
            'price' => (int)$request->price,
            'slug' => str_slug($request->name),
        ]);

        return redirect()->route('admin.services');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required',
            'body' => 'required',
            'price' => 'required',
        ]);

        if ($request->hasFile('img')) {

            Storage::disk('public')->delete($service->img);
        	Storage::disk('public')->delete(str_replace(".jpeg", "", $service->img).'-min.jpeg');

            $path = $request->file('img')->store('img/services', 'public');
			$image = Image::make('storage/'.$path);
			$image->fit(1920, 700)->save();
			$image->fit(150, 150)->save('storage/'.str_replace(".jpeg", "", $path).'-min.jpeg');
			$image->destroy();

            $service->img = $path;

        }

        $service->fill([
            'name' => $request->name,
            'body' => $request->body,
            'price' => (int)$request->price,
            'slug' => str_slug($request->name),
        ]);

        $service->save();

        return redirect()->route('admin.services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        Storage::disk('public')->delete($service->img);
        Storage::disk('public')->delete(str_replace(".jpeg", "", $service->img).'-min.jpeg');
        $service->delete();
        return redirect()->route('admin.services');
    }
}

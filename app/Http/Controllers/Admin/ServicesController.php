<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(20);
        return view('admin.services.index', compact('services'));
    }
    
    public function create()
    {
        return view('admin.services.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'img' => 'required',
            'body' => 'required',
            'price' => 'required',
        ]);

        $path = $request->file('img')->store('img/services', 'public');
        Image::make('storage/'.$path)->fit(250, 250)->save('storage/'.str_replace(".jpeg", "", $path).'-min.jpeg', 50)->destroy();
        Image::make('storage/'.$path)->fit(1920, 700)->save(null, 50)->destroy();

        $service = Service::create([
            'name' => $request->name,
            'img' => $path,
            'body' => $request->body,
            'price' => (int)$request->price,
            'slug' => str_slug($request->name),
        ]);

        return redirect()->route('admin.services');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

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
            Image::make('storage/'.$path)->fit(250, 250)->save('storage/'.str_replace(".jpeg", "", $path).'-min.jpeg', 50)->destroy();
			Image::make('storage/'.$path)->fit(1920, 700)->save(null, 50)->destroy();

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

    public function destroy(Service $service)
    {
        Storage::disk('public')->delete($service->img);
        Storage::disk('public')->delete(str_replace(".jpeg", "", $service->img).'-min.jpeg');
        $service->delete();
        return redirect()->route('admin.services');
    }
}

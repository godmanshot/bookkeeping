<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
	public function index() {
        $posts = Post::latest()->paginate(20);

		return view('admin.posts.index', compact('posts'));
	}

    public function create()
    {
    	return view('admin.posts.create');
    }

	public function store(Request $request) {
		$request->validate([
			'title' => 'required',
			'body' => 'required',
			'img' => 'required'
		]);

        $path = $request->file('img')->store('img/posts', 'public');
        Image::make('storage/'.$path)->fit(250, 250)->save('storage/'.str_replace(".jpeg", "", $path).'-min.jpeg', 50)->destroy();
        Image::make('storage/'.$path)->fit(1920, 700)->save(null, 50)->destroy();

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'img' => $path,
            'slug' => str_slug($request->title),
            'user_id' => Auth::id()
        ]);

        return redirect()->route('admin.posts');
	}

    public function edit(Post $post)
    {
    	return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        if ($request->hasFile('img')) {

            Storage::disk('public')->delete($post->img);
            Storage::disk('public')->delete(str_replace(".jpeg", "", $post->img).'-min.jpeg');

            $path = $request->file('img')->store('img/posts', 'public');

            Image::make('storage/'.$path)->fit(250, 250)->save('storage/'.str_replace(".jpeg", "", $path).'-min.jpeg', 50)->destroy();
            Image::make('storage/'.$path)->fit(1920, 700)->save(null, 50)->destroy();

            $post->img = $path;

        }

        $post->fill([
            'title' => $request->title,
            'body' => $request->body,
            'slug' => str_slug($request->title),
        ]);

        $post->save();

        return redirect()->route('admin.posts');
    }

    public function destroy(Post $post)
    {
        Storage::disk('public')->delete($post->img);
        Storage::disk('public')->delete(str_replace(".jpeg", "", $post->img).'-min.jpeg');
        $post->delete();
        return redirect()->route('admin.posts');
    }
}

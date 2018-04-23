<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    public function index()
    {
        $page = Page::where('title', 'Контакты')->firstOrFail();
        
        return view('contacts.index', compact('page'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'body' => 'required',
        ]);

        $email = (string)resolve('site-setting')->emailSend;
        Mail::raw("Имя: {$request->name} \nПочта: {$request->email} \nСообщение: {$request->body}", function ($message) use ($email) {
            $message->to($email)->subject('Сообщение');
        });
        
        $request->session()->flash('message', $request->input('name'));

        return back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gambar;

class InputController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'post' => gambar::orderBy('created_at', 'desc')->get()
        ]);
    }
    public function store(request $request)
    {
        // dd($request);

        // dengan validasi
        $validation = $request->validate([
            'image' => 'required|file|max:3074'
        ]);
        $validation['image'] = request()->file('image')->store('post-img');
        gambar::create($validation);

        // tanpa validasi
        // gambar::create([
        //     'image' => $request->file('image')->store('post-img'),
        // ]);

        return redirect('/');
    }
}

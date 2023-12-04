<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gambar;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class InputImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dashboard', [
            'post' => gambar::orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        // dengan validasi
        $validation = $request->validate([
            'image' => 'required|image|file|max:3074'
        ]);

        $validation['image'] = request()->file('image')->store('post-img');
        gambar::create($validation);

        // tanpa validasi
        // gambar::create([
        //     'image' => $request->file('image')->store('post-img'),
        // ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('Pages.edit', [
            'post' => gambar::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $validate = $request->validate([
            'image' => 'image|file|max:3074'
        ]);

        Storage::delete($request->imgOld);
        $validate['image'] = $request->file('image')->store('post-img');

        gambar::where('id', $id)->update($validate);

        // $request->validate([
        //     'image' => 'image|file|max:3074'
        // ]);

        // gambar::where('id', $id)->update([
        //     'image' => $request->file('image')->store('post-img')
        // ]);

        // Storage::delete($request->imgOld);

        return redirect(route('input-images.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, request $request)
    {
        // dd($request);
        Storage::delete($request->imageOld);
        gambar::find($id)->delete();
        return redirect(route('input-images.index'));
    }
}

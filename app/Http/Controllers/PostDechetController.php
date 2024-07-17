<?php

namespace App\Http\Controllers;

use App\Models\PostDechet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostDechetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postDechets = PostDechet::with('images')->get();
        return view('post_dechets.index', compact('postDechets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post_dechets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'contenu' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $postDechet = PostDechet::create($request->only(['contenu']));
        // $postDechet->user_id = Auth::id();
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $postDechet->images()->create(['path' => $path]);
            }
        }

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PostDechet $postDechet)
    {
        return view('post_dechets.show', compact('postDechet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostDechet $postDechet)
    {
        return view('post_dechets.edit', compact('postDechet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostDechet $postDechet)
    {
        $request->validate([
            'contenu' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $postDechet->update($request->only(['contenu']));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images');
                $postDechet->images()->create(['path' => $path]);
            }
        }

        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostDechet $postDechet)
    {
        foreach ($postDechet->images as $image) {
            Storage::delete($image->path);
            $image->delete();
        }

        $postDechet->delete();

        return redirect()->route('post-dechets.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\PostDechet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostDechetController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['index' , 'create' , 'update' , 'store' , 'destroy']);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $postDechets = PostDechet::with('images')->orderBy('created_at','des')->get();
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
        $postDechet->user_id = Auth::id();
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $postDechet->images()->create(['path' => $path]);
            }
        }
        $postDechet->save();
        return redirect()->route('post-dechets.show', $postDechet);
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
        // $this->authorize('update' , $postDechet);

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

        return redirect()->route('post-dechets.show', $postDechet);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostDechet $postDechet)
    {
        // $this->authorize('destroy' , $postDechet);

        foreach ($postDechet->images as $image) {
            Storage::delete($image->path);
            $image->delete();
        }

        $postDechet->delete();

        return redirect()->route('index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::with('pictures')->get();
        return view('albums.index', compact('albums'));
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        Album::create($request->only('name'));
        return redirect()->route('albums.index');
    }

    public function edit(Album $album)
    {
        return view('albums.edit', compact('album'));
    }

    public function update(Request $request, Album $album)
    {
        $request->validate(['name' => 'required']);
        $album->update($request->only('name'));
        return redirect()->route('albums.index');
    }

    public function show(Album $album)
    {
        return view('albums.show', compact('album'));
    }

    public function destroy(Request $request, Album $album)
    {
        if ($album->pictures()->exists()) {
            $action = $request->input('action');
            if ($action == 'delete') {
                $album->pictures()->delete();
            } elseif ($action == 'move') {
                $targetAlbumId = $request->input('target_album_id');
                $album->pictures()->update(['album_id' => $targetAlbumId]);
            }
        }
        $album->delete();
        return redirect()->route('albums.index');
    }
}

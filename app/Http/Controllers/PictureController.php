<?php
namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Picture;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function store(Request $request, Album $album)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $picture = new Picture;
        $picture->name = $request->input('name');
        $picture->album_id = $album->id;
        $filePath = $request->file('file')->store('pictures', 'public');
        if (!$filePath) {
            return back()->withErrors(['file' => 'Failed to store file.']);
        }
    
        $picture->file_path = $filePath;
    
        if (!$picture->save()) {
            return back()->withErrors(['db' => 'Failed to save picture to database.']);
        }
    
        return redirect()->route('albums.index');
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::all();
        return view('photos.index', compact('photos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
        ]);

        foreach ($request->file('photos') as $photo) {
            $photoPath = $photo->store('photos', 'public');

            Photo::create([
                'filename' => $photoPath,
                'description' => $request->description,
            ]);
        }

        return redirect()->back()->with('success', 'Photos uploaded successfully!');
    }
}

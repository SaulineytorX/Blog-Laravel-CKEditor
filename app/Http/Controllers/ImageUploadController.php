<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function storeImage(Request $request)
    {
        $validatedData = $request->validate([
            'upload' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $url = $file->store('public/post-media');
            $url = asset('storage/' . str_replace('public/', '', $url));
            return response()->json(['fileName' => $fileName, 'uploaded' => 6, 'url' => $url]);
        }
    }
}

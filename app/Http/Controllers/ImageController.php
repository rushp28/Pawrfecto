<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function uploadImage(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'image' => 'required|image|max:4096', // Max file size of 4MB
        ]);

        // Store the uploaded file in the storage directory
        $imagePath = $request->file('image')->store('images', 'public');

        // You may save the $imagePath in the database or perform any other necessary actions
        // For example, if you have a User model with an avatar field:
        // auth()->user()->update(['avatar' => $imagePath]);

        return "Image uploaded successfully!";
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    //
    public function upload(Request $request)
    {
        $request->validate([
            'image_ori' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust max size as per your requirement
            'image_bb' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust max size as per your requirement
        ]);

        $imagePaths = [];

        // Handle 'image_ori' field
        if ($request->file('image_ori')) {
            $imagePath = $request->file('image_ori')->store('images/detected/od', 'public');
            $imagePaths['image_ori_path'] = $imagePath;
        } else {
            return response()->json(['message' => 'Failed to upload image_ori'], 400);
        }

        // Handle 'image_bb' field
        if ($request->file('image_bb')) {
            $imagePath = $request->file('image_bb')->store('images/detected/od', 'public');
            $imagePaths['image_bb_path'] = $imagePath;
        } else {
            return response()->json(['message' => 'Failed to upload image_bb'], 400);
        }

        // Save image paths to database
        $image = new Image();
        $image->image_ori_path = $imagePaths['image_ori_path'];
        $image->image_bb_path = $imagePaths['image_bb_path'];
        $image->save();

        return response()->json(['message' => 'Images uploaded successfully'], 200);
    }

    public function getAllImages(Request $request)
    {
        // Retrieve all images from the database
        $images = Image::all();

        // Return the images data as JSON response
        return response()->json(['images' => $images], 200);
    }
}

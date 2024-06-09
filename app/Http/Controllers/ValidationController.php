<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class ValidationController extends Controller
{
    public function index()
    {
        $imageDirectory = public_path('images/dataset/original/'); // Path to your images directory
        $imageFiles = File::files($imageDirectory);

        $imageUrls = [];

        foreach ($imageFiles as $file) {
            $imageUrls[] = asset('images/dataset/original/' . $file->getFilename());
        }

        return view('validation')->with('images', $imageUrls);
    }

    public function move(Request $request)
    {
        // Source path of the image
        $index = $request->input('url');
        $destinationDirectory = $request->input('dir');
        $path = parse_url($index, PHP_URL_PATH);
        $sourcePath = public_path($path);

        // Destination path of the image
        $destinationPath = public_path($destinationDirectory);

        // Check if the source image exists
        if (file_exists($sourcePath)) {
            // Ensure that the destination directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Move the image file to the destination directory
            $filename = basename($sourcePath);
            $newFilePath = $destinationPath . $filename;
            rename($sourcePath, $newFilePath);

            // Optionally, you can update the database or perform any other actions

            return response()->json(['message' => 'Image moved successfully', 'new_file_path' => $newFilePath]);
        } else {
            return response()->json(['message' => 'Source image does not exist'], 404);
        }
    }
}

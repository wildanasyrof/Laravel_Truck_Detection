<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class DetectedController extends Controller
{
    //
    public function index()
    {
        // Retrieve all images from the database
        $images = Image::all();

        // Pass the images data to the view
        return view('detected', compact('images'));
    }
}

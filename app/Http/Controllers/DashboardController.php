<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $totalOri = count(File::allFiles(public_path('images/dataset/original')));
        $totalNormal = count(File::allFiles(public_path('images/dataset/normal')));
        $totalOD = count(File::allFiles(public_path('images/dataset/OD')));
        $totalImages = $totalOri + $totalNormal + $totalOD;

        // Pass all data as compact variables to the view
        return view('dashboard', compact('totalOri', 'totalNormal', 'totalOD', 'totalImages'));
    }
}

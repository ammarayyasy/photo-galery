<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $files = File::all();
        
        return view('welcome', compact('files'));
    }
}

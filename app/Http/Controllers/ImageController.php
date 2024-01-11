<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function show($path)
    {
        $file = Storage::disk('local')->get($path);

        return new Response($file, 200);
    }
}


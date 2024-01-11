<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use Illuminate\Support\Facades\Storage;

use Exception;
use Illuminate\Support\Facades\Log;
// use App\Http\Controllers\Exception;

class UploadController extends Controller
{
    public function index()
    {
        $uploads = Upload::all();
        return view('upload.index', compact('uploads'));
    }

    public function create()
    {
        return view('upload.create');
    }



public function store(Request $request)
{
    try {
        // Check user preference or configuration for storage choice
        $storageChoice = $request->input('storage_choice');

        // Default to 'local' disk (block storage) if not specified
        $disk = $storageChoice === 'do' ? 'do' : 'local';

        // Use the selected disk for storing the file
        $path = $request->file('file')->store(env('DO_FOLDER'), $disk);

        // If the upload is successful, $path will contain the path of the uploaded file
        // You can log this path for debugging purposes
        $file = $request->file('file');
        Log::info('Received file: ', (array) $file);
        
        if (empty($path)) {
            Log::info('File uploaded to storage, but the path is empty.');
        } else {
            Log::info('File uploaded to storage. Path: ' . $path);
        }

        // Create a new upload record in your database
        $upload = Upload::create([
            'name' => $request->input('name'),
            'gender' => (int)$request->input('gender'),
            'file_path' => $path,
            'storage_type' => $disk,
        ]);

        // Redirect to the 'index' route
        return redirect()->route('upload.index');
    } catch (\Exception $e) {
        // If the upload fails, an exception will be thrown
        // You can log this exception for debugging purposes
        Log::error('File upload failed. Exception: ' . $e->getMessage());

        // Handle the error (e.g., show an error message to the user)
        return back()->withErrors(['file' => 'File upload failed. Please try again.']);
    }
}

    public function show(Upload $upload)
    {
        return view('upload.show', compact('upload'));
    }

    public function edit(Upload $upload)
    {
        return view('upload.edit', compact('upload'));
    }

    public function update(Request $request, Upload $upload)
    {
        $data = [
            'name' => $request->input('name'),
            'gender' => (int)$request->input('gender'),
        ];
        if ($request->hasFile('file')) {
            Storage::disk('do')->delete($upload->file_path);
            $data['file_path'] = $request->file('file')->store('images', 'do');
        }
        $upload->update($data);
        return redirect()->route('upload.index');
    }

    public function destroy(Upload $upload)
    {
        // Check if the path and storage type are not null before attempting to delete
        if ($upload->file_path !== null && $upload->storage_type !== null) {
            Storage::disk($upload->storage_type)->delete($upload->file_path);
        }
    
        $upload->delete();
        return redirect()->route('upload.index');
    }
    
}
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function store(Request $request)
    {
        // Validasi file yang di-upload
        $request->validate([
            'image' => 'required|file|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Simpan file di storage Laravel
        $path = $request->file('image')->store('public/uploads');

        return response()->json([
            'message' => 'File uploaded successfully',
            'path' => $path,
        ]);
    }
}


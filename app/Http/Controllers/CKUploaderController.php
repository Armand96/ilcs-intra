<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CKUploaderController extends Controller
{
    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'upload' => 'required|file|mimes:jpg,jpeg,png,gif,webp|max:2048', // 2MB Max
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        // Handle the uploaded file
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $path = $file->store('uploads', 'public');

            return response()->json(['url' => Storage::url($path)]);
        }

        return response()->json(['error' => 'No file uploaded.'], 400);
    }
}

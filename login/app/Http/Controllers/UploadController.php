<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240',
        ]);


        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('uploads', $filename);



        return redirect()->back()->with('success', 'File uploaded successfully.');
    }
}

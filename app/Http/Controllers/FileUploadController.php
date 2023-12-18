<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function upload(Request $request)
    {


        if ($request->hasFile('upload')) {

            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = patchinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('userfiles'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('userfiles/'.$fileName);
            $msg = 'sucsess';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, 'url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }


        /*
        if ($request->hasFile('upload')) {

            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = patchinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/'. $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }

        */

        /*
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $file = $request->file('file');
        $path = $file->store('userfiles', 'store');

        return response()->json(['url' => Storage::url($path)]);*/
    }
}

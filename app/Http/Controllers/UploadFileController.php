<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadFileController extends Controller
{
    private $disk = "public";

    public function loadView ()
    {
        $files = [];

        foreach (Storage::disk($this->disk)->files() as $file){
            $name = str_replace("$this->disk/", "", $file);

            $type = Storage::disk($this->disk)->mimeType($name);


            $files[] = [
                'name' => $name,
                'type' => $type,
                'size' => Storage::disk($this->disk)->size($name)
            ];

        }

        return view('uploads.upload', compact('files'));
    }

    public function storeFile (Request $request)
    {
//        Storage::disk('public')->put('texto.txt', 'hola');

        if ($request->isMethod('POST')){
            $file = $request->file('file');

            $name = $request->input('name');

            $file->storeAs('', $name.".".$file->extension(), $this->disk);
        }

        return $this->loadView();
    }

    public function downloadFile ($name)
    {
//        dd($name);
        if (Storage::disk($this->disk)->exists($name)){
            return Storage::disk($this->disk)->download($name);
        }
        return response('', 404);
    }

    public function delete()
    {
        //
    }
}

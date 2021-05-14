<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileUpload extends Controller
{
    public function getFile()
    {
        
    }

    public function fileUpload($id, Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:png,jpg'
        ]);

        $fileModel = new File;

        if($request->file())
        {
            $fileName =  time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads',$fileName, 'public');

            $fileModel->name = time().'_'.$request->file->getClientOriginalName();
            $fileModel->file_path='/storage/'.$filePath;
            $fileModel->fk_ticket = $id;
            $fileModel->save();

            return back()
            ->with('Con Exito','Un archivo se ha subido')
            ->with('file',$fileName);
        }
    }
}

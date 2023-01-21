<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ZipArchive;

class ZipController extends Controller
{
    public function downloadZip(Request $request)
    {                                
        $zip = new ZipArchive;

        $fileName = 'Example.zip';

        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
        {
                $file = $request->file('file');   
                $name = $file->getClientOriginalName();  
                $zip->addFile($file,$name);            
             
                $zip->close();

            return response()->download(public_path($fileName));
    
        }

        return "null";
    }
}

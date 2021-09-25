<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UploadController extends Controller
{
    public function processFile($filePath)
    {
        //
    }

    public function uploadXML(Request $request)
    {
        $request->validate(['xml' => 'required|mimes:application/xml,xml']);

        if ($request->file('xml')) {
            $name      = date('YmdHms');
            $extension = $request->xml->extension();
            $uploaded  = $request->xml->storeAs('public\xml', "$name.$extension");

            if ($uploaded) {
                return response()->json('success', Response::HTTP_OK);
            }
        } else {
            return response()->json('error', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadsController extends Controller
{
    public function index()
    {
        return view('uploads.index');
    }

    public function create()
    {
        return view('uploads.create');
    }

    public function store(Request $request)
    {
        $request->validate(['xml' => 'required|mimes:application/xml,xml']);

        $name = $request->xml->getClientOriginalName();

        $uploaded  = $request->xml->storeAs('public\xml', "$name");

        if ($uploaded) {
            return 'Upload successed - ' . $uploaded;
        }

        return 'Upload failed!';
    }
}

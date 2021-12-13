<?php

namespace App\Classes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Upload
{

    // upload file
    public static function uploadFile(Request $request, $field)
    {
        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $fileName = Auth::user()->id_user . "_" . date('d.m.Y.') . uniqid() . "." . $file->extension();
            $file->storeAs('images', $fileName, 'public');
        } else {
            $fileName = 'default.jpg';
        }

        return $fileName;
    }
}

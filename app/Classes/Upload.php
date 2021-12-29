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
            $request['image'] = $request->file($field);
            $fileName = date('d_m_Y_') . uniqid() . "." . $request['image']->extension();
            $request->image->move(public_path('assets/images'), $fileName);
        } else {
            $fileName = 'Group115.svg';
        }

        return $fileName;
    }
}

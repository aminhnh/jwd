<?php

namespace App\Http\Controllers;

use App\Models\BeasiswaRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function showFile($fileName)
    {
        $user = Auth::user();

        $registration = BeasiswaRegistration::where('user_id', $user->id)
        ->where('file_path', 'uploads/' . $fileName)
        ->first();


        if (!$registration) {
            return abort(403, 'Unauthorized access to this file.');
        }

        if (!Storage::exists('uploads/' . $fileName)) {
            return abort(404, 'File not found.');
        }

        return Storage::download('uploads/' . $fileName);
    }
}
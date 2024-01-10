<?php

namespace App\Http\Controllers;

use App\Models\UploadFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class ControllerDownloadFile extends Controller
{
    
    public function index_download()
    {
        $uploads = UploadFile::all();
        return view('admin.DownloadFile.index-download', compact('uploads'));
    }

public function downloadFile($id)
{
    // Dapatkan informasi file dari database berdasarkan ID
    $file = UploadFile::find($id);

    if (!$file) {
        // File tidak ditemukan, redirect atau berikan respons yang sesuai
        return redirect()->back()->with('error', 'File not found');
    }

    // Path URL publik untuk file yang akan didownload
    $filePath = public_path('storage/' . $file->file);

    // Pastikan file ada sebelum mencoba untuk mendownload
    if (file_exists($filePath)) {
        // Dapatkan tipe MIME dari file menggunakan metode file dari Laravel
        $mimeType = File::mimeType($filePath);

        // Lakukan log atau aktivitas lainnya jika diperlukan

        // Lakukan proses download dengan menentukan ekstensi file
        $originalName = $file->name . '.' . File::extension($file->file);

        return response()->download($filePath, $originalName, ['Content-Type' => $mimeType]);
    } else {
        // File tidak ditemukan, redirect atau berikan respons yang sesuai
        return redirect()->back()->with('error', 'File not found');
    }
}

  public function searchdownload(Request $request)
{
    $search = $request->input('search');
    $uploadfile = UploadFile::where('name', 'like', '%' . $search . '%')->paginate();

		return view('Admin.DownloadFile.index-download',['uploads' => $uploadfile]);
}
}


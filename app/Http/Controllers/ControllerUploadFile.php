<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadFile;
use App\Models\JenisFile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
class ControllerUploadFile extends Controller
{
    public function create_upload()
    {
        
         $uploads = UploadFile::where('user_id', Auth::id())->get();
        return view('User.UploadFile.input-uploadfile',compact('uploads'));
    }

   public function store_upload(Request $request)
{
    $request->validate([
        'name' => 'required',
        'type_file' => 'required',
        'file' => 'required',
    ]);

    $file = $request->file('file');
    $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();
    Storage::disk('local')->put('public/' . $path, file_get_contents($file));

    // Associate the uploaded file with the currently authenticated user.
    UploadFile::create([
        'name' => $request->name,
        'type_file' => $request->type_file,
        'file' => $path,
        'user_id' => Auth::id()
    ]);

    return Redirect::route('index-uploadfile');
}

    public function index_upload()
    {
        $jenis = JenisFile::pluck('name','id');
        $upload=UploadFile::all();
        return view('Admin.Upload.create_file',compact('jenis','upload'));
    }

    public function index_uploadfile()
    {
       $uploads = UploadFile::where('user_id', Auth::id())->get();
        return view('User.UploadFile.index-uploadfile',compact('uploads'));
    }
     
    public function edit_upload(UploadFile $uploadfile)
    {
       
       $uploadfile = UploadFile::where('user_id', Auth::id())->first();

       
        //dd($uploadfile);
        return view('User.UploadFile.update-uploadfile', compact('uploadfile'));}

    public function update_upload(UploadFile $uploadfile, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type_file'=> 'required',
            'file'=>'required',
           
        ]);
        $file = $request->file('file');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension(); 
        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        $uploadfile->update([
            'name' => $request->name,
            'type_file' => $request->type_file,
            'file' => $path,

        ]);
        return Redirect::route('index-uploadfile', ['uploadfile' => $uploadfile->first()->id]);

    }

      public function delete_upload(UploadFile $uploadfile)
    {

        Storage::delete('public/storage/'. $uploadfile->file);
        $uploadfile->delete();
        
        return Redirect::route('index-uploadfile');}

        public function searchupload(Request $request)
{
    $search = $request->input('search');
    $uploadfile = UploadFile::where('name', 'like', '%' . $search . '%')->paginate();

		return view('User.UploadFile.index-uploadfile',['uploads' => $uploadfile]);
}


}

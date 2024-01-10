<?php

namespace App\Http\Controllers;

use App\Models\JenisFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class ControllerJenisFile extends Controller
{
    public function create_jenis()
    {
        
        $jenis=JenisFile::all();
        return view('Admin.JenisFile.create_file',compact('jenis'));
    }

    public function store_jenis(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
      
        JenisFile::create([
            'name' => $request->name,
           
        ]);
    
        return Redirect::route('admin.JenisFile.index_jenis');
}

    public function index_jenis()
    {
        $jenis = JenisFile::all();
        return view('Admin.JenisFile.create_file',compact('jenis'));
    }

     public function edit_jenis(JenisFile $jenis)
    {
        $jenis = JenisFile::all();
        return view('Admin.JenisFile.edit_jenis', compact('jenis'));}
     
        

    public function update_jenis(JenisFile $jenis, Request $request)
    {
        $request->validate([
            'name' => 'required'
           
        ]);
       JenisFile::update([
            'name' => $request->name,

        ]);
        return Redirect::route('admin.JenisFile.index_jenis', $jenis);
    }

      public function delete_jenis(JenisFile $jenis)
    {

        $jenis->delete();
        
        return Redirect::route('admin.JenisFile.index_jenis');}

        public function searchjenis(Request $request)
{
    $search = $request->input('search');
    $jenis = JenisFile::where('name', 'like', '%' . $search . '%')->paginate();

    
		return view('Admin.jenisFile.index_jenis',['jenis' => $jenis]);
}
}

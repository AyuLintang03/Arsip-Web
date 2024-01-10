<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\UploadFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function index(){
        $users=User::all();
         $userCount = User::count();
    $fileCount = UploadFile::count();
    return view('admin.dashboard', compact('users','userCount', 'fileCount'));
    }
}

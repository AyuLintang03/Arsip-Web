<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ControllerUser extends Controller
{

    public function index_user()
    {
        $user=User::all();
        return view('User.index_user',compact('user'));
    }
     public function indexuser()
    {
       $users=User::all();
        return view('admin.dashboard',compact('users'));
    }
     public function index_users()
    {
       $users=User::all();
        return view('Admin.User.index-users',compact('users'));
    }
     public function edit_user(User $user)
    {
        $user=User::all();
        return view('Admin.User.edit_user', compact('user'));}
     
        

    public function update_profile(User $user, Request $request)
{
    // No need to use Auth::user() here since the $user parameter is already injected
    // ...

    $request->validate([
        'name' => 'required|string|max:255|unique:users,name,' . $user->id,
        'email' => 'required|email|max:255|unique:users,email,' . $user->id, 
        'jabatan' => 'required', 
        'nohp'=> 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
    ]);
    
        if ($request->hasFile('image')) {
        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension(); 
        Storage::disk('public')->put($path, file_get_contents($file));
    } else {
        $path = $user->image; // Keep the existing image if no new image is uploaded
    }

   $dataToUpdate = [
    'name' => $request->name,
    'email' => $request->email, 
    'jabatan' => $request->jabatan,
    'nohp' => $request->nohp,
    'image' => $path,
];



$user->update($dataToUpdate);

    

    return redirect()->route('index_user')->with('success', 'Profile updated successfully.');
}
      public function delete_user(User $user)
    {

        Storage::delete('public/storage/'. $user->file);
        $user->delete();
        
        return Redirect::route('admin.User.index-users');}

        public function searchuser(Request $request)
{
    $search = $request->input('search');
    $user = User::where('name', 'like', '%' . $search . '%')->paginate();

    
		return view('admin.User.index-users',['users' => $user]);
}


}

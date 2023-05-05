<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Support\Facades\Auth;

class LogoController extends Controller
{
    public function index(){
        $logo = Logo::select('logo_pic')->first();
        return view('backend.profile.edit_logo', compact('logo'));
    }

    public function update_logo(Request $request)
    {
    // Validate the form data
    $request->validate([
        // Other validation rules
        'logo_pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);
    // Get the authenticated user
    $user = Logo::find(1);
    //   $user = User::find($id);

    // Handle the file upload
    if ($request->hasFile('logo_pic')) {
        // Get the file
        $file = $request->file('logo_pic');
        // Generate a unique file name
        $fileName = time().'.'.$file->getClientOriginalExtension();
        // Save the file to the public/uploads directory
        $file->move(public_path('Logo'), $fileName);
        // Update the user's profile picture in the database
        $user->logo_pic = $fileName;
        $user->save();

        $notification= array
             (
                 'messege'=>'Successfully Logo Updated',
                 'alert-type'=>'success'
             );
        }
        return redirect()->route('logo.index')->with($notification, $user);
    }

}

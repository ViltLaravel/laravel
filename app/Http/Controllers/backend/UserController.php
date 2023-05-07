<?php

namespace App\Http\Controllers\backend;

use App\Models\Logo;

use App\Models\User;
use App\Models\Skills;
use App\Models\Address;
use App\Models\JobTitle;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Alluser(){
        $logo = Logo::select('logo_pic')->first();
        $users = User::where('role', 'admin')->orderBy('created_at', 'asc')->get();

        return view('backend.user.all-user', compact('logo','users'));
    }

    public function employer() {
        $logo = Logo::select('logo_pic')->first();
        $users = User::where('role', 'employer')->orderBy('created_at', 'asc')->get();

        return view('backend.user.employer-list', compact('logo', 'users'));
    }


    public function freelancer(){
        $logo = Logo::select('logo_pic')->first();
        $users = User::where('role', 'freelancer')->orderBy('created_at', 'asc')->get();

        return view('backend.user.freelancer-list', compact('logo','users'));
    }

    //Add User & Insert User
    public function AllUserIndex(){
        $address = Address::all();
        $logo = Logo::select('logo_pic')->first();
        $myuser = User::select('address')->whereid(Auth::User()->id)->first();
        return view('backend.user.add_user',compact('logo','myuser','address'));
    }

    public function InsertUserIndex(Request $request){
        $data= array();

        $status = User::select('status')->first();

        if($status['status'] == 0)
        {
         $data['name']=$request->name;
         $data['status']= '0';
         $data['email']=$request->email;
         $data['role']=$request->role;
         $data['phone']=$request->phone;
         $data['address']=$request->address;
         $data['dob']=$request->dob;
         $data['password']= Hash::make($request->password);
         $data['created_at']= date('Y-m-d H:i:s');
         $data['updated_at']= date('Y-m-d H:i:s');
        }
        else{
         $data['name']=$request->name;
         $data['status']= '1';
         $data['email']=$request->email;
         $data['role']=$request->role;
         $data['phone']=$request->phone;
         $data['address']=$request->address;
         $data['dob']=$request->dob;
         $data['password']= Hash::make($request->password);
         $data['created_at']= date('Y-m-d H:i:s');
         $data['updated_at']= date('Y-m-d H:i:s');
        }

         $insert = DB::table('users')->insert($data);

         if ($insert) {

             $notification= array
             (
                 'messege'=>'Successfully user inserted',
                 'alert-type'=>'success'
             );
             return redirect()->back()->with($notification);
         }
         else
         {
             $notification= array
             (
                 'messege'=>'Something in Wrong',
                 'alert-type'=>'error'
             );
             return redirect()->back()->with($notification);
         }


    }

    public function EditUserIndex($id){
        $logo = Logo::select('logo_pic')->first();
        $edit = DB::table('users')->where('id', $id)->first();
        $address = Address::all();
        $myuser = User::select('address')->whereid(Auth::User()->id)->first();
        return view('backend.user.edit-user', compact('myuser','edit','logo','address'));
    }

    public function UpdateUserIndex(Request $request, $id){
         $data= array();
         $data['name']=$request->name;
         $data['email']=$request->email;
         $data['role']=$request->role;
         $data['phone']=$request->phone;
         $data['address']=$request->address;
         $data['dob']=$request->dob;
        //  $data['attachment']=$request->attachment;
         $data['password']= Hash::make($request->password);
         $data['created_at']= date('Y-m-d H:i:s');
         $data['updated_at']= date('Y-m-d H:i:s');

         $update = DB::table('users')
         ->where ('id', $id)
         ->update($data);

         if ($update) {

             $notification= array
             (
                 'messege'=>'Successfully user updated',
                 'alert-type'=>'success'
             );
             return redirect()->back()->with($notification);
         }
         else
         {
             $notification= array
             (
                 'messege'=>'Something in Wrong',
                 'alert-type'=>'error'
             );
             return redirect()->route('alluser')->with($notification);
         }

    }

    public function DeleteUserIndex($id){
        try {
            $delete = DB::table('users')->where('id', $id)->delete();

            if ($delete) {
                $notification= array
                (
                    'messege'=>'Successfully user deleted',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);
            } else {
                $notification= array
                (
                    'messege'=>'Something went wrong',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            $notification= array
            (
                'messege'=>'You do not have permission to perform this action',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }


    public function updateProfile(Request $request)
    {
        $freelancers = Response::join('users','users.id','=','response.user_id')
        ->select('users.*','response.*')
        ->where('response.employee_id', Auth::user()->id)
        ->get();

        $messageCount = $freelancers->count();

    // Validate the form data
    $request->validate([
        // Other validation rules
        'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048'
    ]);
    // Get the authenticated user
    $user = Auth::user();
    //   $user = User::find($id);

    // Handle the file upload
    if ($request->hasFile('profile_pic')) {
        // Get the file
        $file = $request->file('profile_pic');
        // Generate a unique file name
        $fileName = time().'.'.$file->getClientOriginalExtension();
        // Save the file to the public/uploads directory
        $file->move(public_path('uploads'), $fileName);
        // Update the user's profile picture in the database
        $user->profile_pic = $fileName;
        $user->save();

        $notification= array
             (
                 'messege'=>'Successfully Profile Updated',
                 'alert-type'=>'success'
             );
        }
        return redirect()->route('profile.update')->with($notification, $user, $freelancers, $messageCount);
    }

    public function show(){
        $freelancers = Response::join('users','users.id','=','response.user_id')
        ->select('users.*','response.*')
        ->where('response.employee_id', Auth::user()->id)
        ->get();

        $messageCount = $freelancers->count();

        $logo = Logo::select('logo_pic')->first();
        $address = Address::all();
        $jobtitle = JobTitle::all();
        $skill = Skills::all();
        $skills = User::all();
        $myuser = User::select('address')->whereid(Auth::User()->id)->first();

        $freelancer_skill = DB::table('skills')
                            ->join('freelancer_skills','skills.id','=','freelancer_skills.skill_id')
                            ->select('freelancer_skills.*','skills.*')
                            ->where('user_id', Auth::User()->id)
                            ->get();

        $freelancerski = DB::table('category')
                        ->join('freelancerlists','category.id','=','freelancerlists.job_title_id')
                        ->select('freelancerlists.*','category.*')
                        ->where('user_id', Auth::User()->id)
                        ->get();

        return view('backend.profile.edit_profile',compact('freelancerski','freelancer_skill','logo','myuser','address', 'jobtitle', 'skills','skill','freelancers','messageCount'));
    }

    public function verify(User $user)
    {
        $logo = Logo::select('logo_pic')->first();
        // $logo = Logo::all();
        $users = User::all();
        $user->verified = 1;
        $user->save();
        // return view('backend.user.all-user', compact('user','users','logo'));
        return redirect()->back()->with('user', 'users', 'logo');
    }

    public function update(Request $request){

    }

    public function messagev()
    {
        return view('backend.verify.message');
    }

    }


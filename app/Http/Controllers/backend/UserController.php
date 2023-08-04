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
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->user = new User();
        $this->logo = new Logo();
        $this->address = new Address();
    }

    public function admin(){
        $logo = $this->logo->getLogo();
        $admin = $this->user->showAdmin();

        return view('backend.user.all-user')->with([
            'logo'  => $logo,
            'admin' => $admin
        ]);
    }

    public function employer(){
        $logo = $this->logo->getLogo();
        $employer = $this->user->showEmployer();

        return view('backend.user.employer-list')->with([
            'logo'   => $logo,
            'employer' => $employer
        ]);
    }

    public function freelancer(){
        $logo = $this->logo->getLogo();
        $freelancer = $this->user->showFreelancer();

        return view('backend.user.freelancer-list')->with([
            'logo'   => $logo,
            'freelancer' => $freelancer
        ]);
    }


    // THE CRUD PROCESS IN USERS
    public function add(){
        $logo = $this->logo->getLogo();
        $address = $this->address->getAddress();

        return view('backend.user.add_user')->with([
            'logo' => $logo,
            'address' => $address
        ]);
    }

    public function insertUser(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'required|in:admin,freelancer,employer',
            'password' => 'required|min:8',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'dob' => 'required|date',
        ]);
        $status = $this->user->userStatus();
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role'  => $request->role,
            'phone' => $request->phone,
            'address' => $request->address,
            'dob'     => $request->dob,
            'password'=> Hash::make($request->passwprd),
            'status' => $status['status'] == 0 ? '0' : '1',
        ];

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $insert = $this->user->insertUser($data);
            if($insert){
                  return redirect()->back()->with([
                    'message'=>'User successfully added!',
                    'alert-type'=>'success',
                    'insert' => $insert,
                    'status' => $status
                ]);
            }else{
                return redirect()->back()->with([
                    'notification' => $notification,
                    'insert' => $insert,
                    'status' => $status,
                    'messege'=>'Something went wrong!',
                    'alert-type'=>'error'
                ]);
            }
        }
    }

    public function editUser($id){
        $logo = $this->logo->getLogo();
        $address = $this->address->getAddress();
        $edit = $this->user->editUser($id);

        return view('backend.user.edit-user')->with([
            'edit' => $edit,
            'logo' => $logo,
            'address' => $address
        ]);
    }

    public function updateUser(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'required|in:admin,freelancer,employer',
            'password' => 'required|min:8',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'dob' => 'required|date',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'role'  => $request->input('role'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'dob'     => $request->input('dob'),
                'password'=> Hash::make($request->input('password')),
            ];

            $update = $this->user->updateUser($request->id, $data);

            if($update){
                return redirect()->back()->with([
                    'alert-type'  => 'success',
                    'message'   => 'User successfully updated!',
                    'update' => $update
                ]);
            }else{
                return redirect()->back()->with([
                    'alert-type'  => 'error',
                    'message'   => 'Something went wrong!',
                    'update' => $update
                ]);
            }
        }
    }

    public function deleteUser($id){
        $delete = $this->user->deleteUser($id);

        if($delete){
            return redirect()->back()->with([
                'alert-type'  => 'success',
                'message'  => 'User successfully deleted!'
            ]);
        }else{
            return redirect()->back()->with([
                'alert-type'  => 'success',
                'message'  => 'User cancel deletion!'
            ]);
        }
    }
    // THE CRUD PROCESS IN USERS




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


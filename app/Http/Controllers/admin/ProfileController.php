<?php

namespace App\Http\Controllers\admin;

use App\Models\Logo;

use App\Models\User;
use App\Models\Skills;
use App\Models\Address;
use App\Models\JobTitle;
use App\Models\Response;
use Illuminate\Http\Request;
use App\Models\FreelancerSkill;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\freelancerlists;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index ()
    {
        $freelancers = Response::join('users','users.id','=','response.user_id')
        ->select('users.*','response.*')
        ->where('response.employee_id', Auth::user()->id)
        ->get();

        $messageCount = $freelancers->count();

        $logo = Logo::select('logo_pic')->first();
        $address = Address::orderBY('name')->get();
        $jobtitle = JobTitle::orderBy('categoryname')->get();
        $skill = Skills::orderby('skills_name')->get();
        $skills = User::all();
        $myuser = User::select('address')
                ->whereid(Auth::User()->id)
                ->first();
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

    // password settings
    public function update(Request $request){
        if (Hash::check($request->password1,Auth::User()->password)){
            User::whereid(Auth::User()->id)->update([
                'password' => Hash::make($request->password2),
            ]);
            $notification= array
            (
                'messege'=>'Successfully Password updated',
                'alert-type'=>'success'
            );
        }
        else{
            $notification= array
            (
                'messege'=>'Invalid Password',
                'alert-type'=>'error'
            );
        }
        return redirect()->route('profile.index')->with($notification);
    }

    // update profile seetings
    public function setting(Request $request){
        $gender = $request->input('gender');

        User::whereId(Auth::User()->id)->update([
            'name' => $request -> name,
            'email' => $request -> email,
            'address' => $request -> address,
            'dob' => $request -> dob,
            'phone' => $request -> phone,
            'salary' => $request -> salary,
            'gender' => $gender,
        ]);

        freelancerlists::where('user_id',Auth::User()->id)->delete();
        freelancerlists::whereId(Auth::User()->id)->updateOrCreate([
            'job_title_id' => $request->category,
            // 'status' => $request-> status = '0',
            'user_id' => Auth::User()->id
        ]);



        // The foreach loop iterates over the selected skills from the form and uses the updateOrCreate method to either update or create a new record in the FreelancerSkill table. The skill_id column is set to the ID of the selected skill, and the user_id column is set to the currently logged in user's ID.
        if (auth()->user()->role == 'freelancer') {
            // line deletes all records from the FreelancerSkill table where the user_id column matches the currently logged in user's ID. This removes the user's existing skills from the table.
            FreelancerSkill::where('user_id',Auth::User()->id)->delete();

            foreach($request->skills as $skill){
                FreelancerSkill::updateOrCreate([
                                'skill_id' => $skill,
                                'user_id' => Auth::User()->id
            ]);

            }
        }


        $notification= array
             (
                 'messege'=>'Successfully Settings Updated',
                 'alert-type'=>'success'
             );
        return redirect()->route('profile.index')->with($notification);
    }

    // update the resume of freelancer
    public function resume(Request $request){
         // Validate the form data
        $request->validate([
        // Other validation rules
        'resume' => 'required|mimes:pdf,docx,docs|max:2048'
        ]);
        // Get the authenticated user
        $user = Auth::user();
        // Handle the file upload
        if ($request->hasFile('resume')) {
        // Get the file
        $file = $request->file('resume');
        // Generate a unique file name
        $fileName = time().'.'.$file->getClientOriginalExtension();
        // Save the file to the public/uploads directory
        $file->move(public_path('resume'), $fileName);
        // Update the user's profile picture in the database
        $user->resume = $fileName;
        $user->save();

        $notification= array
             (
                 'messege'=>'Successfully Resume updated',
                 'alert-type'=>'success'
             );
        }
        return redirect()->route('profile.index')->with($notification, $user);
    }
}

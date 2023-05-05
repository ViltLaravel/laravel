<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\JobTitle;
use App\Models\FreelancerComment;
use DB;

class FreelancerController extends Controller
{
    public function rating(){
        if(!Auth::user()){
            return redirect(route('login'));
        }
            return view('backend.rating.index');
    }

    public function reviews($id)
    {

        $freelancers = User::with(['freelancer_comment' => function ($query) use ($id) {
            $query->join('users', 'users.id', '=', 'freelancer_comment.user_id');
            $query->join('users as use', 'use.id', '=', 'freelancer_comment.employer_id');

            $query->select('users.*', 'freelancer_comment.*','use.*',
                DB::raw('COALESCE(ROUND(AVG(freelancer_comment.employer_rating), 1), 0) AS avg_rating'),
                DB::raw('COUNT(DISTINCT(freelancer_comment.employer_id)) AS feedback_count'),
                DB::raw("CONCAT(DATE_FORMAT(freelancer_comment.created_at, '%M %d, %Y')) AS contract_period"),
            );
            $query->where('freelancer_comment.user_id', $id);
            $query->groupBy('users.id','users.name','users.password','users.profile_pic','users.role','users.dob','users.attachment','users.gender','users.address','users.email','users.email_verified_at','users.remember_token','users.created_at','users.updated_at','users.verified','users.phone','users.status','users.resume','users.rating','users.salary','freelancer_comment.id','freelancer_comment.user_id','freelancer_comment.employer_id','freelancer_comment.job_title_id','freelancer_comment.created_at','freelancer_comment.updated_at','freelancer_comment.employer_feedback','freelancer_comment.employer_rating','freelancer_comment.status','use.id','use.name','use.password','use.profile_pic','use.role','use.dob','use.attachment','use.gender','use.address','use.email','use.email_verified_at','use.remember_token','use.created_at','use.updated_at','use.verified','use.phone','use.status','use.resume','use.rating','use.salary');
        }])
        ->get();
        // return response()->json($freelancers);
        return view('backend.rating.all_rating',compact('freelancers'));
    }

    public function sendRating(Request $request)
    {
        if (!Auth::user()) {
            session()->flash('warning', 'Please login');
            return redirect()->route('login');
        }

        if (auth()->user()->role !== 'employer') {
            session()->flash('warning', 'You must be an employer to give feedback!');
            return redirect()->back();
        }

        $existingComment = FreelancerComment::where('user_id', $request->modalId)
            ->where('employer_id', auth()->id())
            ->where('job_title_id', $request->jobId)
            ->exists();

        if ($existingComment) {
            session()->flash('warning', 'You have already given feedback to this freelancer!');
            return redirect()->back();
        }

        FreelancerComment::create([
            'user_id' => $request->modalId,
            'employer_id' => auth()->id(),
            'employer_feedback' => $request->feedback,
            'employer_rating' => $request->rating,
            'job_title_id' => $request->jobId,
            'status' => 1
        ]);

        session()->flash('success', 'Feedback sent successfully!');
        return redirect()->back();
    }


}

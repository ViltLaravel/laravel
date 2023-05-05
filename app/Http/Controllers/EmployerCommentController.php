<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\JobTitle;
use App\Models\EmployerComment;
use DB;
use App\Models\Logo;

class EmployerCommentController extends Controller
{

    public function employerRating($id){
        $logo = Logo::select('logo_pic')->first();
        $users = User::select('*')->where('id', $id)->first();
        if(!Auth::user()){
            return redirect(route('login'));
        }
            return view('backend.rating.employer_rating',compact('users','logo'));
    }

    public function sendEmployer(Request $request)
    {
        if (!Auth::user()) {
            session()->flash('warning', 'Please login');
            return redirect()->route('login');
        }

        if (auth()->user()->role !== 'freelancer') {
            session()->flash('warning', 'You must be an freelancer to give feedback!');
            return redirect()->back();
        }

        $existingComment = EmployerComment::where('user_id', $request->modalId)
            ->where('freelancer_id', auth()->id())
            ->exists();

        if ($existingComment) {
            session()->flash('warning', 'You have already given feedback to this employer!');
            return redirect()->back();
        }

        EmployerComment::create([
            'user_id' => $request->modalId,
            'freelancer_id' => auth()->id(),
            'freelancer_feedback' => $request->feedback,
            'freelancer_rating' => $request->rating,
        ]);

        session()->flash('success', 'Feedback sent successfully!');
        return redirect()->back();
    }

    public function reviews_employer($id)
    {

        $freelancers = User::with(['employer_comment' => function ($query) use ($id) {
            $query->join('users', 'users.id', '=', 'employer_comment.user_id');
            $query->join('users as use', 'use.id', '=', 'employer_comment.freelancer_id');

            $query->select('users.*', 'employer_comment.*','use.*',
                DB::raw('COALESCE(ROUND(AVG(employer_comment.freelancer_rating), 1), 0) AS avg_rating'),
                DB::raw('COUNT(DISTINCT(employer_comment.freelancer_id)) AS feedback_count'),
                DB::raw("CONCAT(DATE_FORMAT(employer_comment.created_at, '%M %d, %Y')) AS contract_period"),
            );
            $query->where('employer_comment.user_id', $id);
            $query->groupBy('users.id','users.name','users.password','users.profile_pic','users.role','users.dob','users.attachment','users.gender','users.address','users.email','users.email_verified_at','users.remember_token','users.created_at','users.updated_at','users.verified','users.phone','users.status','users.resume','users.rating','users.salary','employer_comment.id','employer_comment.user_id','employer_comment.freelancer_id','employer_comment.created_at','employer_comment.updated_at','employer_comment.freelancer_feedback','employer_comment.freelancer_rating','use.id','use.name','use.password','use.profile_pic','use.role','use.dob','use.attachment','use.gender','use.address','use.email','use.email_verified_at','use.remember_token','use.created_at','use.updated_at','use.verified','use.phone','use.status','use.resume','use.rating','use.salary');
        }])
        ->get();
        // return response()->json($freelancers);
        return view('backend.rating.all_rating_employer',compact('freelancers'));
    }

}

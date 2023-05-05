<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class PageController extends Controller
{
    //FOR ABOUT US PAGE
    public function index(){
        $logo = Logo::select('logo_pic')->first();
        return view('backend_home.about', compact('logo'));
    }

    //FOR CONTACT US PAGE
    public function indexs(){
        $logo = Logo::select('logo_pic')->first();
        return view('backend_home.pages.contact', compact('logo'));
    }


    // //FOR EMPLOYER PAGE
    // public function indexss(){
    //     $logo = Logo::select('logo_pic')->first();

    //     $user = User::select('status')->where('role', 'employer')->first();

    //     if($user['status']== 0){
    //         $employer = User::select('*')->where('role', 'employer')->limit(2)->get();
    //         $show1 = 'show more';
    //         $red1 = 'primary';
    //     }else{
    //         $employer = User::select('*')->where('role', 'employer')->get();
    //         $show1 = 'show less';
    //         $red1 = 'danger';
    //     }
    //     return view('backend_home.pages.employer_all', compact('logo','user','employer','show1','red1'));
    // }

    public function indexss(){
        $logo = Logo::select('logo_pic')->first();

        $user = User::select('status')->where('role', 'employer')->first();

        if ($user['status'] == 0) {
            $employer = User::select('users.id', 'users.name', 'users.email', 'users.phone', 'users.profile_pic', 'users.address', 'users.role', 'users.created_at', DB::raw('AVG(employer_comment.freelancer_rating) as avg_rating'), DB::raw('COUNT(employer_comment.freelancer_id) as count_freelancer'))
                            ->leftJoin('employer_comment', 'users.id', '=', 'employer_comment.user_id')
                            ->where('users.role', 'employer')
                            ->groupBy('users.id', 'users.name', 'users.email', 'users.phone', 'users.profile_pic', 'users.address', 'users.role', 'users.created_at')
                            ->limit(2)
                            ->get();
            $show1 = 'show more';
            $red1 = 'primary';
        } else {
            $employer = User::select('users.id', 'users.name', 'users.email', 'users.phone', 'users.profile_pic', 'users.address', 'users.role', 'users.created_at', DB::raw('AVG(employer_comment.freelancer_rating) as avg_rating'), DB::raw('COUNT(employer_comment.freelancer_id) as count_freelancer'))
                            ->leftJoin('employer_comment', 'users.id', '=', 'employer_comment.user_id')
                            ->where('users.role', 'employer')
                            ->groupBy('users.id', 'users.name', 'users.email', 'users.phone', 'users.profile_pic', 'users.address', 'users.role', 'users.created_at')
                            ->get();
            $show1 = 'show less';
            $red1 = 'danger';
        }

        return view('backend_home.pages.employer_all', compact('logo','user','employer','show1','red1'));
    }



    public function modal_employer($id){
        $user = User::select('*')->where('id', $id)->get();
        return view('backend_home.pages.modal_employer',compact('user'));
    }

    public function show_employer()
    {
        $status = User::select('status')->first();
            if($status['status'] == 0)
            {
                User::where('status','0')
                ->update([
                    'status' => '1'
                ]);
            }
            else{
                User::where('status','1')
                ->update([
                    'status' => '0'
                ]);
            }
        return redirect()->back();
    }

    //FOR EMPLOYER PAGE
    public function developer(){
        $logo = Logo::select('logo_pic')->first();
        return view('backend_home.pages.developer', compact('logo'));
    }

}

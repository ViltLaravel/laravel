<?php

namespace App\Http\Controllers\Home;

use App\Models\Logo;
use App\Models\freelancerlists;
use App\Models\User;
use App\Models\Address;
use App\Models\Skills;
use App\Models\JobTitle;
use Illuminate\Http\Request;
use App\Models\AllFreelancerlist;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Cache\RateLimiting\Limit;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;


class MainController extends Controller
{
    public function show_freelancer()
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

    public function index()
        {
            SEOMeta::setTitle('Landing Page');
            OpenGraph::setTitle('etrabaho | Pilar');

            $logo = Logo::select('logo_pic')->first();
            $jobtitle = JobTitle::all();
            $freelancer_status = User::select('status')->where('role','freelancer')->first();
            $all = JobTitle::all()->sortBy('categoryname');
            // $address = Address::all()->sortBy('name');
            $address = Skills::all();
            $allergy = JobTitle::select('categoryname')->first();

            $freelancers = User::with(['freelancer_skills' => function($query){
                $query->join('skills','skills.id','=','freelancer_skills.skill_id');
                $query->select('skills.*','freelancer_skills.*');
            }])->get();

            $freelists = User::with(['freelancerlists' => function($query){
                $query->join('category','category.id','=','freelancerlists.job_title_id');
                $query->select('category.*','freelancerlists.*');
            }])->get();


            if($freelancer_status['status'] == 0)
            {
                $freelancer = User::select('*')->where('role','freelancer')->limit(1)->get();
                $show1 = 'show more';
                $red1 = 'primary';
            }
            else
            {
                $freelancer = User::select('*')->where('role','freelancer')->get();
                $show1 = 'show less';
                $red1 = 'danger';
            }
            // Get all categories with their freelancer count
            $countme = DB::table('category')
                        ->leftJoin('freelancerlists', 'category.id', '=', 'freelancerlists.job_title_id')
                        ->select('category.categoryname', DB::raw('count(freelancerlists.id) as count'))
                        ->groupBy('category.id', 'category.categoryname')
                        ->orderBy('category.categoryname', 'asc')
                        ->get();

            // Check if "show all" button was clicked
            $showAll = request()->has('show_all');

            // If not showing all, limit to 4 categories
            if (!$showAll) {
                $countme = $countme->take(4);
            }
        return view('backend_home.dashboard', compact('all','freelists','showAll','allergy', 'countme', 'freelancers', 'logo', 'freelancer', 'jobtitle','red1', 'show1', 'address'));
        }

        public function getFreelancersByCategory($category_id)
        {
                $freelancers = JobTitle::with(['freelancerlists' => function ($query) use ($category_id) {
                    $query->join('users', 'users.id', '=', 'freelancerlists.user_id');
                    $query->leftJoin('hiring', function ($join) {
                        $join->on('users.id', '=', 'hiring.user_id')
                            ->where('hiring.status', '=', '1');
                    });
                    $query->leftJoin('freelancer_comment', function ($join) use ($category_id) {
                        $join->on('freelancerlists.user_id', '=', 'freelancer_comment.user_id')
                            ->where('freelancer_comment.job_title_id', '=', $category_id);
                    });
                    $query->select('users.*', 'freelancerlists.*', 'hiring.status as hstatus',
                        DB::raw("CONCAT(DATE_FORMAT(hiring.start_contract, '%M %d, %Y'), ' - ', DATE_FORMAT(hiring.end_contract, '%M %d, %Y')) AS contract_period"),
                        DB::raw('COALESCE(ROUND(AVG(freelancer_comment.employer_rating), 1), 0) AS avg_rating'),
                        DB::raw('COUNT(DISTINCT(freelancer_comment.employer_id)) AS feedback_count')
                    );
                    $query->where('freelancerlists.job_title_id', $category_id);
                    $query->groupBy('users.id','users.name','users.password','users.profile_pic','users.role','users.dob','users.attachment','users.gender','users.address','users.email','users.email_verified_at','users.remember_token','users.created_at','users.updated_at','users.verified','users.phone','users.status','users.resume','users.rating','users.salary','freelancerlists.id','freelancerlists.user_id','freelancerlists.user_id','freelancerlists.job_title_id','freelancerlists.created_at','freelancerlists.updated_at','hiring.status','hiring.start_contract','hiring.end_contract'); // Add 'users.id' to group by statement
                }])
                ->get();

            return response()->json($freelancers);
        }

        public function showFreelancers($id)
        {
            $freelancers = JobTitle::with(['freelancerlists' => function ($query) use ($id) {
                $query->join('users', 'users.id', '=', 'freelancerlists.user_id');
                $query->leftJoin('hiring', function ($join) {
                    $join->on('users.id', '=', 'hiring.user_id')
                        ->where('hiring.status', '=', '1');
                });
                $query->leftJoin('freelancer_comment', function ($join) use ($id) {
                    $join->on('freelancerlists.user_id', '=', 'freelancer_comment.user_id')
                        ->where('freelancer_comment.job_title_id', '=', $id);
                });
                $query->select('users.*', 'freelancerlists.*', 'hiring.status as hstatus',
                    DB::raw("CONCAT(DATE_FORMAT(hiring.start_contract, '%M %d, %Y'), ' - ', DATE_FORMAT(hiring.end_contract, '%M %d, %Y')) AS contract_period"),
                    DB::raw('COALESCE(ROUND(AVG(freelancer_comment.employer_rating), 1), 0) AS avg_rating'),
                    DB::raw('COUNT(DISTINCT(freelancer_comment.employer_id)) AS feedback_count')
                );
                $query->where('freelancerlists.job_title_id', $id);
                $query->groupBy('users.id','users.name','users.password','users.profile_pic','users.role','users.dob','users.attachment','users.gender','users.address','users.email','users.email_verified_at','users.remember_token','users.created_at','users.updated_at','users.verified','users.phone','users.status','users.resume','users.rating','users.salary','freelancerlists.id','freelancerlists.user_id','freelancerlists.user_id','freelancerlists.job_title_id','freelancerlists.created_at','freelancerlists.updated_at','hiring.status','hiring.start_contract','hiring.end_contract'); // Add 'users.id' to group by statement
            }])
            ->get();

            return response()->json($freelancers);
        }


        public function show_modal($modalId)
        {
            $freelancers = User::with(['freelancerlists' => function ($query) use ($modalId)
            {
                $query->join('category', 'category.id', '=', 'freelancerlists.job_title_id');
                $query->select('category.*','freelancerlists.*');
            }
            ])->with(['freelancer_skills' => function ($query) use ($modalId) {
                    $query->join('skills', 'skills.id', '=', 'freelancer_skills.skill_id');
                    $query->select('skills.*','freelancer_skills.*');
                    }])
            ->whereid($modalId)
            ->get();

            return response()->json($freelancers);
        }


}


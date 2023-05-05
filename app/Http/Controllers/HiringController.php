<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Hiring;
use App\Models\User;
use Carbon\Carbon;

class HiringController extends Controller
{
    public function get_freelancer()
    {

        $freelancer = Hiring::join('users','users.id','=','hiring.user_id')
                    ->select('users.*','hiring.*')
                    ->where('hiring.employee_id', Auth::user()->id)
                    ->get();
        $logo = Logo::select('logo_pic')->first();
        return view('backend.hiring.employeer_Hiring.index', compact('logo','freelancer'));
    }

    public function get_admin()
    {
        $freelancer = Hiring::join('users', 'users.id', '=', 'hiring.user_id')
            ->join('users as employers', 'employers.id', '=', 'hiring.employee_id')
            ->select('users.*', 'hiring.*', 'hiring.employee_id', 'employers.name as employer_name', 'employers.email as employer_email')
            ->get();

        $logo = Logo::select('logo_pic')->first();
        return view('backend.hiring.adminViewTransaction.index', compact('logo', 'freelancer'));
    }


    public function get_employeer()
    {

        $employeer = Hiring::join('users','users.id','=','hiring.employee_id')
                    ->select('users.*','hiring.*')
                    ->where('hiring.user_id', Auth::user()->id)
                    ->get();
        $logo = Logo::select('logo_pic')->first();
        // return $employeer;
        return view('backend.hiring.freelancer_Hiring.index', compact('logo','employeer'));
    }


    public function sendMessage(Request $request)
    {
        // Guard clause: If user is not logged in, redirect to login page
        if (!Auth::user()) {
            return redirect()->route('login');
        }

              // Guard clause: If user is not an employer, flash warning message and redirect back
              if (auth()->user()->role !== 'employer') {
                session()->flash('warning', 'You must be an employer to hire this freelancer!');
                return redirect()->back();
            }

            // Extracted function: Check if hiring record already exists
            if ($this->hiringRecordExists($request->modalId)) {
                session()->flash('warning', 'You have already send request to this freelancer!');
                return redirect()->back();
            }

        // Validate input: Ensure that file input exists
        $request->validate([
            'emp_attachment' => 'required|file',
        ]);

        $file = $request->file('emp_attachment');
        // Generate a unique file name
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        // Save the file to the public/uploads directory
        $file->move(public_path('emp_Attachment'), $fileName);

        // Convert date strings to Carbon objects
        $s_contract = Carbon::createFromFormat('Y-m-d', $request->start)->format('Y-m-d');
        $e_contract = Carbon::createFromFormat('Y-m-d', $request->end)->format('Y-m-d');

        // Create hiring record
        $hiring = Hiring::create([
            'user_id' => $request->input('modalId'),
            'employee_id' => Auth()->user()->id,
            'emp_attachment' => $fileName,
            'emp_message' => $request->message,
            'start_contract' => $s_contract,
            'end_contract' => $e_contract,
        ]);

        // Flash success message
        session()->flash('success', 'Successfully send request!');
        return redirect()->back();
    }

    /**
     * Check if a hiring record already exists for the given user ID and employer ID.
     *
     * @param int $userId The user ID to check for.
     * @return bool True if a hiring record exists, false otherwise.
     */
    private function hiringRecordExists(int $userId): bool
    {
        return Hiring::where('user_id', $userId)
            ->where('employee_id', auth()->id())
            ->exists();
    }




    public function acceptEmployeer(Request $request)
    {
        $hiring = Hiring::whereId($request->status )->update([
            'status' => '1'
        ]);

        if ($hiring) {
            $notification= array
            (
                'messege'=>'Successfully employeer accepted',
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

    public function delete(Request $request)
    {
        $delete = DB::table('hiring')->where('id', $request->decline)->delete();

        if ($delete) {
            $notification= array
            (
                'messege'=>'Successfully transaction declined',
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

    public function index()
    {
        if(!Auth::user()){
            return redirect(route('login'));
        }
            return view('backend.hiring.hiringAll.hiring_All');
    }

}

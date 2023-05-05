<?php

namespace App\Http\Controllers\admin;

use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SkillsController extends Controller
{
    public function all(){
        $logo = Logo::select('logo_pic')->first();
        $all = DB::table('skills')->get();
        return view('backend.skills.all_skills', compact('logo','all')); 
    }

    //Add User & Insert User
    public function index(){
        $logo = Logo::select('logo_pic')->first();
        return view('backend.skills.add_skills',compact('logo'));
    }

    public function insert(Request $request){
         $data= array();
         $data['skills_name']=$request->skills_name;
         $data['created_at']= date('Y-m-d H:i:s');
         $data['updated_at']= date('Y-m-d H:i:s');

         $insert = DB::table('skills')->insert($data);

         if ($insert) {

             $notification= array
             (
                 'messege'=>'Successfully Skills inserted',
                 'alert-type'=>'success'
             );
             return redirect()->route('all.skills')->with($notification);
         }
         else
         {
             $notification= array
             (
                 'messege'=>'Something in Wrong',
                 'alert-type'=>'error'
             );
             return redirect()->route('all.skills')->with($notification);
         }

        
    }

    public function edit($id){
        $logo = Logo::select('logo_pic')->first();
        $edit = DB::table('skills')->where('id', $id)->first();
        return view('backend.skills.edit_skills', compact('edit','logo'));
    }

    public function update(Request $request, $id){
         $data= array();
         $data['skills_name']=$request->skills_name;
         $data['created_at']= date('Y-m-d H:i:s');
         $data['updated_at']= date('Y-m-d H:i:s');

         $update = DB::table('skills')
         ->where ('id', $id)
         ->update($data);

         if ($update) {

             $notification= array
             (
                 'messege'=>'Successfully Skills updated',
                 'alert-type'=>'success'
             );
             return redirect()->route('all.skills')->with($notification);
         }
         else
         {
             $notification= array
             (
                 'messege'=>'Something in Wrong',
                 'alert-type'=>'error'
             );
             return redirect()->route('all.skills')->with($notification);
         }

    }

    public function delete($id){
        try {
            $delete = DB::table('skills')->where('id', $id)->delete();
    
            if ($delete) {
                $notification= array
                (
                    'messege'=>'Successfully Skills deleted',
                    'alert-type'=>'success'
                );
                return redirect()->route('all.skills')->with($notification);
            } else {
                $notification= array
                (
                    'messege'=>'Something went wrong',
                    'alert-type'=>'error'
                );
                return redirect()->route('all.skills')->with($notification);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            $notification= array
            (
                'messege'=>'You do not have permission to perform this action',
                'alert-type'=>'error'
            );
            return redirect()->route('all.skills')->with($notification);
        }
    }


}
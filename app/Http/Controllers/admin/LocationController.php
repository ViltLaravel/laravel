<?php

namespace App\Http\Controllers\admin;

use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function all(){
        $all = DB::table('address')->orderBy('name')->get();
        $logo = Logo::select('logo_pic')->first();
        return view('backend.address.all_address', compact('logo','all'));
    }
    public function index(){
        $logo = Logo::select('logo_pic')->first();
        return view('backend.address.add_address',compact('logo'));
    }
    public function insert(Request $request){
        $data= array();
         $data['name']=$request->name;
         $data['created_at']= date('Y-m-d H:i:s');
         $data['updated_at']= date('Y-m-d H:i:s');

         $insert = DB::table('address')->insert($data);

         if ($insert) {

             $notification= array
             (
                 'messege'=>'Successfully Address inserted',
                 'alert-type'=>'success'
             );
             return redirect()->route('all.address')->with($notification);
         }
         else
         {
             $notification= array
             (
                 'messege'=>'Something in Wrong',
                 'alert-type'=>'error'
             );
             return redirect()->route('all.address')->with($notification);
         }


    }
    public function edit($id){
        $logo = Logo::select('logo_pic')->first();
        $edit = DB::table('address')->where('id', $id)->first();
        return view('backend.address.edit_address', compact('logo','edit'));
    }
    public function update(Request $request, $id){
        $data= array();
        $data['name']=$request->name;
        $data['created_at']= date('Y-m-d H:i:s');
        $data['updated_at']= date('Y-m-d H:i:s');

        $update = DB::table('address')
        ->where ('id', $id)
        ->update($data);

        if ($update) {

            $notification= array
            (
                'messege'=>'Successfully Address updated',
                'alert-type'=>'success'
            );
            return redirect()->route('all.address')->with($notification);
        }
        else
        {
            $notification= array
            (
                'messege'=>'Something in Wrong',
                'alert-type'=>'error'
            );
            return redirect()->route('all.address')->with($notification);
        }
    }
    public function delete($id){
        $delete = DB::table('address')->where('id', $id)->delete();

        if ($delete) {
            $notification= array
            (
                'messege'=>'Successfully Address deleted',
                'alert-type'=>'success'
            );
            return redirect()->route('all.address')->with($notification);
        }
        else
        {
            $notification= array
            (
                'messege'=>'Something in Wrong',
                'alert-type'=>'error'
            );
            return redirect()->route('all.address')->with($notification);
        }

    }
}

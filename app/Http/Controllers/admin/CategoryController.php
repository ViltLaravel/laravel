<?php
namespace App\Http\Controllers\admin;

use App\Models\Logo;

use App\Models\User;
use App\Models\JobTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all(){
        $logo = Logo::select('logo_pic')->first();
        $all = DB::table('category')->orderBy('categoryname')->get();

        return view('backend.category.all_category', compact('logo','all'));
    }

    public function index(){
        $logo = Logo::select('logo_pic')->first();
        return view('backend.category.add_category',compact('logo'));
    }

    public function insert(Request $request){
         $data= array();
         $data['categoryname']=$request->categoryname;
         $data['status']=$request->status == '0';
         $data['created_at']= date('Y-m-d H:i:s');
         $data['updated_at']= date('Y-m-d H:i:s');

         $insert = DB::table('category')->insert($data);

         if ($insert) {

             $notification= array
             (
                 'messege'=>'Successfully Job Title inserted',
                 'alert-type'=>'success'
             );
             return redirect()->route('allcategory')->with($notification);
         }
         else
         {
             $notification= array
             (
                 'messege'=>'Something in Wrong',
                 'alert-type'=>'error'
             );
             return redirect()->route('allcategory')->with($notification);
         }


    }

    public function edit($id){
        $logo = Logo::select('logo_pic')->first();
        $edit = DB::table('category')->where('id', $id)->first();
        return view('backend.category.edit_category', compact('edit','logo'));
    }

    public function update(Request $request, $id){
         $data= array();
         $data['categoryname']=$request->categoryname;
         $data['created_at']= date('Y-m-d H:i:s');
         $data['updated_at']= date('Y-m-d H:i:s');

         $update = DB::table('category')
         ->where ('id', $id)
         ->update($data);

         if ($update) {

             $notification= array
             (
                 'messege'=>'Successfully Job Title updated',
                 'alert-type'=>'success'
             );
             return redirect()->route('allcategory')->with($notification);
         }
         else
         {
             $notification= array
             (
                 'messege'=>'Something in Wrong',
                 'alert-type'=>'error'
             );
             return redirect()->route('allcategory')->with($notification);
         }

    }

    public function delete($id){
        try {
            $delete = DB::table('category')->where('id', $id)->delete();

            if ($delete) {
                $notification= array
                (
                    'messege'=>'Successfully Job deleted',
                    'alert-type'=>'success'
                );
                return redirect()->route('allcategory')->with($notification);
            } else {
                $notification= array
                (
                    'messege'=>'Something went wrong',
                    'alert-type'=>'error'
                );
                return redirect()->route('allcategory')->with($notification);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            $notification= array
            (
                'messege'=>'You do not have permission to perform this action',
                'alert-type'=>'error'
            );
            return redirect()->route('allcategory')->with($notification);
        }
    }



}

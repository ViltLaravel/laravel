<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Hash;
//use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'          => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'      => ['required', 'string', 'min:8', 'confirmed'],
            'dob'           => ['required', 'date'],
            'phone'         => ['required', 'string', 'min:10', 'max:15'],
            'address'       => ['required', 'string', 'max:255'],
            'attachment'    => ['required', 'file', 'mimes:pdf,doc,docx,png,jpeg,jpg,gif', 'max:2048'],
            'role'          => ['required', 'in:employer,freelancer'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */


    protected function create(array $data)
    {
        $status = User::select('status')->first();
        $user = new User;


        if($status ['status'] == '0'){
            $user->status = $data['status'] = '0';
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);

        if (isset($data['attachment'])) {
            // Get the file
            $file = $data['attachment'];
            // Generate a unique file name
            $fileName = time().'.'.$file->getClientOriginalExtension();
            // Save the file to the public/uploads directory
            $file->move(public_path('attachments'), $fileName);
            $user->attachment = $fileName;
        }
            $user->dob = $data['dob'] ?? null;
            $user->address = $data['address'] ?? null;
            $user->phone = $data['phone'] ?? null;
            $user->role = $data['role'] ?? null;
        }else{
            $user->status = $data['status'] = '1';
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            
            if (isset($data['attachment'])) {
            // Get the file
            $file = $data['attachment'];
            // Generate a unique file name
            $fileName = time().'.'.$file->getClientOriginalExtension();
            // Save the file to the public/uploads directory
            $file->move(public_path('attachments'), $fileName);
            $user->attachment = $fileName;
        }
            $user->dob = $data['dob'] ?? null;
            $user->address = $data['address'] ?? null;
            $user->phone = $data['phone'] ?? null;
            $user->role = $data['role'] ?? null;
        }

        $user->save();

        return $user;
    }

}

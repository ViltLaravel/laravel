<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoEmail;
use Illuminate\Http\Request;

class MailSendController extends Controller
{
    public function index(){
        return view('backend_home.pages.contact');
    }

    public function sendEmail()
    {
        $data = request([
                'name', 'email','subject', 'message'
        ]);

        Mail::to('nicoleamoguis15@gmail.com')->send(new DemoEmail($data));

        session()->flash('success', 'Message Sent Successfully!');
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\welcomeemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail()
    {
        // $toEmail = "partha.floranet@gmail.com";
        // $message = "Welcome to our website";
        //$subject = "With Best Regards form Partha Mondal";

        //$request = Mail::to($toEmail)->queue(new welcomeemail($message));

        //dd($request);
    }

    public function emailForm()
    {
        return view('mail.form');
    }

    public function sendContactEmail(Request $request)
    {
        $toEmail = "partha.floranet@gmail.com";
        $message = "Welcome to our website";
        //dd("hello");
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|min:5|max:100',
            'message' => 'required|min:10|max:255',
            'attachment' => 'required|mimes:pdf,doc,docx,xls,xlsx|max:2048',
        ]);
        //dd("hello");
        $fileName = time() . "." . $request->file('attachment')->extension();
        $request->file('attachment')->move('uploads', $fileName);

        $adminEmail = "partha.floranet@gmail.com";

        $request = Mail::to($adminEmail)->send(new welcomeemail($request->all(), $fileName));
        //dd($fileName);
        //dd($request->name);

        if ($request) {
            return redirect("/email-form");
        } else {
            //
        }
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class ResetPasswordController extends Controller
{

    public function forgotpass()
    {
     
        return view('forgotpass');
    }

    public function forgotpassverify(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('emails.forget-password', ['token' => $token], function ($message) use ($request)  {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect('forgotpass')->with('message','We have sent an email to reset your password');


    }

    public function resetPassword($token)
        {
         return view('resetlink',compact('token'));
        }

    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword =  DB::table('password_reset_tokens')
        ->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if(!$updatePassword){
            return redirect('reset.password')->with('message','Invalid request');
        }

        User::where('email',$request->email)->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

        return redirect('login')->with('message','Your password updated successfully!');
    }
}

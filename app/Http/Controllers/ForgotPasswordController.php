<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    function ForgotPassword() {
        return view("forgot-password");
    }

    function forgotPasswordPost(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send("emails.forgot-password", [
            'token' => $token
        ], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject("Reset your password");
        });

        return redirect()->to(route("forgot-password"))->with("success", "We have emailed your password reset link!");
    }

    function resetPassword() {

    }
}

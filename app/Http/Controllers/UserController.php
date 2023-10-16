<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request) {
        $incomingFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'phone_number' => 'required',
            'password' => [
                'required', 'min:5', 'max:200']
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']); //Hashing password
        User::create($incomingFields);


        return 'register';
    }
}

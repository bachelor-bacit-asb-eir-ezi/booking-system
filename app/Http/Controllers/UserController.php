<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $request) {
        $incomingFields = $request->validate([
            'login_email' => 'required|email',
            'login_password' => 'required'
        ]);

        if (auth()->attempt([
            'email' => $incomingFields['login_email'], 
            'password' => $incomingFields['login_password']
        ])) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }
    public function logout() {
        auth()->logout();
        return redirect('/');
    }

    public function register(Request $request) {
        $incomingFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'phone_number' => 'required',
            'password' => [
                'required', 'min:5', 'max:200']
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']); //Hashing password
        $user = User::create($incomingFields);
        auth()->login($user);

        return redirect('/');
    }
};

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller {
    public function index() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $attrs = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Password::min(5)->letters()],
        ]);

        $user = User::create(array_merge(
            $attrs,
            ['email_verified_at' => now()]
        ));

        Auth::login($user);

        return redirect('/products');
    }
}

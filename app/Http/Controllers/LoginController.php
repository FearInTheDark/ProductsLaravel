<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller {
    public function index() {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse {
        $attr = $request->validate([
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', Password::min(5)->letters()],
        ]);

        if (!Auth::attempt($attr)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match'
            ]);
        }

        $request->session()->regenerate();

        if (request('dynamic')) {
            return back();
        }
        return redirect('/products');
    }
}

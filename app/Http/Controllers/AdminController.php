<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse
    {

        if(Auth::check()) {
            return redirect(route('admin.posts'));
        }

        if(!$request->isMethod('POST')) {
            return view('admin.login');
        }

        if(Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended(route('admin.posts'));
        }

        return redirect()->route('login')->withInput(['email', 'remember'])->withErrors([
            'login' => 'The email or password is incorrect.',
        ]);
    }

    public function logout(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('posts'));
    }
}

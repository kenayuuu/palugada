<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Obat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ]
        );

        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Login successfully, Welcome!'. Auth::user()->name);
        }

        return back()->withErrors(
            [
                'email' => 'Invalid email or password',
            ]
        )->onlyInput('email');
    }

/**
 * Log the user out of the application.
 */
public function logout(Request $request): RedirectResponse
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
}

public function dataPalugada()
{
    $obats = Obat::latest()->paginate(6);
        return view('homepage', compact('obats'));
}

}

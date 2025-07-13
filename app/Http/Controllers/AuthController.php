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

 public function registerForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:3|confirmed',
        ]);

        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'role' => 'user',
        ]);

        Auth::login($user);
        return redirect('/')->with('success', 'Registrasi berhasil!');
    }

    public function dataPalugada()
    {
        $obats = Obat::latest()->paginate(6);
        return view('homepage', compact('obats'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['login', 'register']);

    }
    // public function __construct()
    // {
    //     $this->middleware('auth')->except('login');
    // }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            
            return redirect('/')->with('login_err', 'Aucun compte existe avec cette adresse.');
        }

        if (Auth::attempt($credentials)) {
            // Authentification réussie
            $request->session()->put('user', $user->prenom);
            $request->session()->put('id', $user->id);
            return redirect()->intended('admindash');
        } else {
            return redirect('/')->with('login_err', 'Adresse e-mail ou mot de passe incorrect.');
        }
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'numero' => 'required|max:10',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'prenom' => $data['prenom'],
            'numero' => $data['numero'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'newsletters' => isset($data['newsletters']) ? 1 : 0,
        ]);

        Auth::login($user);
        return redirect('admindash')->with('success', 'Inscription réussie.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

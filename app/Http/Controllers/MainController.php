<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function index()
    {
        return view('main.index');
    }

    public function login()
    {
        return view('main.login');
    }

    public function register(Request  $request)
    {
        if (isset($_POST['phone_number'])) {
            $validated = $request->validate([
                'phone_number' => 'required|max:14|min:5',
                'password' => 'required|max:100|min:6',
            ]);

            if ($request->input('password') !=  $request->input('password1')) {
                $errors['password1'] = "Password don't match";
                return redirect('register')
                    ->withErrors($errors)
                    ->withInput();
            }

            $u['name'] = "";
            $u['email'] = $request->input("phone_number") . rand(10000, 100000);
            $u['password'] = Hash::make($request->input("password"));
            $users = User::create($u);

            $credentials['email'] = $u['email'];
            $credentials['password'] = $request->input("password");

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('dashboard');
            } else {
                return redirect()->intended('login');
            }
        }
        return view('main.register');
    }

    public function about()
    {
        dd("about us!");
    }
}

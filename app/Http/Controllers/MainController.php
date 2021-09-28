<?php

namespace App\Http\Controllers;

use App\Models\Product;
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

    public function slugSwitcher()
    {
        $seg = request()->segment(1);
        $pro = Product::where('slug', $seg)->first();
        if ($pro) {
            return view('main.display-ad');
            return;
        }
        return dd($seg);
    }

    public function login(Request  $request)
    {
        if (isset($_POST['phone_number'])) {

            $u['email'] = $_POST['phone_number'];
            $u['password'] = $_POST['password'];

            if (Auth::attempt($u)) {
                $errors['success'] = "Account created successfully!";
                return redirect('dashboard')
                    ->withErrors($errors)
                    ->withInput();
            } else {
                $errors['password'] = "Wrong password";
                return redirect('login')
                    ->withErrors($errors)
                    ->withInput();
            }
        }

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
            $u['email'] = $request->input("phone_number");
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

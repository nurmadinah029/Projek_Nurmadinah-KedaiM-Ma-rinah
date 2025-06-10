<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function AdminLogin()
    {
        return view('Admin.login');
    }
    public function kasirLogin()
    {
        return view('kasir.login');
    }
    public function pembeliLogin()
    {
        return view('Pembeli.login');
    }
    public function kasirregister()
    {
        return view('kasir.register');
    }
    public function pembeliregister()
    {
        return view('Pembeli.register');
    }
    public function Login(Request $request, $role)
    {
        Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required'=>'wajib di isi',
            'password.required'=>'wajib di isi'
        ]);
        $info_Login = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        $user = \App\Models\User::where('email', $request->email)->first();
        if (!$user || $user->role !== $role) {
            return back()->withErrors(['login' => 'Akun ini tidak terdaftar sebagai ' . $role]);
        }
        if(Auth::attempt($info_Login)){
            if(Auth::user()->role=='Admin'){
                return redirect('admin');
            }
            elseif(Auth::user()->role == 'Kasir'){
                return redirect('kasir');
            }
            elseif(Auth::user()->role == 'Pembeli'){
                return redirect('halaman');
            }

        }else{
            return redirect()->back()->withErrors(['login'=>'Username dan password tidak valid!!'])->withInput();
        }

    }
    // register
    public function register(Request $request, $role)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ], [
            'name.required' => 'Nama wajib di isi',
            'email.required' => 'Email wajib di isi',
            'email.email' => 'email tidak valid',
            'email.unique' => 'email sudah digunakan, gunakan email yang lain',
            'password.required' => 'password wajib di isi',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role,
        ];
        
        $user = User::create($data);
        Auth::login($user);
        // arahkan sesuai role
        if ($role === 'Pembeli') {
            return redirect('halaman');
        }elseif($role == 'Kasir'){
            return redirect('kasir');
        }

        return redirect('/');
    }
    // end register
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('halaman');
    }
}

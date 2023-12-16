<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class AuthController extends Controller
{
    protected $folderPath;

    public function __construct(){
        $this->folderPath = 'admin.auth.';
    }

    public function login(){
        return view($this->folderPath.'login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.city.index')->withSuccess('You have Successfully login!');
        }
        return redirect()->back()->with('invalid','You have entered invalid credentials!');

    }

    public function logout() {
        Session::flush();
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}

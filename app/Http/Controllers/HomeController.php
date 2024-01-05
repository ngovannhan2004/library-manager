<?php

namespace App\Http\Controllers;

use App\Http\services\UserService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('home');
    }

    public function login()
    {
        return view('admin.pages.auth.login');
    }

    public function loginPost(Request $request)
    {
        $checkLogin = $this->userService->login($request);
        if($checkLogin !== null){
            auth()->login($checkLogin);
            return redirect()->route('admin.books.index')->with('success', 'Đăng nhập thành công');
        }
        return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không chính xác');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.auth.login');
    }

    public function register()
    {
        $users = $this->userService->getAll();
        return view('admin.pages.auth.register', compact('users'));
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        $user = $this->userService->create($request);
        if ($user) {
            //set auth user
            auth()->login($user);
            return redirect()->route('admin.auth.login')->with('success', 'Register success');
        } else {
            return redirect()->route('admin.auth.register')->with('error', 'Register failed');
        }
    }
}

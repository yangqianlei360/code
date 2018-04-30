<?php


namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $admin = $request->admin;
        $password = $request->password;
        if (empty($admin) || empty($password)) {
            return jump('error', '用户名密码不能为空', route('admin.login'));
        }
        if (! Auth::guard('admin')->attempt(['admin' => $admin, 'password' => $password])) {
            return jump('error', '用户名密码不匹配', route('login'));
        }
        return redirect('/admin/home');
    }
}
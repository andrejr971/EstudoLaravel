<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required',
        ]);

        $credenciais = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $authOk = Auth::guard('admin')->attempt($credenciais, $request->remember);

        if($authOk) {
            return redirect()->intended(route('homeAdmin'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function index() {
        return view('auth.Adminlogin');
    }
}

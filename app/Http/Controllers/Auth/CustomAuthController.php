<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CustomAuthController extends Controller
{
    public function adualts()
    {
        return view ('customAuth.index') ;
    }

    public function notAllowed()
    {
        return 'Sorry {' . Auth::user()->name . '} This Page Not Allowed For You ' ;
    }

    public function Admin ()
    {
        return view ('admin') ; 
    }

    public function user ()
    {
        return view ('site') ; 
    }

    public function adminLogin()
    {
        return view ('auth.admin-login') ;
    }

    public function checkAdminLogin(Request $request)
    {
        $this->validate($request, 
        [
            'email'   => 'required|email',
            'password' => 'required|min:5'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) 
        {
            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email'));
    }
}
 
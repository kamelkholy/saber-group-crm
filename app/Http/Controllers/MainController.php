<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;
use App\Customer;
use App\Shift;

use Auth;

class MainController extends Controller
{
    public function login()
    {
    	return view('layouts.login');
    }


    public function checkuser()
    {
        if (Auth::attempt(request(['email', 'password']))) {
            if (Auth::user()->user_status == 0) {
                if(Auth::user()->user_type == 1)
                {

                	return redirect('/admin');
                }

                elseif(Auth::user()->user_type == 2)
                {
                	return redirect('/client');
                }

                elseif(Auth::user()->user_type == 3)
                {
                	return redirect('/moderation');
                }
                elseif(Auth::user()->user_type == 4)
                {
                    return redirect('/sales');
                }

                 elseif(Auth::user()->user_type == 5)
                {
                    return redirect('/moderation');
                }
            } else {
                return back()->withErrors([
                    'message' => ' Your Account Not Allowed ']);
            }

        } else {
            return back()->withErrors([
                'message' => 'Please Check Your E-mail And Password']);

        }
    }

    public function logout()
    {
        auth::logout();
        return redirect('/');
    }
}

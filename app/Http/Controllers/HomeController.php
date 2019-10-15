<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        return view('index');
    }
    public function home()
    {
        return view('home');
    }
    public function login()
    {
        return view('login');
    }
    public function actionLogin(Request $request)
    {
        $values = $request->only(['email', 'password', 'remember']);
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
        ]);
        if ($validator->fails()) {
            return view('notAuthorized');
        }
        if (Auth::guard('admin')->attempt(['email' => $values['email'], 'password' => $values['password']], $values['remember'])) {
            return view('home');
        }
        else {
            return view('notAuthorized');
        } 
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return route('index');
    }
    public function notAuthorized()
    {
        return view('notAuthorized');
    }
}
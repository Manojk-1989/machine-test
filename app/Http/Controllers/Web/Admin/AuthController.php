<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Auth;

class AuthController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(AuthRequest $request)
    {
        if (Auth::attempt($request->only('email','password'))) {
            # code...
            return redirect()->intended(route('company.create'))
                            ->with('status','You have Successfully loggedin');
        } else {
            return redirect()
                        ->back()
                        ->withInput()
                        ->with('error','You have entered invalid credentials');
        }
    }

    
}

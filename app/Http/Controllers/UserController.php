<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:16',
            'password' => 'required|min:6|max:22'
        ]);

        return $request->input();
    }
    public function register() {}
    public function logout() {}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        $roles = $user->roles()->get();

        return view('user.show', ['user' => $user, 'roles' => $roles]);
    }
}

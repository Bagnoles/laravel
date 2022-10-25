<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;


class UsersController extends Controller
{
    public function showUsers()
    {
        return view('admin.usersList')->with('users', User::all());
    }

    public function userToAdmin($id)
    {
        User::query()->where('id', $id)->update([
            'is_admin' => 1,
        ]);
        return view('admin.usersList')->with('users', User::all());
    }

    public function userDelFromAdmin($id)
    {
        User::query()->where('id', $id)->update([
            'is_admin' => 0,
        ]);
        return view('admin.usersList')->with('users', User::all());
    }
}


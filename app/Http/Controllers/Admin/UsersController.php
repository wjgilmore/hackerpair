<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate();
        return view('admin.users.index')->withUsers($users);
    }

}

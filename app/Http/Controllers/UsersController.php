<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserUpdateRequest;
use App\User;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['edit','show','update','destroy']);
    }

    public function index()
    {
        return view('users.index');
    }

    public function edit(User $user)
    {
        $this->authorize('edit', $user);
        return view('users.edit')->with('user', $user);
    }

    public function update(UserUpdateRequest $request, User $user)
    {

        $user->update(
            $request->input()
        );

        flash('Your account profile has been updated')->success();

        return redirect()->route('users.edit', ['user' => $user]);

    }

}

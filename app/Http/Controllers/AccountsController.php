<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AccountUpdateRequest;
use App\User;

class AccountsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['edit','show','update','destroy']);
    }

    public function index()
    {
        return view('accounts.index');
    }

    public function edit(User $user)
    {
        $this->authorize('edit', $user);
        return view('accounts.edit')->with('user', $user);
    }

    public function update(AccountUpdateRequest $request, User $user)
    {

        $user->update(
            $request->input()
        );

        flash('Your account profile has been updated')->success();

        return redirect()->route('accounts.edit', ['account' => $user->id]);

    }

}

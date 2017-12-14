<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

use Carbon\Carbon;
use Socialite;

use App\User;

class SocialGitHubController extends Controller
{

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {

        $firstName = null;
        $lastName = null;

        $user = Socialite::driver('github')->user();

        $existingUser = User::where('provider_id', $user->getId())->first();

        if ($existingUser) {

            $existingUser->last_login_at = Carbon::now();
            $existingUser->save();

            Auth::login($existingUser);

        } else {

            if ($user->getName()) {

                $name = explode(" ", $user->getName());

                if (count($name) > 1) {
                    $firstName = $name[0];
                    $lastName = $name[1];
                } else {
                    $firstName = $name[0];
                    $lastName = null;
                }

            }

            $newUser = new User();

            $newUser->first_name = $firstName;
            $newUser->last_name = $lastName;
            $newUser->email = $user->getEmail();
            $newUser->provider = 'github';
            $newUser->provider_id = $user->getId();
            $newUser->handle_github = $user->getNickname();
            $newUser->password = bcrypt(uniqid());
            $newUser->last_login_at = Carbon::now();

            $newUser->save();

            Auth::login($newUser);

        }

        flash('Successfully authenticated using GitHub');

        return redirect('/');

    }

}

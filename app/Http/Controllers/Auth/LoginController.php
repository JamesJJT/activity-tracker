<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\LoginUser;
use App\Actions\Auth\LogoutUser;
use App\Http\Requests\Activity\DeleteActivityRequest;
use App\Http\Requests\Auth\LoginRequest;

class LoginController
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request, LoginUser $loginUser)
    {
        $loginUser->handle($request->validated());

        return redirect()->route('activity.index');
    }

    public function destroy(LogoutUser $action)
    {
        $action->handle();

        return redirect()->route('welcome');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\CreateNewUser;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterController
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request, CreateNewUser $action)
    {
        $action->handle($request->validated());

        return redirect()->route('activity.index');
    }

}

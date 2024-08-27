<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterRequest $request) {
        sleep(1);

        $user = User::create($request->safe()->except('password_confirmation'));

        Auth::login($user);

        return redirect()->route('home');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterRequest $request) {
//        sleep(1);

        $fields = $request->safe()->except('password_confirmation');

        if ($request->hasFile('avatar')) {
            $fields['avatar'] = Storage::disk('public')->put('avatars', $request->file('avatar'));
        }

        $user = User::create($fields);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}

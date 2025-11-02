<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Traits\ApiResponses;

class UserController extends Controller
{
    use ApiResponses;

    public function store(RegisterUserRequest $request)
    {
        $validated = $request->validated();
        $user = User::create($validated);
        $token = $user->createToken($user->email)->plainTextToken;

        return $this->success(
            [
                'token' => $token,
                'user' => $user,
            ],
            'Registered successfully!',
            201
        );
    }
}

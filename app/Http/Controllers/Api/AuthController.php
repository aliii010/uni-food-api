<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponses;
    public function login(LoginRequest $request) {
        $validated = $request->validated();

        if (! Auth::attempt($validated)) {
            return $this->error('Invalid credentials!', 401);
        }

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken($user->email)->plainTextToken;

        return $this->success(
            [
                'token' => $token,
                'user' => $user
            ],
            'Logged in successfully!',
            201
        );
    }

    public function logout(Request $request) {
        /** @var \Laravel\Sanctum\PersonalAccessToken|null $token */
        $token = $request->user()->currentAccessToken();
        if ($token) {
            $token->delete();
        }
        return $this->ok([], 'User token deleted successfully!');
    }
}

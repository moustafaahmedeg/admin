<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Api\ApiController;

class UserApiController extends ApiController {
    public function create() {
        $attribute = request()->validate([
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:5|max:255',
        ]);

        $user = User::create($attribute);
        $user->token = $user->createToken(request()->name . now()->toString())
                            ->plainTextToken;

        return $this->jsonSuccess([
                'user' => $user
            ]);
    }

    public function login() {
        $attributes = request()->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:5|max:255|exists:users,password',
        ]);

        $user = User::where('email', request()->email)
                    ->where('password', request()->password)
                    ->first();


        foreach($user->tokens as $token) {
            return $token->plainTextToken;
        }
        
        
        if ($user != null) {
            return $this->jsonSuccess([
                'user' => $user->tokens->plain 
            ]);
        }
        else {
            return $this->jsonError(404);
        }
    }
}
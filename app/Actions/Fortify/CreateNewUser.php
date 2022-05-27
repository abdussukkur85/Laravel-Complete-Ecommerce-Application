<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers {
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input) {

        Validator::make($input, [
            'register_name' => ['required', 'string', 'max:255'],
            'register_phone' => ['required', 'string', 'max:255'],
            'register_email' => [
                'required',
                'string',
                'email',
                'max:255',
                // 'unique:users,email'
                Rule::unique(User::class, 'email'),
            ],
            'register_password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'name' => $input['register_name'],
            'email' => $input['register_email'],
            'phone' => $input['register_phone'],
            'password' => Hash::make($input['register_password']),
        ]);
    }
}

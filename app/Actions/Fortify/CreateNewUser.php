<?php

namespace App\Actions\Fortify;

use App\Models\DataAdmin;
use App\Models\DataParent;
use App\Models\DataStudent;
use App\Models\DataTeacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();
        
        // switch ($input['role']) {
        //     case 1:
        //         $data_id = DataAdmin::create();
        //         $data_type = 'App\Models\DataAdmin';
        //         break;
        //     case 2:
        //         $data_id = DataTeacher::create();
        //         $data_type = 'App\Models\DataTeacher';
        //         break;
        //     case 3:
        //         $data_id = DataParent::create();   
        //         $data_type = 'App\Models\DataParent';        
        //         break;
        //     case 4:
        //         $data_id = DataStudent::create();
        //         $data_type = 'App\Models\DataStudent';
        //         break;
        // }
        // dd($data_id);

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            // 'usertable_id' => $data_id,
            // 'usertable_type' => $data_type,
            'password' => Hash::make($input['password']),
        ]);
    }
}

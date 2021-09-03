<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

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
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'annual_income' => ['required'],
            'job_type' => ['required'],
            'family_type' => ['required'],
            'maritial_status' => ['required'],
            'profile_image' => 'required|mimes:jpg,jpeg,png,JPG,JPEG,PNG',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

         $profile_image = request()->file('profile_image');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($profile_image->getClientOriginalExtension());
        $image_name = $name_gen.'.'.$img_ext;
        $upload_path = 'uploads/profile/';
        $last_image = $upload_path.$image_name;
        $profile_image->move($upload_path,$image_name);

        return User::create([
            'name' => $input['name'],
            'last_name' => $input['last_name'],
            'gender' => $input['gender'],
            'email' => $input['email'],
            'annual_income' => $input['annual_income'],
            'family_type' => $input['family_type'],
            'job_type' => $input['job_type'],
            'maritial_status' => $input['maritial_status'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'date_of_birth' =>$input['dob'],
            'profile_image' => $last_image
        ]);
    }
}

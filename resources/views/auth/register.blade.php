<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>

<!-- Datepicker -->
<link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css' rel='stylesheet' type='text/css'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js' type='text/javascript'></script>
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('First Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Last Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                 <x-jet-label for="name" value="{{ __('Gender') }}" />
              <input class="form-check-input" type="radio" name="gender" value="1" id="radiobutton">
              <label class="form-check-label" for="flexRadioDefault1">
                Male
              </label>
              <input class="form-check-input" type="radio" name="gender" value="2" id="radiobutton">
              <label class="form-check-label" for="flexRadioDefault1">
                Female
              </label>
            </div>

             <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Annual Income') }}" />
                <x-jet-input id="annual_income" class="block mt-1 w-full" type="text" name="annual_income" :value="old('annual_income')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="occupation" value="{{ __('Occupation') }}" />
                <select class="block mt-1 w-full" name="job_type" aria-label="Default select example">
                  <option selected>Select Job Type</option>
                  <option value="1">Private</option>
                  <option value="2">Govt. Employee</option>
                  <option value="3">Business</option>
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="occupation" value="{{ __('Marritial Status') }}" />
                <select class="block mt-1 w-full" name="maritial_status" aria-label="Default select example">
                  <option selected>Select maritial status</option>
                  <option value="0">No</option>
                  <option value="1">Yes</option>
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="occupation" value="{{ __('Family Type') }}" />
                <select class="block mt-1 w-full" name="family_type" aria-label="Default select example">
                  <option selected>Family Type</option>
                  <option value="1">Joint Family</option>
                  <option value="2">Nuclear Family</option>
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="occupation" value="{{ __('DOB') }}" />
                <input type='text' class="block mt-1 w-full" name='dob' id='datepicker' > <br>
                <!-- <input type='text' class="block mt-1 w-full" data-provide="datepicker" style='width: 300px;' > -->
            </div>

            <!-- Script -->
<script type="text/javascript">
$(document).ready(function(){
 $('#datepicker').datepicker(
    {
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true
            }); 
});
</script>


            <div class="mt-4">
                  <div class="form-group">
                <label for="profileImage" class="form-label">Profile</label>
                <input type="file" class="form-control" id="profileImage" name="profile_image" placeholder="Profile Image">
        
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

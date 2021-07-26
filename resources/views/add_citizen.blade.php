<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Add Citizen</h1>
    <br>
    
    <form method="POST" action="/addcitizen">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Surname -->
            <div>
                <x-label for="surname" :value="__('Surname')" />

                <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus />
            </div>

            <div class="form-group row">
                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                <div class="col-sm-6">
                    <select class="form-control" id="gender" name="gender" required focus>
                        <option value="" disabled selected>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            </div>

            <!-- Birth of date -->
            <div>
                <x-label for="birthday" :value="__('Birthday')" />

                <x-input id="birthday" class="block mt-1 w-full" type="date" name="birthday" :value="old('birthday')" required autofocus />
            </div>

            <!-- Profession -->
            <div class="form-group row">
                <label for="profession" class="col-md-4 col-form-label text-md-right">{{ __('Profession') }}</label>
                <div class="col-sm-6">
                    <select class="form-control" id="profession" name="profession" required focus>
                        <option value="" disabled selected>Select Profession</option>
                        <option value="Politicial">Politicial</option>
                        <option value="Actor">Actor</option>
                        <option value="Writer">Writer</option>
                        <option value="Full-Stack Developer">Full-Stack Developer</option>
                        <option value="Student">Student</option>
                    </select>
                </div>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- User Type -->
            <div class="form-group row">
                <label for="user_type" class="col-md-4 col-form-label text-md-right">{{ __('User Type') }}</label>
                <div class="col-sm-6">
                    <select class="form-control" id="user_type" name="user_type" required focus>
                        <option value="" disabled selected>Select Role</option>
                        <option value="Citizen">Citizen</option>
                    </select>
                </div>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
</body>
</html>
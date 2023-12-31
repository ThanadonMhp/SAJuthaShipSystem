@extends('layouts.main')

@section('content')
    @include('alert')

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <form action="{{ route('crews.update', ['user' => $user]) }}" method="post" class="mt-6 space-y-6" enctype="multipart/form-data">
            @csrf
            @method('PUT')

{{--            {{ json_encode($user , JSON_PRETTY_PRINT) }}--}}
            <h1 class="text-4xl mb-6 py-3 text-white">
                <strong>
                Edit User Information
                </strong>
            </h1>
            <div class="grid grid-cols-2 gap-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                    <!-- Profile Image Upload -->
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        @if( $user->imgPath !== null )
                        <img src="{{ asset('storage/' . $user->imgPath) }}" alt="Profile Picture" class="max-w-full h-3/4 object-contain rounded-full">
                        @else
                        <img src="/images/defaultProfile.png" alt="avatar IMG" class="rounded-lg shadow-lg shadow-xl">
                        @endif
                    </div>
                    <div class="mt-4">
                        <label for="avatar" class="text-base font-medium text-gray-700">Profile Image</label>
                        <input id="image" name="image" type="file" class="mt-1 block w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" accept="image/*">
                        <x-input-error class="mt-2" :messages="$errors->get('image')" />
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    @if(!Auth::user()->isAdmin())
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <label class="text-base font-medium text-gray-700">{{ $user->name }}</label>

                        </div>

                        <!-- Email Input -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <label class="text-base font-medium text-gray-700">{{ $user->email }}</label>
                        </div>

                        <!-- Role Dropdown -->
                        <div class="mt-4">
                            <x-input-label for="role" :value="__('Role')" />
                            <label class="text-base font-medium text-gray-700">{{ $user->role }}</label>
                        </div>
                    @endif
                    @if(Auth::user()->isAdmin())
                        <!-- Name Input -->
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" :value="old('name', $user->name)"  required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <!-- Email Input -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <label class="text-base font-medium text-gray-700">{{ $user->email }}</label>
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        @if($user->role != 'ADMIN' and Auth::user()->role == 'ADMIN')
                        <!-- Role Dropdown -->
                        <div class="mt-4">
                            <x-input-label for="role" :value="__('Role')" />
                            <select id="role" name="role" class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
    {{--                            <option value="ADMIN">ADMIN</option>--}}
                                <option value="CAPTAIN">CAPTAIN</option>
                                <option value="ENGINEER">ENGINEER</option>
                                <option value="CHIEF">CHIEF</option>
                                <option value="CREW">CREW</option>
                            </select>
                        </div>
                        @endif
                    @endif

                    <!-- Password Input -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="Confirm password" :value="__('Confirm password')" />
                        <x-text-input id="confirm_password" name="confirm_password" type="password" class="mt-1 block w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('confirm_password')" class="mt-2" />
                    </div>

                </div>
            </div>

    <div class="p-4 flex justify-between">
                <a href="{{ route('crews.view', ['user' => $user]) }}" class="block p-2 text-xl bg-white overflow-hidden shadow-sm sm:rounded-lg hover:bg-[#c0cfff] transition duration-300 m-4">
                    <div class="p-2 text-black text-center">
                        < Back
                    </div>
                </a>


                <button type="submit" class="block p-2 text-xl bg-white overflow-hidden shadow-sm sm:rounded-lg hover:bg-[#c0cfff] transition duration-300 m-4">
                    Save >
                </button>
    </div>

    </form>
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="POST" action="{{ route('switchToPremium') }}">
                        @csrf
                        <div class="border border-gray-300 dark:border-gray-700 rounded-lg overflow-hidden">
                            <button type="submit" class="bg-black hover:bg-gray-900 text-black font-bold py-2 px-4 w-full">
                                Switch to Premium
                            </button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('switchToRegular') }}">
                        @csrf
                        <div class="border border-gray-300 dark:border-gray-700 rounded-lg overflow-hidden">
                            <button type="submit" class="bg-black hover:bg-gray-900 text-black font-bold py-2 px-4 w-full">
                                Switch to Regular
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold">Account Status:</h3>
                        <span class="text-gray-600 dark:text-gray-300">
                            @if(auth()->user()->is_premium)
                                Premium Account
                            @else
                                Regular Account
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <!--
    <x-slot name="header">
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    
    </x-slot>
    -->
    <div class="py-8 pl-80 w-9/12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-12 bg-white">
            <div class=" overflow-hidden">
                <div class="p-6 ">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('profile.update',$user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <!-- title -->
                        <div>
                            <x-label for="title" :value="__('Title')" />

                            <x-input id="title" class="block mt-1 w-full" type="text" name="title"
                                :value="old('title') ?? $user->profile?->title" required autofocus />
                        </div>

                        <!--  Description -->
                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />

                            <x-input id="description" class="block mt-1 w-full" type="text" name="description"
                                :value="old('description')  ?? $user->profile?->description" required />
                        </div>

                        <!-- url -->
                        <div class="mt-4">
                            <x-label for="url" :value="__('URL')" />

                            <x-input id="url" class="block mt-1 w-full" type="text" name="url"
                                :value="old('url')  ?? $user->profile?->url" required />
                        </div>

                        <!-- profile image -->
                        <div class="mt-4">
                            <x-label for="image" :value="__('Profile Image')" />

                            <x-input id="image" class="block mt-1 w-full" type="file" name="image" />
                        </div>

                        <div class="flex items-center justify-center mt-4">
                            <x-button class="">
                                {{ __('Sava Profile') }}
                            </x-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
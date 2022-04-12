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

                    <form method="POST" action="{{ route('post.store',Auth::user()->id) }}" enctype="multipart/form-data">
                        @csrf
                        <!-- caption -->
                        <div>
                            <x-label for="caption" :value="__('Caption')" />

                            <x-input id="caption" class="block mt-1 w-full" type="text" name="caption"
                                 required autofocus />
                        </div>

                        <!-- post image -->
                        <div class="mt-4">
                            <x-label for="image" :value="__('Post Image')" />

                            <x-input id="image" class="block mt-1 w-full" type="file" name="image" />
                        </div>

                        <div class="flex items-center justify-center mt-4">
                            <x-button class="">
                                {{ __('Add Post') }}
                            </x-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <!--
    <x-slot name="header">
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    
    </x-slot>
    -->
    <div class="flex flex-row py-8 pl-80 w-9/12 ">
           {{ $post->id }}
           {{ $post->user->id}}
    </div>
    
            
        
           
    
    
</x-app-layout>
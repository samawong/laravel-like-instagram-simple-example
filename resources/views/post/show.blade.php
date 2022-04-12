<x-app-layout>
    <!--
    <x-slot name="header">
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    
    </x-slot>
    -->
    <div class="flex flex-row py-8 pl-80 w-9/12">
            <div class="basis-3/5 border-0 border-solid border-slate-400">
            <img src="/images/{{$post->image}}" alt="{{ $post->caption }}" class="w-100">
            </div>
            <div class="basis-2/5 pl-3  divide-y bg-slate-100">
                <div class=" flex p-3">
                    <a href="{{ route('profile.index',$post->user->id)}}" class="flex  h-8">
                        <img src="{{$post->user->profile->profileImage()}}" alt="" class="w-12 rounded-full">
                        <div class="pl-3 font-bold self-center">
                            {{ $post->user->name }} 
                        </div>
                    </a>
                </div>
                <div class="flex p-3 h-60">
                    <a href="{{ route('profile.index',$post->user->id)}}" class="flex h-8">
                        <img src="/storage/{{ $post->user->profile->image }}" alt="" class="w-12 rounded-full">
                        <div class="pl-3 font-bold self-center">
                            {{ $post->user->name }} 
                        </div>
                    </a>
                    <div class="pl-4 text-x pt-1">
                        {{ $post->caption }}
                    </div>
                </div>
                <div>
                    {{ $post->caption }}
                </div>
                
            </div>

        
            
        
    </div>
    
            
        
           
    
    
</x-app-layout>
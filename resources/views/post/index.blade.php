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
                <div class="divide-y  ">
                    @foreach ($posts as $post)
                    <div class="bg-slate-50 m-3">
                        <div class="p-2 border-dashed border-2 border-indigo-600">
                            <img src="/images/{{$post->image}}" alt="{{$post->caption}}">
                        </div>
                        <div class="p-1 flex self-center">
                            <div class="text-lg pr-1 self-center pb-1">{{ $post->caption }}</div>
                            By
                            <a href="/user/{{$post->user->id}}"><span class="text-sm pl-1 self-center pr-1">{{$post->user->name}}</span></a>
                            @
                            <span class="text-sm pl-1 self-center">{{$post->created_at}}</span>
                        </div>
                    </div>
                        
                    @endforeach

                    <div class="pt-3">
                        {{ $posts->links() }} 
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
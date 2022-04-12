<x-app-layout>
    <!--
    <x-slot name="header">
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    
    </x-slot>
    -->
 
    <div class="py-8 pl-80 w-9/12">
        <!--
        @if ($message = Session::get('success'))
            <div class="bg-blue-100 rounded-lg py-5 px-6 mb-4 text-base text-blue-700" role="alert">
                <p>{{ $message }}</p>
            </div>
        @endif
        -->
        <div class="flex flex-wrap pb-8">
            
            <div class="w-60  px-4 pl-4">
              <img src="{{ $user->profile->profileImage()}}" alt="..." class="shadow-lg rounded-full max-w-full h-auto align-middle border-none" />
            </div>
            <div class="flex flex-col content-center pl-16 pt-6 ">
                <div class="flex">
                    <div class="text-3xl">
                        {{ $user->name }}
                    </div>
                    <div class="pl-6 "  id="app">
                        <followbutton user-Id="{{ $user->id }}" follows="{{ $follows }}"></followbutton>
                    </div>
                    @can('update',$user->profile)
                    <div class="pl-16">
                        <a href="{{ route('profile.edit',$user->id)}}" class=" flex  flex-row ">
                            <div class="border-solid border-2 rounded border-gray-400 p-2 text-xs">编辑主页</div>
                            <div class="pl-2 pt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                              </svg>
                            </div>
                        </a>
                        
                    </div> 
                    @endcan                  
                </div>
                <div class="flex pt-4">
                    <div class="">{{$postCount}} 帖子</div>
                    <div class="pl-6">{{ $followerCount }} 粉丝</div>
                    <div class="pl-6">关注 {{ $followingCount }}</div>
                </div>
                <div class="pt-4 ">
                    
                    {{ $user->profile?->title ?? 'There is nothing!' }}
                </div>
                <div class="pt-1">
                    {{ $user->profile?->description }}
                </div>
                <div class="pt-1">
                    <a href="{{ $user->profile?->url }}">{{ $user->profile?->url }}</a>
                </div>
            </div>
        </div>
        <hr>
       
        <div class="max-w-7xl mx-auto">            
                <div class="grid grid-cols-3">
                    
                   @foreach (  $user->post  as $p)
                   <div class="">
                       <a href="{{ route('post.show',$p->id)}}">
                        <img src="/images/{{ $p->image}}" alt="" class="w-45 h-45 p-1">
                       </a>
                        
                   </div>
                       
                   @endforeach
                </div>
        </div>
    </div>
</x-app-layout>

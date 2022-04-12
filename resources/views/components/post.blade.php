@props(['posts'])

@if ($errors->any())
    <div {{ $attributes }}>
    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
        <div>
            @foreach ($posts->all() as $post)
                <p>{{ $post }}</p>
            @endforeach
        </div>
    </div>
@else
    <div>
        <p>{{ __('Whoops! There is nothing!.') }}</p>
    </div>
@endif

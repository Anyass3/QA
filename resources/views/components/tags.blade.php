@props(['tags' => ''])

@php
    $tagsArr = array_map(
        function ($tag) {
            return trim($tag);
        },
        array_filter(explode(',', $tags), function ($tag) {
            return !!$tag;
        }),
    );
@endphp


<div class="flex flex-wrap gap-2">
    @unless(count($tagsArr) == 0)
        @foreach ($tagsArr as $tag)
            <a href='/?tag={{ $tag }}'
                class="badge rounded-pill text-bg-info text-decoration-none">{{ $tag }}</a>
        @endforeach
    @else
        <span class="badge rounded-pill text-bg-secondary">no tags</span>
    @endunless
</div>

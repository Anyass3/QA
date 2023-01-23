@props(['attachments' => ''])

@php
    $attachmentUrls = array_map(
        function ($url) {
            return trim($url);
        },
        array_filter(explode(';', $attachments), function ($url) {
            return !!$url;
        }),
    );
@endphp

@if (count($attachmentUrls))
    <div>
        @foreach ($attachmentUrls as $src)
            <img src="{{ asset('storage/' . $src) }}" class="img-fluid img-thumbnail" alt="attachment">
        @endforeach
    </div>
@endif

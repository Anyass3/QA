@props(['attachments' => ''])

@php
    $attachmentsCount = count(
        array_filter(explode(';', $attachments), function ($url) {
            return !!$url;
        }),
    );
@endphp

@if ($attachmentsCount)
    <div class="bg-primary p-1 rounded text-white" style='width: fit-content !important;'>
        <small>Attachments</small> <span class="badge text-bg-secondary">{{ $attachmentsCount }}</span>
    </div>
@endif

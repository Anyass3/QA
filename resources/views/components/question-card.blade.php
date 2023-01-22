@props(['question'])


<x-fluid>
    <div class="row relative bg-white">
        <div class="col-1">
            <img src="{{ asset('images/default-profile.jpg') }}" class=" ratio ratio-1x1 rounded bg-secondary" />
            <p>{{ $question['username'] }} John Doe</p>
        </div>
        <div class="col d-flex flex-column justify-content-around">
            <a href="/questions/{{ $question['id'] }}" class="w-full block py-0 my-0 text-decoration-none">
                {{ $question['question'] }}
            </a>
            <x-tags :tags="$question->tags" />
            <small class="text-muted">Published: <span data-time-delta="{{ $question['created_at'] }}" /></small>
        </div>
    </div>
</x-fluid>

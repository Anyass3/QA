@extends('layout')

@section('head')
    <title>QA: Home</title>
@endsection


@section('content')
    <div class="gap-3 d-flex flex-column">
        @unless(count($questions) == 0)
            @foreach ($questions as $question)
                <x-question-card :question="$question" />
            @endforeach
        @else
            <p class='lead'>Hmm, sad, very sad, no questions?</p>
        @endunless
        <div class="d-flex">
            {!! $questions->links() !!}
        </div>
    </div>
@endsection

@extends('layout')

@section('head')
    <title>Question {{ $question['id'] }}</title>
@endsection


@section('content')
    <div class="d-flex flex-column gap-2 rounded text-decoration-none">
        <div class="row">
            <div class="col-2">
                <img src="{{ asset('images/default-profile.jpg') }}" class=" ratio ratio-1x1 rounded bg-secondary"></img>
                <p>{{ $question['username'] }} John Doe</p>
            </div>
        </div>
        <div>
            <p class="text-muted">Published: <span data-time-delta="{{ $question['created_at'] }}" /></p>
            <p class="text-muted">Updated: <span data-time-delta="{{ $question['updated_at'] }}" /></p>
        </div>
        <div>
            {{ $question['question'] }}
        </div>

        <x-attachments :attachments="$question->attachments" />

        {{-- {{ dd($question->attachments) }} --}}
        <form method="POST" action='/answers/create' class="d-flex flex-column gap-2 mt-3">
            @csrf
            <input type="hidden" name="questionId" value="{{ $question['id'] }}">
            <div class="form-floating">
                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="white your answer here" rows="5"></textarea>
                <label for="exampleFormControlTextarea1" class="form-label">Write your answer here</label>
            </div>
            <button type="button" class="btn btn-primary btn-lg">Send Answer</button>
        </form>
    </div>
@endsection

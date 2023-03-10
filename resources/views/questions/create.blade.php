@extends('layout')

@section('head')
    <title>QA: Create question</title>
@endsection


@section('content')
    <form action="/questions" method="post" class="mx-auto mt-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <div class="form-floating">
                <textarea class="form-control" id="questionFormControlTextarea1" name='question' placeholder="Write your question here"
                    rows="5">{{ trim(old('question')) }}</textarea>
                <label for="questionFormControlTextarea1" class="form-label">Write your question here</label>
            </div>
            @error('question')
                <p class="invalid-feedback" style="display:block !important;">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">attachments</label>
            <input class="form-control" type="file" name="attachments[]" id="formFileMultiple"
                placeholder="choose attachments" multiple>
        </div>

        @php
            $tagString = join(', ', $sampleTags);
        @endphp

        <div class="input-group mb-3" multiple>
            <span class="input-group-text">Tags</span>
            <div class="form-floating">
                <input class="form-control" value="{{ trim(old('tags')) }}" list="tagsDatalistOptions" id="tagsLabel"
                    placeholder="{{ $tagString }}" name='tags'>
                <label for="tagsLabel" class="form-label">{{ $tagString }}</label>
            </div>
            <datalist id="tagsDatalistOptions">
                @foreach ($sampleTags as $tag)
                    <option value="{{ $tag }}">
                @endforeach
            </datalist>

            @error('tags')
                <p class="invalid-feedback" style="display:block !important;">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="form-check form-switch mb-3">
            <input class="form-check-input" name="anonymous" type="checkbox" id="invalidCheck">
            <label class="form-check-label" for="invalidCheck">
                Hide me
            </label>

            @error('anonymous')
                <p class="invalid-feedback" style="display:block !important;">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <input type="submit" class="btn btn-outline-primary" />
    </form>
@endsection

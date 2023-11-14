@extends('layouts.app1')

@section('content')
    <div class="container">
        <h1>Shared Note</h1>
        @if($note)
            <h3>Title: {{ $note->title }}</h3>
            <p><strong>Content:</strong></p>
            <p>{!! $note->content !!}</p>
        @else
            <p>This is a shared note.</p>
        @endif
        <a href="{{ route('notes.index') }}" class="btn btn-primary">Back to Notes</a>
    </div>
@endsection

@extends('layouts.app1')

@section('content')
    <div class="container">
        <h1>Note Details</h1>
        <h3>Title: {{ $note->title }}</h3>
        <p><strong>Content:</strong></p>
        <p>{!! $note->content !!}</p>

        <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-primary">Edit Note</a>

        <form action="{{ route('notes.destroy',$note->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="btn btn-danger">
                {{ __('Delete Note') }}
            </button>
        </form>

        <a href="{{ route('notes.index') }}" class="btn btn-primary">Back to Notes</a>

        <!-- Добавляем кнопку Share -->
        <form action="{{ route('notes.share', $note->id) }}" method="POST">
            {{ csrf_field() }}
            <button class="btn btn-success">
                {{ __('Share Note') }}
            </button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        ClassicEditor
            .create( document.querySelector( '#note-textarea' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection

@extends('layouts.app1')

@section('content')
    <div class="container">
        <h1>Note Details</h1>
        <h3>Title: {{ $note->title }}</h3>
        <p><strong>Content:</strong></p>
        <p>{!! $note->content !!}</p>

        <div class="mt-3">
            <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-primary me-2">Edit Note</a>

            <form action="{{ route('notes.destroy',$note->id) }}" method="POST" class="me-2">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button class="btn btn-danger">
                    {{ __('Delete Note') }}
                </button>
            </form>

            <a href="{{ route('notes.index') }}" class="btn btn-primary me-2">Back to Notes</a>

            <!-- Добавляем кнопку Share -->
            @if(auth()->user()->is_premium)
                <form action="{{ route('notes.share', $note->id) }}" method="POST">
                    {{ csrf_field() }}
                    <button class="btn btn-success">
                        {{ __('Share Note') }}
                    </button>
                </form>
            @endif
        </div>
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

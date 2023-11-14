@extends('layouts.app1')

@section('content')
    <div class="container">
        <h1>Shared Note Link</h1>
        <p>Here is the unique link to your shared note:</p>
        <div class="input-group mb-3">
            <input type="text" id="shared-link" class="form-control" value="{{ route('notes.shared', $sharedNote->url) }}" readonly>
            <div class="input-group-append">
                <a href="{{ route('notes.shared', $sharedNote->url) }}" class="btn btn-primary" target="_blank">
                    Open Note
                </a>
            </div>
        </div>
    </div>
@endsection

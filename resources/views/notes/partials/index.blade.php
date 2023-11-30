@extends('layouts.app1')

@section('content')
    <div class="container">
        <h1>Your Notes</h1>
        <a href="{{ route('notes.create') }}" class="btn btn-success mb-3">Create New Note</a>

        <form action="{{ route('notes.index') }}" method="GET">
            <div class="form-inline">
                <label class="mr-2" for="sort">Sort By:</label>
                <select name="sort" id="sort" class="form-control mr-2">
                    <option value="created_at" @if($sort === 'created_at') selected @endif>Created At</option>
                    <option value="updated_at" @if($sort === 'updated_at') selected @endif>Updated At</option>
                    <option value="title" @if($sort === 'title') selected @endif>Title</option>
                </select>
                <select name="direction" id="direction" class="form-control mr-2">
                    <option value="asc" @if($direction === 'asc') selected @endif>Ascending</option>
                    <option value="desc" @if($direction === 'desc') selected @endif>Descending</option>
                </select>
                <button type="submit" class="btn btn-primary">Sort</button>
            </div>
        </form>

        @if(isset($notes) && $notes->count() > 0)
            <ul class="list-group mt-3">
                @foreach ($notes as $note)
                    <li class="list-group-item">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <a href="{{ route('notes.show', $note->id) }}" style="text-decoration: none; color: black; font-size: 18px;">{{ $note->title }}</a>
                                <p>Created: {{ $note->created_at->format('Y-m-d') }}</p>
                                <p>Last Updated: {{ $note->updated_at->format('Y-m-d') }}</p>
                            </div>
                            <div>
                                <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-primary mr-2">Edit</a>
                                <form action="{{ route('notes.destroy', $note->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p>You haven't created any notes yet.</p>
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#note-textarea'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection

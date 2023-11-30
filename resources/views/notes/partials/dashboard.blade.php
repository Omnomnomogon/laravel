@extends('layouts.app1')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Your Notes</h2>
                <ul class="list-group" id="notesList">
                    @foreach ($notes as $note)
                        <li class="list-group-item" onclick="loadNoteContent('{{ $note->id }}')">{{ $note->title }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-8">
                <div id="note-content">
                    <h2>Select a note to view its content</h2>
                </div>
            </div>
        </div>
    </div>

    <script>
        function loadNoteContent(noteId) {
            fetch(`/notes/${noteId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('note-content').innerHTML = `
                        <h2>${data.note.title}</h2>
                        <p contenteditable="true" id="note-text">${data.note.content}</p>
                        <button onclick="updateNoteContent(${noteId})">Save</button>
                        <button onclick="deleteNote(${noteId})">Delete</button>
                        <button onclick="shareNote(${noteId})">Share</button>
                    `;
                })
                .catch(error => console.error('Error:', error));
        }

        function updateNoteContent(noteId) {
            const updatedContent = document.getElementById('note-text').innerText;

            fetch(`/notes/${noteId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ content: updatedContent })
            })
                .then(response => {
                    if (response.ok) {
                        alert('Note updated successfully!');
                        // Можно добавить логику для обновления интерфейса, если нужно
                    } else {
                        throw new Error('Failed to update note');
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function deleteNote(noteId) {
            if (confirm('Are you sure you want to delete this note?')) {
                fetch(`/notes/${noteId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                    .then(response => {
                        if (response.ok) {
                            alert('Note deleted successfully!');
                            // Можно добавить логику для обновления интерфейса, если нужно
                        } else {
                            throw new Error('Failed to delete note');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        }

        function shareNote(noteId) {
            // Здесь вы можете добавить логику для обмена заметкой
        }
    </script>
@endsection

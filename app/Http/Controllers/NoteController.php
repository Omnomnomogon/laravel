<?php

namespace App\Http\Controllers;
use App\Models\Note;
use App\Models\SharedNote;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoteController extends Controller
{
    //
    public function share(Note $note)
    {
        $sharedNote = new SharedNote();
        $sharedNote->note_id = $note->id;
        $sharedNote->url = Str::random(10); // Генерируем уникальную ссылку
        $sharedNote->save();

        return view('notes.partials.share', ['sharedNote' => $sharedNote]);
    }

    public function shared($url): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $sharedNote = SharedNote::where('url', $url)->first();

        if (!$sharedNote) {
            abort(404); // Можете добавить свою логику, если у вас нет такой общей заметки
        }
        $note = Note::find($sharedNote->note_id);

        return view('notes.partials.shared', ['note' => $note]);
    }



    public function index(Request $request)
    {
        //$notes = Note::orderBy('created_at', 'asc')->get();
        //return view('notes.partials.index', ['notes'=>$notes]);
        $user = auth()->user();
        $sort = $request->get('sort', 'created_at');
        $direction = $request->get('direction', 'asc');

        // Вам нужно изменить $notes на выборку заметок для текущего пользователя
        $notes = Note::where('user_id', $user->id)
            ->orderBy($sort, $direction)
            ->get();

        return view('notes.partials.index', [
            'notes' => $notes,
            'sort' => $sort,
            'direction' => $direction,
        ]);

    }

    public function create()
    {
        // Отображение формы создания новой заметки
        return view('notes.partials.create');
    }

    public function store(Request $request)
    {

         //Сохранение новой заметки
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $note = new Note;
        $note->title = $validatedData['title'];
        $note->content = $validatedData['content'];
//        $note->title = $request->title;
//        $note->content = $request->content;
        $note->user_id = auth()->user()->id;
        $note->save();

        return redirect()->route('notes.index');
    }

    public function show(Note $note)
    {
        // Просмотр конкретной заметки
        return view('notes.partials.show', compact('note'));
    }

    public function edit(Note $note)
    {
        // Отображение формы редактирования заметки
        return view('notes.partials.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        // Обновление заметки
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $note->title = $validatedData['title'];
        $note->content = $validatedData['content'];
        $note->save();

        return redirect()->route('notes.index');
    }

    public function destroy(Note $note)
    {
        // Удаление заметки

        $note->delete();
        return redirect()->route('notes.index');
    }
}

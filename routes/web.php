<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
use App\Models\Note;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Маршруты для заметок (Notes)
Route::middleware('auth')->group(function () {
    Route::get('/notes', [NoteController::class,'index'])->name('notes.index');
    Route::get('/notes/create', [NoteController::class,'create'])->name('notes.create');
    Route::post('/notes', [NoteController::class,'store'])->name('notes.store');
    Route::get('/notes/{note}', [NoteController::class,'show'])->name('notes.show');
    Route::get('/notes/{note}/edit', [NoteController::class,'edit'])->name('notes.edit');
    Route::put('/notes/{note}', [NoteController::class,'update'])->name('notes.update');
    Route::delete('/notes/{note}', [NoteController::class,'destroy'])->name('notes.destroy');

    Route::post('/notes/{note}/share', [NoteController::class, 'share'])->name('notes.share');
    Route::get('/notes/shared/{url}', [NoteController::class, 'shared'])->name('notes.shared');
    Route::get('/dashboard1', [NoteController::class, 'showDashboard'])->name('notes.dashboard');
});


//---------------------------------------------------------




Route::get('/tasks', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return view('tasks', [
    'tasks' => $tasks
  ]);
});

Route::post('/task', function (Request $request) {
  $validator = Validator::make($request->all(), [
    'name' => 'required|max:255',
  ]);

  if ($validator->fails()) {
    return redirect('/')
      ->withInput()
      ->withErrors($validator);
  }

  $task = new Task;
  $task->name = $request->name;
  $task->save();

  return redirect('/tasks');
});

Route::delete('/task/{task}', function (Task $task) {
  $task->delete();
  return redirect('/tasks');
});




//------------------------------------------
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/switch-to-premium', [UserController::class, 'switchToPremium'])->name('switchToPremium');
    Route::post('/switch-to-regular', [UserController::class, 'switchToRegular'])->name('switchToRegular');

});




require __DIR__.'/auth.php';

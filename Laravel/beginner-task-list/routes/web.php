<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use \App\Task;
use Illuminate\View\Middleware\ShareErrorsFromSession;  


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//mostrar todas las tareas
Route::get('/', function () {
    //$tasks = App\Task::orderBy('created_at','asc')->get();
    $tasks = DB::table('tasks')->select('id','name','created_at')
                ->orderBy('created_at','asc')->get();
    return view('tasks',[
        'tasks' => $tasks
    ]);
});

//añadir nuevas tareas
Route::post('/task', function (Request $request) {
    //validando dato recibido del form
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ])->validate();
    
    //creando nueva tarea en la bd con el ORM
    $task = new Task;//creando objeto del modelo Task
    $task->name = $request->name;
    $task->save();
    return redirect('/');
});

//eliminar tareas
Route::delete('/task/{id}', function ($id) {
    App\Task::findOrFail($id)->delete();
    return redirect('/');
});
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProjectController;

//home
Route::get('/', [MainController :: class, 'home'])
    -> name('home');

//show
Route :: get('/project/show/{project}', [ProjectController :: class, 'projectShow'])
    -> name('project.show');


//PROTECTED ROUTES

//admin
Route::get('/admin', [MainController :: class, 'admin']) ->
middleware(['auth', 'verified'])->name('admin');

//project
Route::middleware(['auth', 'verified'])
   ->name('project.')
   ->prefix('project')
   ->group(function () {
         //delete
        Route :: get('/delete/{project}', [ProjectController :: class, 'projectDelete'])
            -> name('delete');

        //create
        Route :: post('/store', [ProjectController :: class, 'projectStore'])
            -> name('store');

        //edit
        Route :: get('/edit/{project}', [ProjectController :: class, 'projectEdit'])
            -> name('edit');

        Route :: post('/update/{project}', [ProjectController :: class, 'projectUpdate'])
            -> name('update');
   });


//dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

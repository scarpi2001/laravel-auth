<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

//home
Route::get('/', [MainController :: class, 'home'])
    -> name('home');

//show
Route :: get('/project/show/{project}', [MainController :: class, 'projectShow'])
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
        Route :: get('/delete/{project}', [MainController :: class, 'projectDelete'])
            -> name('delete');

        //create
        Route :: post('/store', [MainController :: class, 'projectStore'])
            -> name('store');

        //edit
        Route :: get('/edit/{project}', [MainController :: class, 'projectEdit'])
            -> name('edit');

        Route :: post('/update/{project}', [MainController :: class, 'projectUpdate'])
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

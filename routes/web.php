<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\MainController;

//HOME
Route::get('/', [MainController :: class, 'home'])
    -> name('home');

//ADMIN
Route::get('/admin', [MainController :: class, 'admin'])
    -> name('admin');

//SHOW
Route :: get('/project/show/{project}', [MainController :: class, 'projectShow'])
    -> name('project.show');

//DELETE
Route :: get('/project/delete/{project}', [MainController :: class, 'projectDelete'])
    -> name('project.delete');

//CREATE
Route :: post('/project/store', [MainController :: class, 'projectStore'])
    -> name('project.store');

//EDIT
Route :: get('/project/edit/{project}', [MainController :: class, 'projectEdit'])
    -> name('project.edit');

Route :: post('/project/update/{project}', [MainController :: class, 'projectUpdate'])
    -> name('project.update');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

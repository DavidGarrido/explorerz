<?php

use Illuminate\Support\Facades\Artisan;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/storage', function(){
    $targetFolder = storage_path("app/public");
    $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
    symlink($targetFolder, $linkFolder);
});
Route::get('/migrate', function(){
    Artisan::call('migrate',
        array(
        '--path' => 'database/migrations',
        '--database' => 'mysql',
        '--force' => true));
});

Route::middleware(['auth:sanctum', 'verified'])->get('/cursos', function(){
    return view('cursos.list');
})->name('course');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

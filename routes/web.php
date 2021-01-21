<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
Route::get('/img/{img_url}', function ($img_url){
    return Storage::response('materials/'.$img_url);
})->name('img');
Route::middleware(['auth:sanctum', 'verified'])->get('/view/{user_id}/{file}', function ($user_id,$file){
    return Storage::response('hvs/'.$user_id.'/'.$file);
})->name('viewer');
Route::middleware(['auth:sanctum', 'verified'])->get('/certificate/{user_id}/{file}', function ($user_id,$file){
    return Storage::response('certificated/'.$user_id.'/last_certificated/'.$file);
    // return response('hola');
})->name('certificate');



Route::middleware(['auth:sanctum', 'verified'])->get('/cursos', function(){
    return view('cursos.list');
})->name('course');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

<?php

use App\Http\Controllers\UploadFileController;
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

Route::get('view/uploads', [UploadFileController::class, 'loadView']);

Route::post('view/uploads', [UploadFileController::class, 'storeFile'])
    ->name('uploads.file');

Route::get('download/files/{name}', [UploadFileController::class, 'downloadFile'])
    ->name('download');

Route::delete('delete', [UploadFileController::class, 'delete'])
    ->name('delete');






Route::get('ftp', function (){
   $files = Storage::disk('ftp')->allfiles();
});





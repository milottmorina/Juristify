<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('auth.login');
});




Route::get('/blog', function (){
    return view('Blog/blog');
});
Route::get('/library', function (){
    return view('LibraryDocs/allDocuments');
});

Route::get('/information', function (){
    return view('Information/information');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('contact-us')->group(function () {

    Route::get('/', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/store', [ContactController::class, 'store'])->name('contact.store');
  
    Route::get('/all', [ContactController::class, 'show'])->name('contact.show');
});

Auth::routes();
Route::prefix('profile')->group(
    function () {
        Route::get('/', [User::class, 'index'])->name('user.index');
        Route::get('/recent-uploads', [FilesController::class, 'index'])->name('user.uploads');

        Route::get('/upload', [User::class, 'upload'])->name('user.upload');
        Route::get('/change-password', [User::class, 'changePas'])->name('user.password');
        Route::post('/update-profile/{id}', [User::class, 'updateProfile'])->name('user.update');
        Route::post('/store-file', [FilesController::class, 'store'])->name('file.store');
        Route::post('/update-password/', [User::class, 'update_password'])->name('user.updatePassword');
        Route::get('/destroy-file/{id}', [FilesController::class, 'destroy'])->name('file.destroy');
        Route::get('/create-info', [InformationController::class, 'create'])->name('info.create');
    }
);

Route::prefix('library')->group(
    function (){
        Route::get('/', [FilesController::class, 'show'])->name('all.uploads');
    });

    Route::prefix('infromation')->group(
        function (){
            Route::get('/', [InformationController::class, 'index'])->name('infos.view');
            Route::post('/store-info', [InformationController::class, 'store'])->name('info.store');
        });
Auth::routes();

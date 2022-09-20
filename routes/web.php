<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('auth.login');
});
Route::get('/contact-us', function (){
    return view('ContactUs/contact');
});

Route::get('/upload', function (){
    return view('Profile/UploadFile');
});
Route::get('/recent-uploads', function (){
    return view('Profile/AllMyFiles');
});

Route::get('/blog', function (){
    return view('Blog/blog');
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
        Route::get('/change-password', [User::class, 'changePas'])->name('user.password');
        Route::post('/update-profile/{id}', [User::class, 'updateProfile'])->name('user.update');
        Route::post('/update-password/', [User::class, 'update_password'])->name('user.updatePassword');
    }
);
Auth::routes();

<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\User;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    if(Auth::user()){
        return redirect('/home');
    }else{
    return view('home');
}
});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('contact-us')->group(function () {

    Route::get('/', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/store', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/destroy/{id}', [ContactController::class, 'destroy'])->name('contact.delete');
   
});





Route::prefix('dashboard')->group(function(){
   
   
    Route::get('/', [User::class, 'dashboard'])->name('dashboard.view');
    Route::get('/library', [FilesController::class, 'showAll'])->name('library.all');
    Route::get('/blogs', [BlogController::class, 'showAll'])->name('blog.all');
    Route::get('/news', [NewsController::class, 'showAll'])->name('news.all');
 
    
    
    Route::get('contact-us/all', [ContactController::class, 'show'])->name('contact.show');



    Route::prefix('/users')->group(function(){
    Route::get('/', [User::class, 'allUsers'])->name('user.all');
    Route::get('/find', [User::class, 'findUser'])->name('user.find');
    Route::get('/verified', [User::class, 'getVerifiedUsers'])->name('user.verified');
    Route::get('/non-verified', [User::class, 'getNonVerifiedUsers'])->name('user.nonverified');
    Route::get('/admin', [User::class, 'getAdmin'])->name('user.admin');
    Route::get('/default', [User::class, 'getDefaultUsers'])->name('user.default');
    Route::post('/verifiko/{id}', [User::class, 'verifiko'])->name('user.verifiko');
    Route::post('/cverifiko/{id}', [User::class, 'cverifiko'])->name('user.cverifiko');
    Route::post('/make-admin/{id}', [User::class, 'makeAdmin'])->name('user.makeadmin');
    Route::post('/make-default-user/{id}', [User::class, 'makeDefault'])->name('user.defaultuser');

});
});




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
        Route::get('/create-news', [NewsController::class, 'create'])->name('news.create');
        Route::get('/create-blog', [BlogController::class, 'create'])->name('blog.create');
        Route::post('/update-file/{id}', [FilesController::class, 'update'])->name('file.update');
        Route::get('/my-blogs', [BlogController::class, 'myBlogs'])->name('blog.myBlogs');
        Route::post('/update-blog/{id}', [BlogController::class, 'update'])->name('blog.update');


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



Route::prefix('news')->group(
            function (){
                Route::get('/', [NewsController::class, 'index'])->name('news.view');
                Route::get('/single/{id}', [NewsController::class, 'show'])->name('news.show');
                Route::post('/store-news', [NewsController::class, 'store'])->name('news.store');
                Route::get('/destroy/{id}', [NewsController::class, 'destroy'])->name('news.delete');
                Route::post('/update-news/{id}', [NewsController::class, 'update'])->name('news.update');
            });



Route::prefix('blog')->group(
function (){
Route::get('/', [BlogController::class, 'index'])->name('blog.view');
Route::get('/single/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::post('/store-news', [BlogController::class, 'store'])->name('blog.store');
Route::post('/verifiko/{id}', [BlogController::class, 'verifiko'])->name('blog.verifiko');
Route::post('/cverifiko/{id}', [BlogController::class, 'cverifiko'])->name('blog.cverifiko');
Route::get('/destroy/{id}', [BlogController::class, 'destroy'])->name('blog.delete');
// Route::get('/', [CommentController::class, 'index'])->name('comment.view');
});




Route::prefix('comment')->group(
    function (){
        
        Route::post('/store-comment', [CommentController::class, 'store'])->name('comment.store');
        Route::post('/update-comment/{id}', [CommentController::class, 'update'])->name('comment.update');
        Route::get('/destroy/{id}', [CommentController::class, 'destroy'])->name('comment.delete');
    });
Auth::routes();

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
    return view('auth/login');
}
});
//home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('contact-us')->group(function () {

    Route::get('/', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/store', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/destroy/{id}', [ContactController::class, 'destroy'])->name('contact.delete')->middleware('admin');
   
});
//dashboard
Route::prefix('dashboard')->group(function(){
    Route::get('/', [User::class, 'dashboard'])->name('dashboard.view')->middleware('admin');
    Route::get('/library', [FilesController::class, 'showAll'])->name('library.all')->middleware('admin');
    Route::get('/blogs', [BlogController::class, 'showAll'])->name('blog.all')->middleware('admin');
    Route::get('/news', [NewsController::class, 'showAll'])->name('news.all')->middleware('admin');
    Route::get('/informations', [InformationController::class, 'allInfos'])->name('informations.view')->middleware('admin');
    Route::get('contact-us/all', [ContactController::class, 'show'])->name('contact.show')->middleware('admin');
    Route::get('/blogs/search', [BlogController::class, 'findBlogDashboard'])->name('blog.findDashboard')->middleware('admin');
    Route::get('/library/search', [FilesController::class, 'findFileDashboard'])->name('file.findDashboard')->middleware('admin');
    Route::get('/information/search', [InformationController::class, 'findInfoDashboard'])->name('info.findDashboard')->middleware('admin');
    Route::get('/news/search', [NewsController::class, 'findNewsDashboard'])->name('news.findDashboard')->middleware('admin');

    Route::prefix('/users')->group(function(){
    Route::get('/', [User::class, 'allUsers'])->name('user.all')->middleware('admin');
    Route::get('/search', [User::class, 'findUser'])->name('user.find')->middleware('admin');
    Route::get('/verified', [User::class, 'getVerifiedUsers'])->name('user.verified')->middleware('admin');
    Route::get('/non-verified', [User::class, 'getNonVerifiedUsers'])->name('user.nonverified')->middleware('admin');
    Route::get('/admin', [User::class, 'getAdmin'])->name('user.admin')->middleware('admin');
    Route::get('/default', [User::class, 'getDefaultUsers'])->name('user.default')->middleware('admin');
    Route::post('/verifiko/{id}', [User::class, 'verifiko'])->name('user.verifiko')->middleware('admin');
    Route::post('/cverifiko/{id}', [User::class, 'cverifiko'])->name('user.cverifiko')->middleware('admin');
    Route::post('/make-admin/{id}', [User::class, 'makeAdmin'])->name('user.makeadmin')->middleware('admin');
    Route::post('/make-default-user/{id}', [User::class, 'makeDefault'])->name('user.defaultuser')->middleware('admin');

});
});
//profili 
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
        Route::get('/my-blogs', [BlogController::class, 'myBlogs'])->name('blog.myBlogs');
        Route::post('/update-blog/{id}', [BlogController::class, 'update'])->name('blog.update');
        Route::get('recent-uploads/search', [FilesController::class, 'findMyFile'])->name('file.findMyFile');
        Route::get('my-blogs/search', [BlogController::class, 'findMyBlog'])->name('blog.findMyBlog');
        // findMyBlog
    }
);
// library
Route::prefix('library')->group(
    function (){
        Route::get('/', [FilesController::class, 'show'])->name('all.uploads');
        Route::get('/search', [FilesController::class, 'findFile'])->name('file.find');
        Route::post('/verifiko/{id}', [FilesController::class, 'verifiko'])->name('file.verifiko')->middleware('admin');
        Route::post('/cverifiko/{id}', [FilesController::class, 'cverifiko'])->name('file.cverifiko')->middleware('admin');
        Route::post('/update-file/{id}', [FilesController::class, 'update'])->name('file.update');  
    });
//information
Route::prefix('information')->group(
        function (){
            Route::get('/', [InformationController::class, 'index'])->name('infos.view');
            Route::post('/store-info', [InformationController::class, 'store'])->name('info.store')->middleware('admin');
            Route::get('/destroy/{id}', [InformationController::class, 'destroy'])->name('info.delete')->middleware('admin');
            Route::post('/update-info/{id}', [InformationController::class, 'update'])->name('info.update')->middleware('admin');
            Route::get('/search', [InformationController::class, 'findInfo'])->name('info.find');
});
//news
Route::prefix('news')->group(
            function (){
                Route::get('/', [NewsController::class, 'index'])->name('news.view');
                Route::get('/single/{id}', [NewsController::class, 'show'])->name('news.show');
                Route::post('/store-news', [NewsController::class, 'store'])->name('news.store')->middleware('admin');
                Route::get('/destroy/{id}', [NewsController::class, 'destroy'])->name('news.delete')->middleware('admin');
                Route::post('/update-news/{id}', [NewsController::class, 'update'])->name('news.update')->middleware('admin');
                Route::get('/search', [NewsController::class, 'findNews'])->name('news.find');
});
//blog
Route::prefix('blog')->group(
    function (){
        Route::get('/', [BlogController::class, 'index'])->name('blog.view');
        Route::get('/single/{id}', [BlogController::class, 'show'])->name('blog.show');
        Route::post('/store-news', [BlogController::class, 'store'])->name('blog.store');
        Route::post('/verifiko/{id}', [BlogController::class, 'verifiko'])->name('blog.verifiko');
        Route::post('/cverifiko/{id}', [BlogController::class, 'cverifiko'])->name('blog.cverifiko');
        Route::get('/destroy/{id}', [BlogController::class, 'destroy'])->name('blog.delete');
        Route::get('/search', [BlogController::class, 'findBlog'])->name('blog.find');
        Route::post('update-blog/{id}',[BlogController::class,'updateBlogDashboard'])->name('update.blogDashboard');
});
//comment
Route::prefix('comment')->group(
    function (){
        Route::post('/store-comment', [CommentController::class, 'store'])->name('comment.store');
        Route::post('/update-comment/{id}', [CommentController::class, 'update'])->name('comment.update');
        Route::get('/destroy/{id}', [CommentController::class, 'destroy'])->name('comment.delete');
});
Auth::routes();


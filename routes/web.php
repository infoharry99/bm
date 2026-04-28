<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VolunteerController;


use App\Http\Controllers\MemberController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

Route::get('/member',[MemberController::class,'index'])->name('member.index');
Route::post('/member',[MemberController::class,'store'])->name('member.store');
Route::view('/coming-soon', 'coming-soon');
Route::get('/work-envents',[EventController::class,'index'])->name('events.index');

Route::get('/gallerry',[GalleryController::class,'index'])->name('gallery.index');

Route::get('/bihar-news',[NewsController::class,'index'])->name('news.index');
Route::get('/cookies',[NewsController::class,'cookies'])->name('news.cookies');
// Route::get('login',[AdminAuthController::class,'showLogin'])->name('admin.login');

Route::prefix('admin')->group(function(){
    Route::get('login',[AdminAuthController::class,'showLogin'])->name('admin.login');
    Route::post('login',[AdminAuthController::class,'login'])->name('admin.login.post');
    Route::post('logout',[AdminAuthController::class,'logout'])->name('admin.logout');


    Route::middleware(['auth','admin'])->group(function(){
        Route::get('/', [DashboardController::class,'index'])->name('admin.dashboard');

        Route::get('/approve-member/{id}', [App\Http\Controllers\Admin\MemberController::class, 'approveMember'])->name('admin.members.approve');
        Route::get('/reject-member/{id}', [App\Http\Controllers\Admin\MemberController::class, 'rejectMember'])->name('admin.members.reject');

        // Resource routes
        Route::resource('news', App\Http\Controllers\Admin\NewsController::class, ['as'=>'admin']);
        Route::resource('events', App\Http\Controllers\Admin\EventController::class, ['as'=>'admin']);
        Route::resource('gallery', App\Http\Controllers\Admin\GalleryController::class, ['as'=>'admin']);
        Route::resource('members', App\Http\Controllers\Admin\MemberController::class, ['as'=>'admin']);
        Route::resource('contact', App\Http\Controllers\Admin\ContactController::class, ['as'=>'admin']);
    });
});

Route::post('/contact-send', [App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');
Route::post('/volunteer/send', [VolunteerController::class, 'send'])->name('volunteer.send');


// Route::get('/gallery', function () {
//     $path = public_path('gallery');
//     $images = File::files($path);
//     return view('gallery', compact('images'));
// });

Route::get('/contact-us', [ContactController::class,'index'])->name('contact');
Route::post('/contact-submit', [ContactController::class,'store'])->name('contact.store');

Route::view('/', 'home');


Route::get('/forgot-password', [AuthController::class, 'forgotPasswordForm']);
Route::post('/forgot-password', [AuthController::class, 'sendResetLink']);

Route::get('/reset-password/{token}', [AuthController::class, 'resetForm']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);


Route::get('/profile', [MemberController::class, 'profile']);
Route::post('/profile-update', [MemberController::class, 'updateProfile']);


Route::view('/login', 'auth.login')->name('login');
Route::post('/member-login', [MemberController::class,'member_login'])->name('member.login');
Route::get('/member-logout', function() {
    session()->forget(['member_id', 'member_name']);
    return redirect('/')->with('success', 'Logged out successfully!');
})->name('member.logout');

Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/service', 'service')->name('service');
Route::view('/team', 'team')->name('team');
Route::view('/testimonial', 'testimonial')->name('testimonial');
Route::view('/dashboard', 'dashboard')->name('dashboard');

Route::get('/gallerys', [App\Http\Controllers\GalleryController::class, 'index']);



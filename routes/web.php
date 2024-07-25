<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteInfoController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.livewire_route_subdir') . '/livewire/livewire.js', $handle);
});

Livewire::setUpdateRoute(function($handle) {
    return Route::get(config('app.livewire_route_subdir') . '/livewire/update', $handle);
});

// トップ画面
Route::get('/', [BlogController::class, 'index'])->name('home');

// カテゴリー検索
Route::prefix("/category")
    ->name("category.")
    ->group(function () {
        Route::get('{id}/camp', [BlogController::class, 'search'])->name('camp');
        Route::get('{id}/treckking', [BlogController::class, 'search'])->name('trekking');
        Route::get('{id}/cycling', [BlogController::class, 'search'])->name('cycling');
        Route::get('{id}/fishing', [BlogController::class, 'search'])->name('fishing');
        Route::get('{id}/snow', [BlogController::class, 'search'])->name('snow');
    });


//ニュース詳細画面
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name("blog.detail");

// お問い合わせ画面
Route::get('/site/inquiry', [InquiryController::class, 'index'])->name('inquiry');
Route::post('/site/inquiry', [InquiryController::class, 'send']);
Route::get('/site/inquiry/complete', [InquiryController::class, 'complete'])->name('inquiry.complete');

// プライバシーポリシー・当サイトについて
Route::get('/site/privacy', [SiteInfoController::class, 'indexWithPrivacy'])->name('privacy');
Route::get('/site/info', [SiteInfoController::class, 'indexWithInfo'])->name('info');


//管理画面▽▽▽▽▽▽▽▽▽▽▽▽▽▽▽▽▽▽▽▽▽▽▽▽▽▽▽▽
Route::get('/dashboard', [BlogController::class, 'indexByUserId'])
    ->middleware('auth')
    ->name('dashboard');

// ニュース情報
Route::prefix("/admin")
    ->name("admin.")
    ->group(function () {

        Route::middleware("auth")
            ->group(function () {

                Route::get('blogs', [BlogController::class, 'indexWithAdmin'])->name('blog');
                Route::get('blogs/create', [BlogController::class, 'create'])->name('blog.create');
                Route::post('blogs', [BlogController::class, 'store'])->name('blog.store');
                Route::get('blogs/{blog}', [BlogController::class, 'edit'])->name('blog.edit')->can('update', 'blog');
                Route::put('blogs/{blog}', [BlogController::class, 'update'])->name('blog.update')->can('update', 'blog');
                Route::delete('blogs/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy')->can('delete', 'blog');
            });
    });

// ユーザ情報
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
});

// お問い合わせ情報
Route::prefix("/admin")
    ->name("contact.")
    ->group(function () {

        Route::middleware("auth")
            ->group(function () {
                Route::get('inquiry', [InquiryController::class, 'indexWithAdmin'])->name('inquiry');
                Route::get('inquiries/{inquiry}', [InquiryController::class, 'showWithAdmin'])->name("inquiry.detail");
            });
    });


require __DIR__ . '/auth.php';

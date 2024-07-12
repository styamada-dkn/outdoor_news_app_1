<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// ホーム
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('ホーム', route('home'));
});

// ホーム > ニュース
Breadcrumbs::for('blog', function (BreadcrumbTrail $trail, $blog) {
    $trail->parent('home');
    $trail->push('ニュース', route('blog.detail',compact('blog')));
});

// ホーム > ニュース > [カテゴリー名]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', compact('category')));
});

// ホーム > お問い合わせ
Breadcrumbs::for('inquiry', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('お問い合わせ', route('inquiry'));
});
// ホーム > お問い合わせ　> お問い合わせ完了
Breadcrumbs::for('inquiry-complete', function (BreadcrumbTrail $trail) {
    $trail->parent('inquiry');
    $trail->push('お問い合わせ完了', route('inquiry.complete'));
});

// ホーム > プライバシーポリシー
Breadcrumbs::for('privacy', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('プライバシーポリシー', route('privacy'));
});
// ホーム > 当サイトについて
Breadcrumbs::for('info', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('当サイトについて', route('info'));
});


//////////////////////////////////////////
// 管理画面用▽▽▽▽▽▽▽▽▽▽▽▽▽▽▽▽
//////////////////////////////////////////
// 管理画面Home
Breadcrumbs::for('admin-home', function (BreadcrumbTrail $trail) {
    $trail->push('管理画面ホーム', route('dashboard'));
});

// 管理画面Home > ニュース一覧
Breadcrumbs::for('admin-blog', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-home');
    $trail->push('ニュース一覧', route('admin.blog'));
});

// 管理画面Home > ニュース一覧 > ニュース登録
Breadcrumbs::for('admin-blog-create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-blog');
    $trail->push('ニュース登録', route('admin.blog.create'));
});
// 管理画面Home > ニュース一覧 > ニュース編集
Breadcrumbs::for('admin-blog-edit', function (BreadcrumbTrail $trail, $blog) {
    $trail->parent('admin-blog');
    $trail->push('ニュース編集', route('admin.blog.edit',compact('blog')));
});


// 管理画面Home > ユーザ一覧
Breadcrumbs::for('users', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-home');
    $trail->push('ユーザ一覧', route('profile.index'));
});
// 管理画面Home > ユーザ一覧 > ユーザー登録
Breadcrumbs::for('users-create', function (BreadcrumbTrail $trail) {
    $trail->parent('users');
    $trail->push('ユーザ登録', route('register'));
});
// 管理画面Home > ユーザ一覧 > ユーザー編集
Breadcrumbs::for('users-edit', function (BreadcrumbTrail $trail) {
    $trail->parent('users');
    $trail->push('ユーザ編集', route('profile.edit'));
});

// 管理画面Home > 問い合わせ一覧
Breadcrumbs::for('admin-inquiry', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-home');
    $trail->push('問い合わせ一覧', route('contact.inquiry'));
});
// 管理画面Home > 問い合わせ一覧 > 問い合わせ詳細
Breadcrumbs::for('admin-inquiry-detail', function (BreadcrumbTrail $trail, $inquiry) {
    $trail->parent('admin-inquiry');
    $trail->push('問い合わせ内容', route('contact.inquiry.detail',compact('inquiry')));
});

<?php

// ホーム
Breadcrumbs::for('home', function ($trail) {
    $trail->push('ホーム', url('/'));
});


// ホーム > STEP一覧
Breadcrumbs::for('steps', function ($trail) {
    $trail->parent('home');
    $trail->push('STEP一覧', url('/steps'));
});

Breadcrumbs::for('showParentStep', function ($trail, $parentStep) {
    $trail->parent('steps');
    $trail->push($parentStep->title, url('/steps/' . $parentStep->id));
});

Breadcrumbs::for('showChildStep', function ($trail, $parentStep, $childStep) {
    $trail->parent('showParentStep', $parentStep);
    $trail->push($childStep->title, url('/steps/' . $parentStep->id . '/' . $childStep->id));
});

Breadcrumbs::for('mypage', function ($trail) {
    $trail->parent('home');
    $trail->push('マイページ', url('/users/mypage'));
});

Breadcrumbs::for('login', function ($trail) {
    $trail->parent('home');
    $trail->push('ログイン', url('/login'));
});

Breadcrumbs::for('register', function ($trail) {
    $trail->parent('home');
    $trail->push('会員登録', url('/register'));
});

Breadcrumbs::for('registStep', function ($trail, $editFlg) {
    $trail->parent('home');
    $trail->push($editFlg ? 'STEP編集' : 'STEP登録', url('/steps/cteate'));
});

Breadcrumbs::for('profEdit', function ($trail) {
    $trail->parent('home');
    $trail->push('プロフィール編集', url('/users/edit'));
});

// // ホーム > 本の一覧 >  [Title]
// Breadcrumbs::for('showBook', function ($trail, $book) {
//     $trail->parent('books');
//     $trail->push($book->book_title, url('books/' . $book->id));

// });

// // ホーム > 本の一覧 >  [Title]  > 編集
// Breadcrumbs::for('editBook', function ($trail, $book) {
//     $trail->parent('showBook', $book);
//     $trail->push('編集', url('books/' . $book->id .'/edit'));
// });
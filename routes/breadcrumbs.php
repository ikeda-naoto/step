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
    $trail->push($parentStep->parent_title, url('/steps/' . $parentStep->id));
});

Breadcrumbs::for('mypage', function ($trail) {
    $trail->parent('home');
    $trail->push('マイページ', url('/users/mypage'));
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
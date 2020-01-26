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

// ホーム > STEP一覧 > 親STEPタイトル
Breadcrumbs::for('showParentStep', function ($trail, $parentStep) {
    $trail->parent('steps');
    $trail->push($parentStep->title, url('/steps/' . $parentStep->id));
});

// ホーム > STEP一覧 > 子STEPタイトル
Breadcrumbs::for('showChildStep', function ($trail, $parentStep, $childStep) {
    $trail->parent('showParentStep', $parentStep);
    $trail->push($childStep->title, url('/steps/' . $parentStep->id . '/' . $childStep->id));
});

// ホーム > マイページ
Breadcrumbs::for('mypage', function ($trail) {
    $trail->parent('home');
    $trail->push('マイページ', url('/users/mypage'));
});

// ホーム > ログイン
Breadcrumbs::for('login', function ($trail) {
    $trail->parent('home');
    $trail->push('ログイン', url('/login'));
});

// ホーム > 新規会員登録
Breadcrumbs::for('register', function ($trail) {
    $trail->parent('home');
    $trail->push('新規会員登録', url('/register'));
});

// ホーム > STEP登録or編集
Breadcrumbs::for('registStep', function ($trail, $editFlg) {
    $trail->parent('home');
    $trail->push($editFlg ? 'STEP編集' : 'STEP登録', url('/steps/cteate'));
});

// ホーム > プロフィール編集
Breadcrumbs::for('profEdit', function ($trail) {
    $trail->parent('home');
    $trail->push('プロフィール編集', url('/users/edit'));
});
<?php 
namespace App\lib;

use App\ChildStep;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
 
// 様々なコントローラで使われる共通のメソッドを定義
class Common {

  // 親STEPに紐づいているカテゴリーと子STEPのデータを取得する
  public static function relationCategoryAndChildSteps($obj) {
    // カテゴリーデータを取得
    $obj->category;
    // 子STEPデータを取得
    $obj->childSteps;
  }

  // 数字かどうかを判定する
  public static function validNumber($text, $url = '/steps') {
    if(!ctype_digit($text)) {
      return redirect($url)->with('status', '不正な値が入力されました。')->throwResponse();
    }
    return true;
  }
  // 引数にとられたレコードが存在するかを判定する
  public static function isExist($val, $url = '/steps') {
    if(empty($val)) {
      return redirect($url)->with('status', '不正な値が入力されました。')->throwResponse();
    }
    return true;
  }

  // 画像登録処理
  public static function storePic($obj, $pic) {
    if(!empty($pic)){ // 画像データが送信されていた場合
       // 画像を保存
      $path = $pic->store('public/img');
      // 画像のファイル名をDBへ保存
      $obj['pic'] = basename($path); //
    }
    return $obj;
  }

  // 親STEP登録or編集処理
  public static function storeParentStep($request, $parentStep) {
    // 画像以外のデータを一括保存
    $parentStepData = array(
      'title' => $request->input('parent_title'),
      'category_id' => $request->input('parent_category_id'),
      'content' => $request->input('parent_content'),
    );
    $parentStepData = Common::storePic($parentStepData, $request->parent_pic);
    Auth::user()->parentSteps()->save($parentStep->fill($parentStepData));
  }

  // 子STEP登録or編集処理
  public static function storeChildSteps($request, $editFlg, $parentStep, $childSteps = array()) {
    for ($i = 0; $i < count($request->child_title); $i++) { // 子STEPのタイトルの配列の要素数でループ回数を決定。(タイトルは必須項目なので、少なくとも一つはある)
      // 登録するデータをオブジェクトの形にする
      $childStepData = array(
          'title' => $request->child_title[$i],
          'time' => $request->child_time[$i],
          'content' => $request->child_content[$i],
          'num' => $i+1,
      );
      // 子STEP登録処理
      if(!$editFlg) { // 新規登録の場合
        $childStep = new ChildStep;
        $parentStep->childSteps()->save($childStep->fill($childStepData));
      }else { // 編集の場合
        if(!empty($childSteps[$i])) { // 以前登録した子STEPの内容を上書きする場合
          $childStep = $childSteps[$i];
          $childStep->fill($childStepData)->save();
        }else { // 新たに子STEPを登録する場合
          $childStep = new ChildStep;
          $parentStep->childSteps()->save($childStep->fill($childStepData));
        }
      }
    }
    if(!$editFlg) {
      session()->flash('status', '新しいSTEPを登録しました。');
    }else {
      session()->flash('status', $parentStep->title . 'を編集しました。');
    }
  }
  
  // ページネーションに必要なデータ作成
  public static function createPaginationData ($obj, $request) {
    $perPage = 6;
    return new LengthAwarePaginator(
      $obj->forPage($request->page, $perPage),
      count($obj),
      $perPage,
      $request->page,
      array('path' => $request->url())
  );
  }
}
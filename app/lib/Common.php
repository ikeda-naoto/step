<?php 
namespace App\lib;

use App\ChildStep;
use Illuminate\Pagination\LengthAwarePaginator;
 
class Common {

  // 親STEPに紐づいているカテゴリーと子STEPのデータを取得するメソッド
  public static function relationCategoryAndChildSteps($obj) {
    // カテゴリーデータを取得
    $obj->category;
    // 子STEPデータを取得
    $obj->childSteps;
  }
  // 数字かどうかを判定するメソッド
  public static function validNumber($text, $url = '/steps') {
    if(!ctype_digit($text)) {
      return redirect($url)->with('status', '不正な値が入力されました。')->throwResponse();
    }
    return true;
  }
  // 引数にとられたレコードが存在するかを判定するメソッド
  public static function isExist($val, $url = '/steps') {
    if(empty($val)) {
      return redirect($url)->with('status', '不正な値が入力されました。')->throwResponse();
    }
    return true;
  }

  // 画像登録メソッド
  public static function storePic($obj, $pic) {
    if(!empty($pic)){ // 画像データが送信されていた場合
       // 画像を保存
      $path = $pic->store('public/img');
      // 画像のファイル名をDBへ保存
      $obj->pic = basename($path); //
    }
  }
  // STEP登録メソッド
  public static function storeStep($childTitle, $time, $childContent, $editFlg, $parentStep, $childSteps = array()) {
    for ($i = 0; $i < count($childTitle); $i++) { // 子STEPのタイトルの配列の要素数でループ回数を決定。(タイトルは必須項目なので、少なくとも一つはある)
      // 登録するデータをオブジェクトの形にする
      $childStepData = array(
          'child_title' => $childTitle[$i],
          'time' => $time[$i],
          'child_content' => $childContent[$i],
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
          $parentStep->childSteps()->save($childStep->fill($data));
        }
      }
    }
    if(!$editFlg) {
      session()->flash('status', '新しいSTEPを登録しました。');
    }else {
      session()->flash('status', $parentStep->parent_title . 'を編集しました。');
    }
  }
  // ページネーションに必要なデータ作成メソッド
  public static function createPaginationData ($obj, $request) {
    $perPage = 10;
    return new LengthAwarePaginator(
      $obj->forPage($request->page, $perPage),
      count($obj),
      $perPage,
      $request->page,
      array('path' => $request->url())
  );
  }
}
<?php 
namespace App\lib;

use App\ChildStep;
 
class Common {

  // 親STEPに紐づいているカテゴリーと子STEPのデータを取得するメソッド
  public static function relationCategoryAndChildSteps($obj) {
    // カテゴリーデータを取得
    $obj->category;
    // 子STEPデータを取得
    $obj->childSteps;
  }

  public static function validNumber($text, $url = '/steps') {
    if(!ctype_digit($text)) {
      return redirect($url)->with('status', '不正な値が入力されました。')->throwResponse();
    }
    return true;
  }

  public static function isExist($val, $url = '/steps') {
    if(empty($val)) {
      return redirect($url)->with('status', '不正な値が入力されました。')->throwResponse();;
    }
    return true;
  }

  public static function storePic($obj, $pic) {
    if(!empty($pic)){
      $path = $pic->store('public/img');
      $obj->pic = basename($path);
    }
  }

  public static function storeStep($childTitle, $time, $childContent, $editFlg, $parentStep, $childSteps = array()) {
    for ($i = 0; $i < count($childTitle); $i++) { // 子STEPのタイトルの配列の要素数でループの回数を決定。タイトルは必須項目なので、少なくとも一つはある
      $data = array(
          'child_title' => $childTitle[$i],
          'time' => $time[$i],
          'child_content' => $childContent[$i],
          'num' => $i+1,
      );
      if(!$editFlg) {
        $childStep = new ChildStep;
        $parentStep->childSteps()->save($childStep->fill($data));
      }else {
        if(!empty($childSteps[$i])) {
          $childStep = $childSteps[$i];
          $childStep->fill($data)->save();
        }else {
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
}
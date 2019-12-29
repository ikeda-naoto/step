<?php 
namespace app\lib;
 
class Common {

  // 親STEPに紐づいているカテゴリーと子STEPのデータを取得するメソッド
  public static function relationCategoryAndChildSteps($obj) {
      // カテゴリーデータを取得
      $obj->category;
      // 子STEPデータを取得
      $obj->childSteps;
  }
}
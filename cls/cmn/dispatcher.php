<?php
namespace Cmn;

class Dispatcher
{

  private static $type_dir;
  private static $type_name;
  private static $controller_name;
  private static $action_name;

  private function __construct(){}

/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 *
 *  リクエストURIから対象のコントローラを呼び出す
 *
 ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
  public static function dispach()
  {
    self::setParamNames();
    $controller_file = self::getCtlFileName();
    $controller_file_fullpath = CONTROLLER_DIR . DS . $controller_file . '.php';
    if(!file_exists( $controller_file_fullpath ) ){
      $controller_file = ROOT_CTL;
      $controller_file_fullpath = CONTROLLER_DIR . DS . CONTROLLER_DN . DS . ROOT_CTL . '.php';
      self::$controller_name = ROOT_CTL;
      self::$action_name = ROOT_ACN;
    }

    $ctlarr = explode('/' , $controller_file);
    $class = '';
    if( is_array($ctlarr) ){
      foreach( $ctlarr as $ca ){
        $class .= '\\' . ucfirst($ca);
      }
    }
    $class = CONTROLLER_DN . $class;
    self::setTypeDir();


    $controllerInstance = new $class;

    if( !method_exists( $controllerInstance, self::$action_name ) ){
      self::$action_name = ROOT_ACN;
    }


    $controllerInstance->type_dir = self::$type_dir;
    $controllerInstance->controller_name = self::$controller_name;
    $controllerInstance->action_name = self::$action_name;
    $controllerInstance->run();

  }

/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 *
 *  リクエストURIからメンバ変数を設定する
 *
 ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
  static function setParamNames()
  {
    $prms = UrlParameter::getPramArr();
    $arr = [];

    self::$action_name = (is_array($prms))? end($prms): $prms;
    $arr = self::arrDown($prms);
    self::$controller_name = (is_array($arr))? end($arr): $arr;
    $arr = self::arrDown($arr);
    if (is_array($arr)){
      self::$type_name = [];
      foreach($arr as $k => $v){
        self::$type_name[$k] = $v;
        $arr = self::arrDown($arr);
      }

    }else{
      self::$type_name = $arr;
    }

  }

/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 *
 *  配列の最後を削除する
 *
 ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
  protected static function arrDown($arr){
    if (is_array($arr)){
      $arrDown = [];
      for($i = 0 ; $i < count($arr) -1 ; $i++){
        $arrDown[] = $arr[$i];
      }
      return $arrDown;
    }
    return false;

  }

/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 *
 *  ctlディレクトリ以下のコントロラーファイルパスを返す
 *
 ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
  protected static function getCtlFileName()
  {
    if(is_array(self::$type_name)){
      $type_name = [];
      $type_names = self::$type_name;
      $controller_file = '';
      for($i=0; $i < count($type_names); $i++){
        $controller_file .= $type_names[$i] . DS;
      }
      $controller_file .= self::$controller_name;

    }elseif(self::$type_name != ''){
      $controller_file = self::$type_name . DS . self::$controller_name;
    }else{
      $controller_file = self::$controller_name;
    }

    return $controller_file;
  }

/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 *
 *  機能別ディレクトリの指定があれば設定する
 *
 ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
  protected static function setTypeDir()
  {
    $type_dir='';

    if(is_array(self::$type_name)){
      foreach(self::$type_name as $td){
        $type_dir .= DS . $td;
      }
    }else{
      $type_dir = self::$type_name;
    }

    $type_dir = trim($type_dir,'/');
    self::$type_dir = $type_dir;
  }
}

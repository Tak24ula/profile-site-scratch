<?php
namespace Cmn;

class TemplateBase
{
  private $tempfile;
  public $data;
  public $assets;

  function __construct()
  {
  }

  function display()
  {
    try{
      if ( is_array($this->data) ){
        foreach ( $this->data as $key => $val ){

          $this->$key = $val;
        }
      }
      $this->assets = $this->D_R_P() . '/' . 'assets';
      if(file_exists($this->tempfile)){
        include_once($this->tempfile);
      }
    }catch(ErrorException $e){
      echo $e['message'];
    }

  }

  function set_tempfile($controller_dir = '' , $controller_name = '')
  {

    $this->tempfile = VIEW_DIR_PATH . DS . $controller_dir . DS . $controller_name . '.php';

    if(!file_exists($this->tempfile)){
      echo $this->tempfile;
      return false;
    }

    return true;
  }

  function D_R_P()
  {
    $path = new UrlParameter();
  	return HOME_PROTCOL . SERVER_NAME;
  }

}



 ?>

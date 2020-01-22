<?php
namespace Mng;

/* :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::




::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */

class SessionManager
{

  public static $Messages = array(
    'error' => array(),
    'notice' => array()
  );

  function __construct()
  {
    self::getSessionMessage();
  }

  private static function setSesstionMessage()
  {
    if ( isset( self::$Messages ) && is_array( self::$Messages ) ){
      foreach ( self::$Messages as $key => $value) {
        $_SESSION['messages'][$key] = $value;
      }
    }
  }

  private static function getSessionMessage()
  {
    if ( isset( $_SESSION['messages'] ) && is_array( $_SESSION['messages'] ) ){
      foreach ( $_SESSION['messages'] as $key => $value ) {
        self::$Messages[$key] = $value;
      }
    }
  }

  public static function setErrorMessage($msg = null)
  {
    self::$Messages['error'] = $msg;
    self::setSesstionMessage();
  }

  public static function getNotice()
  {
    if( self::$Messages['notice'] == null ){
      return false;
    }
    return self::$Messages['notice'];
  }

  public static function getErrorMessage()
  {
    if( self::$Messages['error'] == null ){
      return false;
    }
    return self::$Messages['error'];
  }

  public static function unsetErrorMessage()
  {
  	$setSess = isset($_SESSION['messages']) ? $_SESSION['messages'] : array();
    $setSess['error'] = null;
    $_SESSION['messages'] = $setSess;
  }
}

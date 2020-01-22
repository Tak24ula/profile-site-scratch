<?php
namespace Ctl;

class Root extends Base\ControllerBase
{

  function __construct()
  {

  }
  function index()
  {
    header( 'location: ' . HOME_PROTCOL . SERVER_NAME . DS . HOME_URI );
    exit();
  }

}

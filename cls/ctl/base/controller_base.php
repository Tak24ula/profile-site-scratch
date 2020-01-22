<?php
namespace Ctl\Base;

class ControllerBase
{
  public $relative_documentRoot_path;
  public $type_dir;
  public $controller_name;
  public $action_name;
  public static $data;

  function __construct()
  {

  }

  function run()
  {
    $tmplateInstance = new \Cmn\TemplateBase;
    $action = $this->action_name;

    $tmplateInstance -> set_tempfile( $this->type_dir, $this->controller_name );
    $this->pre_action();
    $this->$action();
    $tmplateInstance->data = self::$data;
    $tmplateInstance->display();

  }

  protected function pre_action()
  {}

}

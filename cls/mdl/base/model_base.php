<?php
namespace Mdl\Base;

class ModelBase
{
  public $pdo;
  private $dsn;
  private $host;
  private $port;
  private $user;
  private $pass;
  private $database;
  private $option;

  function __construct()
  {
    global $db_access_class;
    $this->mysqli = $db_access_class->mysqli;
  }

  public function query($sql)
  {
    $this->rs = $this->mysqli->query($sql);
    return $this->rs;
  }

  public function insert_id()
  {
    if(isset($this->rs)){
      return $this->rs->insert_id;
    }
    return false;
  }

}

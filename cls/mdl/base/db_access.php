<?php
namespace Mdl\Base;

class DbAccess
{
    public $mysqli;
    public $db_info;

    public function __construct($db_info = null)
    {
        if (!$db_info) {
            $db_info = array(
                    'host'     => DB_HOST,
                    'dbname'   => DB_NAME,
                    'dbuser'   => DB_USER,
                    'password' => DB_PASS,
                    'port' => DB_PORT
            );
        }
        $this->db_info = $db_info;
        $this->init_db();
    }

    public function init_db()
    {
        try {
            $this->mysqli = @new \mysqli(
                    $this->db_info['host'],
                    $this->db_info['dbuser'],
                    $this->db_info['password'],
                    $this->db_info['dbname'],
                    $this->db_info['port']
                    );
            if (mysqli_connect_error()) {
            	// echo $this->db_info['host'] ."<br>" .$this->db_info['dbuser'] ."<br>" .$this->db_info['password'] ."<br>" .$this->db_info['dbname'] ."<br>" ;
              throw new \RuntimeException('データベースの選択に失敗しました ('.mysqli_connect_errno().')'.mysqli_connect_error());
            }
            $this->mysqli->set_charset('utf8');
            return true;

        } catch (\RuntimeException $e) {
        		echo $e->getMessage();
        }
    }
}

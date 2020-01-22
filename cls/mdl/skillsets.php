<?php
namespace Mdl;

class Skillsets extends \Mdl\Base\ModelBase
{
    public $table_name = 'skillsets';
    public $primary_key = 'id';
    public $keys = array(
            'id',
            'name',
            'experience',
            'experience_value',
            'comment',
            'achievement',
            'incident',
            'image',
            'keywords',
            'up'
    );

   public $names;
   public $experiences;
   public $comments;
   public $achievements;
   public $incidents;

    public function __construct()
    {
        parent::__construct();
    }

    function get_all()
    {
        $this->names = [];
        $this->experiences = [];
        $this->comments = [];
        $this->achievements = [];
        $this->incidents = [];

        $sql = "SELECT * FROM `". $this->table_name . "`";

        $rs_skills = $this->query($sql);
        if ( isset($rs_skills) && $rs_skills ){
            while ($row = $rs_skills->fetch_assoc()) {
                $this->names[$row['id']]          = $row['name'];
                $this->experiences[$row['id']]    = $row['experience'];
                $this->comments[$row['id']]       = $row['comment'];
                $this->achievements[$row['id']]   = $row['achievement'];
                $this->incidents[$row['id']]      = $row['incident'];
            }
            $rs_skills->free();
        }

    }


}

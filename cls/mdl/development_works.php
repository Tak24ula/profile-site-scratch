<?php
namespace Mdl;

class DevelopmentWorks extends \Mdl\Base\ModelBase
{
    public $table_name = 'development_works';
    public $primary_key = 'id';
    public $keys = array(
            'id',
            'category',
            'title',
            'sub_title',
            'url',
            'charge',
            'tools',
            'image',
            'date_text',
            'keywords',
            'up'
    );

   public $categories;
   public $titles;
   public $sub_titles;
   public $urls;
   public $charges;
   public $tools;
   public $images;
   public $date_texts;

    public function __construct()
    {
        parent::__construct();
    }

    function get_all()
    {
        $this->categories = [];
        $this->titles = [];
        $this->sub_titles = [];
        $this->urls = [];
        $this->charges = [];
        $this->tools = [];
        $this->images = [];
        $this->date_texts = [];

        $sql = "SELECT * FROM `". $this->table_name . "`";

        $rs_works = $this->query($sql);
        if ( isset($rs_works) && $rs_works ){
            while ($row = $rs_works->fetch_assoc()) {
                $this->categories[$row['id']]          = $row['category'];
                $this->titles[$row['id']]              = $row['title'];
                $this->sub_titles[$row['id']]          = $row['sub_title'];
                $this->urls[$row['id']]                = $row['url'];
                $this->charges[$row['id']]             = $row['charge'];
                $this->tools[$row['id']]               = $row['tools'];
                $this->images[$row['id']]              = $row['image'];
                $this->date_texts[$row['id']]          = $row['date_text'];
            }
            $rs_works->free();
        }

    }


}

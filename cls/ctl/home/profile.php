<?php
namespace Ctl\Home;
use Ctl\Base\ControllerBase as ControllerBase;

class Profile extends ControllerBase
{

    function __construct()
    {
        $this->assets = "http://" . filter_input( INPUT_SERVER , 'HTTP_HOST' ) . '/' . "assets";
    }
    /* ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
     *      初期表示
     :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
    function index()
    {
        $mdl_devWorks = new \Mdl\DevelopmentWorks();
        $mdl_devWorks->get_all();
        self::$data['categories'] = $mdl_devWorks->categories;
        self::$data['titles'] = $mdl_devWorks->titles;
        self::$data['sub_titles'] = $mdl_devWorks->sub_titles;
        self::$data['urls'] = $mdl_devWorks->urls;
        self::$data['charges'] = $mdl_devWorks->charges;
        self::$data['tools'] = $mdl_devWorks->tools;
        self::$data['images'] = $mdl_devWorks->images;
        self::$data['date_texts'] = $mdl_devWorks->date_texts;

        $mdl_skillsets = new \Mdl\Skillsets();
        $mdl_skillsets->get_all();
        self::$data['names'] = $mdl_skillsets->names;
        self::$data['experiences'] = $mdl_skillsets->experiences;
        self::$data['comments'] = $mdl_skillsets->comments;
        self::$data['achievements'] = $mdl_skillsets->achievements;
        self::$data['incidents'] = $mdl_skillsets->incidents;

    }

}

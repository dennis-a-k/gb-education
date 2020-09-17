<?php

class Controller
{
    public $view = 'admin';
    public $title;
    public $year;

    function __construct()
    {
        $this->title = Config::get('sitename');
        $this->year = date('Y', mktime());
    }

    public function index($data) {
        return [];
    }
}
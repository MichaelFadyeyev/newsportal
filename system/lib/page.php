<?php


class Page
{

    public $id;
    public $user=[];
    public $title;
    public $layout;
    public $content;
    public $register;

    public function __construct()
    {
        $this->register = require('system/config/pages_register.php');
        $this->id = $this->define_id();
        $this->user = $this->define_user();
        $this->title = $this->register[$this->id];
        $this->layout = 'public/layouts/base.php';
        $this->content = "public/pages/{$this->id}.php";
    }

    private function define_id()
    {
        if (!isset($_GET['id'])) return 'main';
        if (!array_key_exists($_GET['id'], $this->register)) return '404';
        return $_GET['id'];
    }


    private function define_user()
    {
        if (!isset($_SESSION['user'])) {
            return array('login' => 'Гість', 'role_id' => 3);
        }
        return $_SESSION['user'];
    }

    public function load()
    {
        include($this->layout);
    }
}

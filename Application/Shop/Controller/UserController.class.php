<?php
namespace Shop\Controller;

use Think\Controller;

class UserController extends Controller
{
    public function index()
    {
       // echo HTML_PATH;
       //  echo 'user';
        $this->display();
    }
 
    public function hash()
    {
        $this->display();
    }
}
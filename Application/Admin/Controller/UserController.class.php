<?php
namespace Admin\Controller;

use Think\Controller;

class UserController extends Controller
{
    public function index()
    {
      dump( C() );
      echo '123';
    }
}
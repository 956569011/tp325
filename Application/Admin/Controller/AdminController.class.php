<?php
namespace Admin\Controller;

use Think\Controller;

class AdminController extends Controller
{

    public function index()
    {
        echo 123;
        if (in_array('1', [1, 2, 3])) {
            echo '888';
        }

    }
    public function test()
    {

    }
}

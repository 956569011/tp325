<?php
namespace H5mobile\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        echo 'H5mobile';
    }
    public function sdata($value='')
    {
        echo 'h5 设置session';
        echo 'session不配置路径时存储的位置' . session_save_path().'<br />';
        session('h5','我是h5');
    }

    public function gdata($value='')
    {
        echo 'h5 设置session';
        echo 'session不配置路径时存储的位置' . session_save_path().'<br />';
        dump(session('h5'));
    }
}
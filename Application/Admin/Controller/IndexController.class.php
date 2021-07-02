<?php
namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        dump( C() );
        echo MODULE_NAME . '-' . CONTROLLER_NAME . '-' . ACTION_NAME;
    }
    public function _initialize(){
        // session(array(
        //     'name'=>'session_adminid',
        //     // 'expire'=>3600,//如果这儿不设置,有效期就是当前会话
        //     // 'path'=>$path
        // ));
        // session_start();
    }
    public function sdata()
    {
        echo '设置session';
        session('admin','我是admin');
        session('adminTest','我是valueTest');
    }
    public function gdata()
    {
        echo '获取admin sadmin 的session';
        dump(session('admin'));
        dump(session('adminTest'));
    }
    public function gpath($value='')
    {
        echo PHP_VERSION;
        echo 'session存储路径' . session_save_path() . "<br />";
        echo 'session.gc_maxlifetime:'. ini_get('session.gc_maxlifetime')."<br/>";
        echo 'session.gc_probability:'. ini_get('session.gc_probability')."<br/>";
        echo 'session.gc_divisor:'. ini_get('session.gc_divisor')."<br/>";
        echo 'session_id ' . session_id() . '<br />';
        echo 'session_name ' . session_name() . '<br />';
    }
    //删除
    public function ddata($value='')
    {
        session('admin',null);
        dump(session('admin'));
        dump(session('adminTest'));
    }
}
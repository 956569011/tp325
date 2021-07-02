<?php
namespace Api\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function _initialize(){


        // $session_temp = APP_PATH.'/session_temp/';
        // $path = file_exists($session_temp) ? $session_temp : mkdir($session_temp,0777,true);

        // session(array(
        //     'name'=>'session_api',
        //     'expire'=>3600,
        //     'path'=>$path
        // ));
        // session_start();

        session(array(
            'name'=>'session_api',
            // 'expire'=>3600,//如果这儿不设置,有效期就是当前会话
            // 'path'=>$path
        ));
        session_start();
    }
    public function index()
    {
        // dump(C());
        session('test','chenyao3');
        session('three','30秒过期');
        //http://www.360doc.com/content/16/0809/13/9200790_581893052.shtml
        echo '设置session<br />';
        echo '开启了api模式 ,没有显示模板的相关方法' . THINK_VERSION ;
        
    }
    public function get(){
        echo '获取session <br />';
        dump( session('test') );
        dump( session('thee') );
    }
    public function makeSessFile()
    {
        

        echo '查看是否生成session文件';
        //查看session文件保存的路径
        echo session_save_path();
    }
}
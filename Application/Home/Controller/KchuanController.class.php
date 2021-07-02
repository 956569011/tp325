<?php

namespace Home\Controller;

use Think\Controller;
//use Org\Util\Test;
//use Lchen\Sub\Sub;
//use Lchen\Sub2\Sub2;
use Lib\Asub\One;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class KchuanController extends Controller
{
    public function _initialize()
    {
       
        //https://www.cnblogs.com/dee0912/p/5061053.html 参考说明
        //https://blog.csdn.net/weixin_34009794/article/details/86124480 //session的一些配置参数
        //https://blog.csdn.net/weixin_30713953/article/details/99415859
        //https://blog.csdn.net/lhw413/article/details/60345482?spm=1001.2101.3001.4242
        //https://www.kancloud.cn/zsq1104/php_study/2116241

        // C('SESSION_AUTO_START',false);
        // dump( C('SESSION_AUTO_START') );exit;
       $session_temp = APP_PATH.'/session_temp/';
 
    //     // echo '初始化';
        $time = 'daoleha';
        session(array(
            'id'=>'yaosong' . $time,//设置session文件的的名字 sess_yaosongdaoleha
            'name'=>'LAILE',//设置session返回到客户端的的cookie名字，这个里面的值是服务器session文件的名字 yaosongdaoleha
            'path'=>file_exists($session_temp) ? $session_temp : mkdir($session_temp,0777,true) ,//存储session数据文件的地址
            'expire'=>3600,//设置session返回到客户端的的cookie名字 的有效时间，为的是下次请求能在带到服务器找到对应的session文件 gc_maxlifetime 设置值
            'prefix'=>'qz',//session 本地化空间前缀//取seession的时候这个是一维数组的键
            // 'domain'=>'.webstudy.com',////注意domain.com换成你自己的域名
            'use_cookies'=>'0',//sessionid在client采用的存储方式。为1代表使用浏览器的cookie记录client的sessionid，下一次请求的时候，
                                //$_COOKIE变量里才会有$_COOKIE[LAILE]这个元素存在
            'use_trans_sid'=>'1',//可以跨页传递
            'SESSION_TYPE'=>'',//session处理类型，支持驱动扩展 session hander类型 默认无需设置 除非扩展了session hander驱动
            'use_only_cookies'    =>  0,// 为1表示只使用cookie形式来传session id
        ));
    //     //session 的name 值，需要关闭自动开启的session  'SESSION_AUTO_START'    =>  false, 的这个配置，在配置前初始化化后
    //     //才可以开启session_start()
        session_start();
    }
    
    public function index()
    {
        $this->display('a');
    }
    public function indexb()
    {
        $this->display();
    }


    //https://blog.csdn.net/Thinking771470736/article/details/80927889 日志使用
    public function composer()
    {

        // create a log channel
        $log = new Logger('chenyao');
        $log->pushHandler(new StreamHandler('app.log', Logger::WARNING));

        // add records to the log
        //	$log->warning('Foo');
        //$log->error('Bar');
        $log->addWarning('警告');
        $log->addError('错误');
        echo 'over';
    }
    //设置session

    public function session(){
        
       session('test','china');
        
        echo session_name();
        // session(array('id'=>'abcefg','name'=>'sessionchen_id','expire'=>3600));
        // $res = session('test','123');
        // echo session_id();
        // echo '<hr />';
    
        // print_r($res);exit;
    }
    public function gsession()
    {
        dump($_SESSION);
        dump($_SESSION['qz']['test']);
        dump(session('test'));
        // session(array('name'=>'session_id','expire'=>3600));
        // var_dump(session('test'));
    }
    public function gsming()
    {
        // echo session_name();exit;
    }


}
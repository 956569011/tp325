<?php

namespace Home\Controller;

use Think\Controller;
//use Org\Util\Test;
//use Lchen\Sub\Sub;
//use Lchen\Sub2\Sub2;
use Lib\Asub\One;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class IndexController extends Controller
{
    //https://blog.csdn.net/Thinking771470736/article/details/80927889 日志使用
    public function composer()
    {
        // composer require "monolog/monolog:1.0.*"
        // create a log channel
        $log = new Logger('chenyao');
        $log->pushHandler(new StreamHandler('app.log', Logger::WARNING));
        $log->addWarning('警告');
        $log->addError('错误');
        echo 'over';
    }


    public function _initialize()
    {
       
        //https://www.cnblogs.com/dee0912/p/5061053.html 参考说明
        //https://blog.csdn.net/weixin_34009794/article/details/86124480 //session的一些配置参数
        //https://blog.csdn.net/weixin_30713953/article/details/99415859
        //https://blog.csdn.net/lhw413/article/details/60345482?spm=1001.2101.3001.4242

       $session_temp = APP_PATH.'/session_temp/';
 
        // echo '初始化';
        $time = 'daoleha';
        session(array(
            'id'=>'yaosong' . $time,//设置session文件的的名字 sess_yaosongdaoleha
            'name'=>'LAILE',//设置session返回到客户端的的cookie名字，这个里面的值是服务器session文件的名字 yaosongdaoleha
            'path'=>file_exists($session_temp) ? $session_temp : mkdir($session_temp,0777,true) ,//存储session数据文件的地址
            'expire'=>3600,//设置session返回到客户端的的cookie名字 的有效时间，为的是下次请求能在带到服务器找到对应的session文件 gc_maxlifetime 设置值
            'prefix'=>'qz',//session 本地化空间前缀//取seession的时候这个是一维数组的键
            // 'domain'=>'.webstudy.com',////注意domain.com换成你自己的域名
            'use_cookies'=>'1',//sessionid在client采用的存储方式。为1代表使用浏览器的cookie记录client的sessionid，下一次请求的时候，$_COOKIE变量里才会有$_COOKIE[LAILE]这个元素存在
            'use_trans_sid'=>'1',//可以跨页传递

            'type'=>''//session处理类型，支持驱动扩展 session hander类型 默认无需设置 除非扩展了session hander驱动
             //如果要设置session的处理驱动可以设置上这个值

            //默认的session驱动的命名空间是Think\Session\Driver,并实现下面的驱动接口：
            // 'type'=>'Db'//session处理类型，支持驱动扩展 session hander类型 默认无需设置 除非扩展了session hander驱动

        ));
        //session 的name 值，需要关闭自动开启的session  'SESSION_AUTO_START'    =>  false, 的这个配置，在配置前初始化化后
        //才可以开启session_start()
        session_start();
    }
    public function index()
    {
        $obj = new \Chenyao\Abc\Chena();
        $obj = new \Chenyao\Chena();


        echo THINK_PATH;
        echo '<hr />';
        //                $obj = new Test()
        //                $obj = new Sub();
        //                $obj = new Sub2();
        // $obj = new \Org\Util\Test();
        $obj = new \Lchen\Sub\Sub();
        $obj = new \Lchen\Sub2\Sub2();

        //如果没有定义命名空间
        import('Lchen.Wu.Mei');
        import('Org.Util.Notest');
        $obj = new \Mei();
        // $obj = new \Notest();

        //        $obj = new \Lib\Asub\One();
        $obj = new One();

        import('Lib.Bsub.Noone');
        $obj = new \Noone();

        $this->display();
    }
    public function index2()
    {

        $obj = new \Common\Three\One\Ceshi();
    }
    public function index3()
    {

        $obj = new \Chenyao\Abc\Chena();
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

    public function indextwo()
    {
       $this->display();
    }
	//测试缓存时间设置
	public function cun(){
		echo 'over';
		
		$res = mkdir(dirname(TEMP_PATH) . '/testcache',0777,true);
		
		//动态指定设置缓存路径
		C('DATA_CACHE_PATH',dirname(TEMP_PATH) . '/testcache');
		S(['prefix'=>'chentoken_']);
		//S('chenyao',88,['prefix'=>'chentoken_','expire'=>20]);
		S('chenyao',88,20);
		dump(S('chenyao'));
	
	}
	
	//指定缓存设置，不设置就是默认存放路径
	public function cun2(){
		echo 'over2';
		//$res = mkdir(dirname(TEMP_PATH) . '/testcache',0777,true);
		//C('DATA_CACHE_PATH',dirname(TEMP_PATH) . '/testcache');
		S(['prefix'=>'chenticket_']);
		//S('chenyao',88,['prefix'=>'chentoken_','expire'=>20]);
		S('chenyao',520,80);
		dump(S('chenyao'));
	
	}
}
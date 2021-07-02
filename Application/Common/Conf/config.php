<?php
//如果url直接不通过入口访问这儿会出现问题问题,会被执行.所以在布暑的时候,就要把框架和应用目录不要暴露在网站根目录下
        $session_temp = APP_PATH.'/session_temp/';
        $path = file_exists($session_temp) ? $session_temp : mkdir($session_temp,0777,true);
return array(


    // 'SHOW_PAGE_TRACE' =>true,

    //使用浏览器cookie 存seesion id

    // 'SESSION_OPTIONS'         =>  array(
    //     'name'                =>  'CHENID',      //设置session名
    //     'expire'              =>  24*3600*15,    //SESSION的 存在浏览器中的sessionid 保存15天
    //     'use_cookies'=>'1',                                         
                                                    /*没有设置，会读取php.ini的文件中的值（php加载的时候会读取到此值），
                                                    sessionid在client采用的存储方式。
                                                    为1代表使用浏览器的cookie记录client的sessionid，
                                                    下一次请求的时候，$_COOKIE变量里才会有$_COOKIE[CHENID]这个元素存在*/

    //     'use_trans_sid'       =>  0,             //跨页传递 表示当客户端浏览器禁止cookie的时候，页面上的链接会基于url传递SESSIONID
    //     'use_only_cookies'    =>  0,             //表示 是否只开启基于cookies的session的会话方式
    //     // 'domain'=>'.webstudy.com',            //注意domain.com换成你自己的域名 (默认设置当前www.webstudy.com 这个完整二级域名下)
          
    // ),

    //使用url存传seesionid
    // 'SESSION_OPTIONS'         =>  array(
    //     'name'                =>  'CHENID',     //设置session名
    //     'expire'              =>  24*3600*15,   //SESSION保存15天
    //     'use_cookies'=>'0',                     //为0,设置session id,不以cookie来方式来存，浏览器会在地址上自动带上session id
    //     'use_trans_sid'       =>  1,            //跨页传递 表示当客户端浏览器禁止cookie的时候，页面上的链接会基于url传递SESSIONID
    //     'use_only_cookies'    =>  0,            //表示 是否只开启基于cookies的session的会话方式
         
    // ),


    //设置session处理的驱动 默认的session驱动的命名空间是Think\Session\Driver,并实现下面的驱动接口：
    // 'SESSION_TYPE'=>'Db'
    // // 或者
    // 'SESSION_OPTIONS'=>array(
    //     'type'=>'Db',
    // )


    //关闭自动开启session需要手动调用开启session; 
    //如果要动态设置session的一些配置参数，需要先配置好，在session_start() ,所以要先在全局关闭session_start的全局开启
    'SESSION_AUTO_START'    =>  false,    // 是否自动开启Session


                        //或者 可以在 /etc/php.ini中修改// session.auto_start = 0


    //更改session存储路径 //这儿设置了用这儿的,这儿没有设置及子模块应用中设置了用模块应用的,
    //如果模块应用中也没有设置就用php.ini里面设置的
    'SESSION_OPTIONS' => array('path'=>APP_PATH.'/session_temp/'),

	//'配置项'=>'配置值'

    'AUTOLOAD_NAMESPACE' => array(
        'Lib'     => APP_PATH.'Lib',
        'Chenyao'     => THINK_PATH.'Chenyao',
        'Chenyao\Abc'     => THINK_PATH.'Chenyao\Abc',
    ),



);
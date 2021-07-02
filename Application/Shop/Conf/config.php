<?php
    $session_temp = APP_PATH.'/session_temp/';
    $path = file_exists($session_temp) ? $session_temp : mkdir($session_temp,0775,true);
return array(
    'SHOW_PAGE_TRACE' =>true,
	//'配置项'=>'配置值'
	'SESSION_AUTO_START' => true,//只要是模块存需要单独存session,公共配置都必须先关闭SESSION_AUTO_START配置,
								 //在对应的模块应用中配置开启session
	// 'SESSION_PREFIX'=>'sp',//加了这项,在获取值的时候有session值的时候是一个二维数组
		

	//*********把session存入文件***********/
							  //下标是sp,下标对应的值才是设置的数据
/*	'SESSION_OPTIONS'=>array(
   			'name'                =>  'session_shop',     //设置session名
	     	'expire'              =>  3600,   //SESSION保存1个小时,一个小时过期
			'path'=>$path,

	),*/

	/*********把session存入数据库*********/
	//使用session驱动单独匹配存入数据库
/*	'SESSION_TYPE'=>'Mysqli',
	'SESSION_TABLE'=>'think_session',

	//如果用驱动的方式,这个时间指的是数据库给定的记录过期时间
	'SESSION_EXPIRE'=>'60',
	'SESSION_OPTIONS'=>array(
   			'name'                =>  'session_shop',     //设置session名
   			'expire' =>'60',//这个指的是session_shop,也就是浏览器端存本次请求的cookie的过期时间 ,
   							//如果只是当前会话有效,那么就为空即可
   							// SESSION_EXPIRE ,SESSION_OPTIONS['expire'] 
   							//他们两的时间要相等,任意一个失效,和记录不存在,session都读取不了
	),
	//tp3session
	'DB_TYPE'                => 'mysql', // 数据库类型
    'DB_HOST'                => 'localhost', // 服务器地址
    'DB_NAME'                => 'tp3session', // 数据库名
    'DB_USER'                => 'tp3session', // 用户名
    'DB_PWD'                 => 'tp3session', // 密码
    'DB_PORT'                => '3306', // 端口
    'DB_PREFIX'              => 'think_', // 数据库表前缀*/
    /*********把session存入memcache*********/
/*    'SESSION_OPTIONS'=>array(
		'name'=>  'sessionMem_shop',
		'expire' =>'3600',//session中cookie的会话标识有期,如果是当前会话设置为空字串
    ),
    'SESSION_TYPE'=>'Memcache',
    'SESSION_TIMEOUT'=>'',
    'SESSION_PERSISTENT'=>'',
    'SESSION_EXPIRE'=>'3600',//session数据的有效期,默认一个小时
    'MEMCACHE_HOST' =>'127.0.0.1',////Memcache服务器
	'MEMCACHE_PORT' =>'11211',////Memcache端口
*/

	//存入redis
    'SESSION_OPTIONS'=>array(
		'name'=>  'sessionRed_shop',
		'expire' =>'3600',//session中cookie的会话标识有期,如果是当前会话设置为空字串
    ),
    'SESSION_PREFIX' => 'sred_', //session前缀
	'SESSION_TYPE'=>'Chenredis',
    'SESSION_TIMEOUT'=>'1',//这个是redis的连接超时时间设置
    'SESSION_EXPIRE'=>'3600',//session数据的有效期,默认一个小时,这儿保存10秒做测试
    'REDIS_HOST' =>'127.0.0.1',//Redis服务器
	'REDIS_PORT' =>'6379',//Redis端口


	//缓存我们使用redis缓存配置 
	'DATA_CACHE_TYPE'=>'Redis',
	// 'REDIS_HOST'=>'127.0.0.1',
	// 'REDIS_PORT'=>'6379',
	'DATA_CACHE_TIMEOUT'=>'60',
	'DATA_CACHE_PREFIX'=>'cred_',
	'REDIS_AUTH_PASSWORD'=>'',//配置密码,没有密码设置为空字串即可


	//数据库配置
	'DB_TYPE'                => 'mysql', // 数据库类型
    'DB_HOST'                => 'localhost', // 服务器地址
    'DB_NAME'                => 'tp3session', // 数据库名
    'DB_USER'                => 'tp3session', // 用户名
    'DB_PWD'                 => 'tp3session', // 密码
    'DB_PORT'                => '3306', // 端口
    'DB_PREFIX'              => 'think_', // 数据库表前缀*/




	//表单令牌配置

 	'TOKEN_ON' => true, // 是否开启令牌验证 默认关闭
    'TOKEN_NAME' => '__hash__', // 令牌验证的表单隐藏字段名称，默认为__hash__
    'TOKEN_TYPE' => 'md5', //令牌哈希验证规则 默认为MD5
    'TOKEN_RESET' => true, //令牌验证出错后是否重置令牌 默认为true在这里插入代码片




	/*'HTML_CACHE_ON'     =>    true, // 开启静态缓存
	'HTML_CACHE_TIME'   =>    60,   // 全局静态缓存有效期（秒）
	'HTML_FILE_SUFFIX'  =>    '.shtml', // 设置静态缓存文件后缀
	'HTML_CACHE_RULES'  =>     array(  // 定义静态缓存规则
	     // // 定义格式1 数组方式
	     // '静态地址'    =>     array('静态规则', '有效期', '附加规则'), 
	     // // 定义格式2 字符串方式
	     // '静态地址'    =>     '静态规则', 

		//http://www.webstudy.com/tp323/shop.php/user/index/id/1
		//http://www.webstudy.com/tp323/shop.php/user/index/id/2
		'user:'=>array('Shop/User/{:action}_{id}','600'),
					//这个规则指的是目录
		// 'user:index'=>array('Shop/User/index',60),
		// // 'user:hash'=>array('Shop/User/hash',60,'md5'),
		// 'user:hash'=>array('Shop/User/hash',60),
	),*/


//参考:
// 'HTML_CACHE_RULES'  =>     array(     // 定义静态缓存规则
 
//     // 定义整个文章控制器
//     'Article:'      =>       'Article/{:action}_{id}',
     
//     // 对商品进行缓存
//     'Product:plist' =>       'Product/plist_{id}_{pid}',
     
//     // 对单个操作进行缓存
//     'Index:index'   =>       'Index/index',
//     'Product:category'=>array('Product/category',0),
     
// ),


);
<?php
    // $session_temp = APP_PATH.'/session_temp/h5/';
    // $path = file_exists($session_temp) ? $session_temp : mkdir($session_temp,0775,true);
    
	//https://my.oschina.net/yearnfar/blog/297529 参考
    // 底层生成session_id 算法 时间戳、毫秒数、后面的那个随机数
return array(

	    'SESSION_OPTIONS'         =>  array(
	        'name'                =>  'h5_id',     //设置session名 如果不设置就是默认的PHPSESSID
	  //       'expire'              =>  60,   //SESSION保存1个小时,一个小时过期
			// 'path'=>$path
    	),
	    'SESSION_AUTO_START'    =>  true,
);
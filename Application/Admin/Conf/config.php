<?php
    $session_temp = APP_PATH.'/session_temp/admin/';
    $path = file_exists($session_temp) ? $session_temp : mkdir($session_temp,0775,true);
    
return array(

	    'SESSION_OPTIONS'         =>  array(
	        'name'                =>  'session_adminid',     //设置session名
	        'expire'              =>  3600,   //SESSION保存1个小时,一个小时过期
			'path'=>$path
    	),
	    'SESSION_AUTO_START'    =>  true,
	    
);
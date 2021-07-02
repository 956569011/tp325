<?php
    $session_temp = APP_PATH.'/session_temp/api/';
    $path = file_exists($session_temp) ? $session_temp : mkdir($session_temp,0777,true);
    
return array(
	//'配置项'=>'配置值'
	    'SESSION_OPTIONS' => array('path'=>$path),
);
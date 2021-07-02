<?php
//https://www.kancloud.cn/zsq1104/php_study/2116241
ini_set('session.use_trans_sid',1);  // 使用url传递
ini_set('session.use_only_cookies',0); // 不仅仅使用cookies
ini_set('session.use_cookies',0); //  不使用cookie
ini_set('session.name','sid');  //  设置seesion名称 默认PHPSESSID
session_start();
echo '<a href="l.php">test</a>';
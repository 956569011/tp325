<?php
//当前这个文件以命令行cli运行方式
// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false

define('BIND_MODULE','Mycli');//这儿声明了绑定模块系统会自动生成
define('APP_DEBUG',false);
define('APP_MODE','mycli');
define('APP_ROOT', dirname(__FILE__));

//composer 自动加载文件
//require 'vendor/autoload.php';
// 定义应用目录
define('APP_PATH', APP_ROOT . '/Application/');

//生成模型
// define('BUILD_MODEL_LIST','User,Menu');
//创建当前自定义的控制文件
define('BUILD_CONTROLLER_LIST','Index');

// 引入ThinkPHP入口文件
require APP_ROOT . '/ThinkPHP/ThinkPHP.php';
// 亲^_^ 后面不需要任何代码了 就是如此简单
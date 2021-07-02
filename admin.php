<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);

//当前应用状态对应的配置文件
//会加载这个路径下配置 ./Application/Common/Conf/statechen.php
//define('APP_STATUS','statechen');

//设置默认数据缓存类型 只有Sae 和 File
// define('STORAGE_TYPE','File');


//产生lite文件
// define('BUILD_LITE_FILE',true);
//composer 自动加载文件
require 'vendor/autoload.php';
// 定义应用目录
define('APP_PATH','./Application/');
//绑定admin.php文件为当前指定模块
define('BIND_MODULE','Admin');
//生成模型
// define('BUILD_MODEL_LIST','User,Menu');
//创建当前自定义的控制文件
define('BUILD_CONTROLLER_LIST','Admin,User,Index');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单
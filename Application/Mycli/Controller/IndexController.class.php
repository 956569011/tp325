<?php
namespace Mycli\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
      $this->show('命令模式访问 mycli' . THINK_VERSION);
    }
    public function cli(){
      // php.exe index.php(或其它应用入口文件） 模块/控制器/操作/[参数名/参数值...]
      // php mycli.php Index/cli
      $this->show('cli ' . THINK_VERSION);
    }
}
<?php
namespace Mycli\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
      $this->show('命令模式访问 mycli' . THINK_VERSION);
    }
}
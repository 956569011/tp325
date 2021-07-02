<?php
namespace Wx\Controller;

use Think\Controller;

class indexController extends Controller
{
    public function index()
    {
        $this->show('<div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP Chenyao Modify</b>！</p><br/>版本 V{$Think.version}</div>','utf-8');
    }

    public function test(){
        echo U('test');
        $r = C('URL_CASE_INSENSITIVE');
        dump($r);
        $this->show('wx test');
    }
    public function one(){
        echo MODULE_NAME . '-' . CONTROLLER_NAME . '-' . ACTION_NAME;
        echo '<hr />';
        $r = C('wx_chen');
        dump($r);
        echo U('one');

    }
    public function two(){
        echo 'two';
    }
}
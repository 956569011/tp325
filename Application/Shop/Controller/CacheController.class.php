<?php
namespace Shop\Controller;
use Think\Controller;
class CacheController extends Controller{
	public function index()
	{
		phpinfo();exit;
		 echo '设置成功';
        //设置缓存
        dump(S('test','china',20));
	}
}

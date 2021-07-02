<?php
return array(
//这个开启后地址路径变成了 U('one') /tp323/wx.php/index/one.html /tp323/index.php/wx/index/one.html
	'URL_CASE_INSENSITIVE'   => true, // 默true 表示URL不区分大小写
    //表示区分大小写,指的是生成地址,是严格按照文件命名生成的
    // 说明地址 : https://www.kancloud.cn/manual/thinkphp/1717
    //U('one') 生成了 /tp323/wx.php/Index/one.html /tp323/index.php/Wx/Index/one.html
//	'URL_CASE_INSENSITIVE'   => false, //false则表示区分大小写
    'wx_chen'=>'this chen',
);
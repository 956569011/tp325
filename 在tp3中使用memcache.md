## 使用查询缓存配置方法 ;缓存使用memcache
https://www.cnblogs.com/yokooo/p/6395001.html
尝试在windows下装memcached，测试thinkphp3.2使用memecache缓存方式

1.下载memcache，使用cmd 安装，安装方法参照地址：

--

在Conf/config.php 中添加

'DATA_CACHE_TYPE' => 'Memcache',
'MEMCACHE_HOST'   => 'tcp://127.0.0.1:11211', 
'DATA_CACHE_TIME' => '3600',

 

（2017.9.1修改更）在TP中使用 查询缓存 cache（） 测试，也可直接使用S()函数，更多实现流程和操作方法可查看用户使用手册或者阅读TP源码：

$result = $this->where($where)->cache('key',120,'memcache')->find();
// $options['type'] = 'memcache';
// $data = S('key','',$options);
$data = S('key');

Thinkphp 的 Action调用Memcache方法

$class = new \Think\Cache\Driver\Memcache();  
$class->set('key','1234');  
$data = $class->get('key');  
echo $data;


## ThinkPHP中将session保存到memcache中
http://www.thinkphp.cn/code/361.html

 /* SESSION设置 */

// 'SESSION_PREFIX' => 'sess_',
//定义session为memcache
'SESSION_TYPE' => 'Memcache',
//Memcache服务器
'MEMCACHE_HOST' => '127.0.0.1',
//Memcache端口
'MEMCACHE_PORT' => 11211,
//Memcache的session信息有效时间
//'SESSION_EXPIRE' => 10,

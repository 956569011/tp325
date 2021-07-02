<?php
/**
 * Created by PhpStorm.
 * User: hunk
 * Date: 2016-03-02
 * Time: 17:33
 */
 
namespace Think\Session\Driver;
 
class Chenredis
{
    protected $lifeTime = 3600;
    protected $sessionName = '';
    protected $handle = null;
 
    /**
     * 开启连接
     * @param $savePath
     * @param $sessName
     * @return bool
     */
    public function open($savePath, $sessName)
    {

        $this->lifeTime = C('SESSION_EXPIRE') ? C('SESSION_EXPIRE') : $this->lifeTime;
        if (is_resource($this->handle)) {
            return true;
        }
        $host = C('REDIS_HOST') ?: '127.0.0.1';
        $port = C('REDIS_PORT') ?: '6379';
        $auth = C('REDIS_PASSWORD') ?: '';
        $timeout = C('SESSION_TIMEOUT') ?: 1;

        $redis = new \Redis();

        $redis->connect($host, $port, $timeout);
        $redis->auth($auth);
        if (!$redis) {
            return false;
        }
        $this->handle = $redis;
        return true;
    }
 
    /**
     * 关闭连接
     * @return bool
     */
    public function close()
    {
        $this->gc(ini_get('session.gc_maxlifetime'));
        $this->handle->close();
        $this->handle = null;
        return true;
    }
 
    /**
     * 读取session
     * @param $sessID
     * @return mixed
     */
    public function read($sessID)
    {
         $sessID = C('SESSION_PREFIX') . $sessID;
         $data = $this->handle->get($sessID);
         return $data ? $data : '';
    }
 
    /**
     * 写入session
     * @param $sessID
     * @param $sessData
     * @return mixed
     */
    public function write($sessID, $sessData)
    {
        $sessID = C('SESSION_PREFIX') . $sessID;
        return $this->handle->setex($sessID, $this->lifeTime, $sessData);
    }
 
    /**
     * 注销session
     * @param $sessID
     * @return bool
     */
    public function destroy($sessID)
    {
        $sessID = C('SESSION_PREFIX') . $sessID;
        return $this->handler->del($sessID)>=1?true:false;
    }
 
    /**
     * 垃圾回收
     * @param $sessMaxLifeTime
     * @return bool
     */
    public function gc($sessMaxLifeTime)
    {
        return true;
    }
 
 
}
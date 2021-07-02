<?php
namespace Shop\Controller;

use Think\Controller;
use Behavior\TokenBuildBehavior;
class IndexController extends Controller
{
    public function index()
    {
        // dump( C() );
        // session_start();//这儿开启中了,这个应用的配置文件里面就可以不加这个   'SESSION_AUTO_START'    =>  true,
        echo '设置session' . "<br />";
        // echo session_save_path() . '<br />';
        echo session_id() . '<br />';
        echo ini_get('session.save_handler').'<br />';
        echo ini_get('session.cookie_lifetime').'<br />';
        session('shop','商城2');
        // $this->show('shop显示','utf-8');
    }
    public function gdata(){
        dump($_SESSION);
        dump(session('shop'));
    }
    public function ddata(){
        echo '删除session';
        //执行这个会,执行destory回调方法,进行session记录的删除
        session_destroy();
    }

    public function gconfig($value='')
    {
        dump(C());
    }

    public function sdatam(){
        echo session_id() . '<br />';
        echo ini_get('session.save_handler');
        echo '设置session mem';
        session('shop','mdata');
    }
    public function gdatam(){
        echo ini_get('session.save_handler');
        echo '获得session mem';
        dump( session('shop') );
    }

    //总结:如果要加表单验令牌验证的时候，那么需要获取meta 上的值,当令牌不正确的时候需要手动更新meta上的值(通过从Reponse响应上拿到生成的新的令牌token数据)

    //这个是直接用的系统内置的写法,ajax写法需要在ajax返回数处手动请求一次token重新生成,回传给meta标签中
    //ajax无刷新更新token
    public function ajaxWuRefresh()
    {
        if(IS_POST){
            // dump(I('post.'));
            $user = I('post.name');
            $pass = I('post.pass');
            // $token = I('post.__hash__');
            // $data_token = array('__hash__'=>$token);
            $accessData = I('post.');
            // dump(M());exit;
            // $res = M()->autoCheckToken($accessData);
                        //  布尔值用于令牌验证 false 为关闭令牌认证
            $res = M()->token(true)->autoCheckToken($accessData);
            if(!$res){
                $this->error('非法提交,token不正确,可能是CSRF跨站请求伪造');
            }


            if($user == 'admin' && md5($pass) == md5('admin') ){
                $this->success('登录成功');
            }else{
                $this->error('登录失败');
            }
            
        }else{
            //展示。模板民你好你...你好你好在在//...在我工//...dd 
             $this->display();
        }
       
    }


    //这个是单独的ajax表单验证原理写在外层的写法
    public function ajaxWuRefresh2()
    {

        if(IS_POST){


    
            //这里验证ajax令牌逻辑
            $user = I('post.name');
            $pass = I('post.pass');
            $data = I('post.');

            $res = array(
                'state' => 0
            );
            list($key,$value)  =  explode('_',$data['__hash__']);
            //token
            if(!M()->autoCheckToken($data)){
                //令牌验证，这里验证无论通过不通过，系统都将销毁当前令牌，并根据当前页URL生成新的令牌
                $res['state'] = -1;
            }else{
                unset($data['__hash__']);
                if($user == 'admin' && md5($pass) == md5('admin') ){
                     $res['state'] = 1;
                }else{
                     $res['state'] = 0;
                }

            }
            // echo '<pre>';
            // print_r($_SESSION);exit;



            //由于需要通过header带上新的__hash__值，
            //所以这里需要先销毁当前页的url token ，再重新生成，才会调用getToken方法中的 header 设定
            $tokenKey =  md5($_SERVER['REQUEST_URI']);
            unset($_SESSION['__hash__'][$tokenKey]);
            $Token = (new \Behavior\TokenBuildBehavior())->getToken();
                 // $tokenduixiang=new TokenBuildBehavior();
                 // $token=$tokenduixiang->getToken();
            $this->ajaxReturn($res);

        }else{

            //关闭表单令牌了
             // C('TOKEN_ON',false);
       
             $this->display();
        }
       
    }
}
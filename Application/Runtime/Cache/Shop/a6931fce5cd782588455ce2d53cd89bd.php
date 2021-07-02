<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ajax无刷新</title>
	<script src="https://cdn.bootcdn.net/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
</head>
<body>

<h4>ajax2提交</h4>
<h6 id='a_token'></h6>
<form id='submit' method="post" action="<?php echo U('Index/ajaxWuRefresh','','');?>">
	用户名:<input type="text" name='name' ><br />
	密码:<input type="password" name='pass' ><br />
	{__TOKEN__}
	<input type="submit" value="提交">
</form>
<script>
	//https://blog.csdn.net/pengkai411429850/article/details/52227712
        $(function(){
        	$('#a_token').html($('meta[name="__hash__"]').attr('content'));
            $('#submit').submit(function(){
            	
                //token
                var token = $("meta[name='__hash__']").attr('content');
                //token = token+'abc';                
                $.ajax({
                    url : "<?php echo U('Index/ajaxWuRefresh','','');?>",
                    type : 'POST',
                    data : {'__hash__':token},
                    success : function(res){
                    	console.log(res);
                        // if(res.status === 0){
                        //     alert('系统已收到您留言信息，我们会尽快与您联系。');
                        //     return;
                        // }else if(res.status === -1){
                        //     alert('token 令牌出错');
                        //     return false;
                        // }else{
                        //     alert('发布留言失败');
                        //     location.reload();
                        // }
                    },
                    complete : function(request){
                        console.log(request.getResponseHeader('__hash__'));
                        $("meta[name='__hash__']").attr('content',request.getResponseHeader('__hash__'));


                        //chenyao 
                        $('#a_token').html($('meta[name="__hash__"]').attr('content'));
                    }
                });

                return false;
            });
        });
    </script>
</script>
</body>
</html>
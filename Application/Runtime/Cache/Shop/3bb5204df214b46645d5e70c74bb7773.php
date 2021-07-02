<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ajax无刷新</title>
	<script src="https://cdn.bootcdn.net/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
</head>
<body>

<!-- <h4>普通提交</h4>
<h6> 初始化token <br /> <span id="init_token"></span></h6>
<h6>这是一个隐藏域{__TOKEN__}</h6>
<form method="post" action="<?php echo U('Index/ajaxWuRefresh','','');?>">
	用户名:<input type="text" name='name' ><br />
	密码:<input type="password" name='pass' ><br />
	<input type="submit" value="提交">
</form> -->
<h4>ajax提交</h4>
<h6 id='a_token'></h6>
<form id='submit' method="post" action="<?php echo U('Index/ajaxWuRefresh','','');?>">
	用户名:<input type="text" name='name' ><br />
	密码:<input type="password" name='pass' ><br />
	{__TOKEN__}
	<input type="submit" value="提交">
</form>
<script>
	$(function (){

		var token = $('meta[name="__hash__"]').attr('content');
			$('#init_token').text(token);


		$('#submit').on('submit',function (){
			//可以直接从meta标签里面获取
			// var token = $("meta[name='__hash__']").attr('content');
			// var data = {'__hash__':token},



			// console.log($('#submit').serialize());
			$.post("<?php echo U('Index/ajaxWuRefresh','','');?>",$('#submit').serialize(),function (res,status,response){
				$('#a_token').text(res.token);
				console.log(res);
				// console.log(status);
				console.log(response);
				//当ajax开启令牌,令牌出错的时候 通过从header头中获取的这个值,把meta的token自己替换掉,
				console.log(response.getResponseHeader('__hash__'));
				// console.log(res);
			});
			return false;
		})
	});
</script>
</body>
</html>
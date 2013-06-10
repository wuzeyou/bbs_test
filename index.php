<?php
	include("conn.php");
// 	include("head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	<title>BBS_test</title>
	<link href="images/css.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="lib/jquery.min.js"></script>
    <script src="lib/jquery.validate.min.js" type="text/javascript"></script>

    <script type="text/javascript">

        $(function() {
            $("#myform").validate(

            //在上例中新增的部分
            {
            rules: {
                content: "required",  //密码1必填
            },
            messages: {  //对应上面的错误信息
                content: "来了树洞总要说些什么吧~",
            },

            errorPlacement: function(error, element) { //指定错误信息位置
                if (element.is(':radio') || element.is(':checkbox')) {  //如果是radio或checkbox
                    var eid = element.attr('name');  //获取元素的name属性
                    error.appendTo(element.parent());    //将错误信息添加当前元素的父结点后面
                } else {
                    error.insertAfter(element);
                }
            },

            debug: false,  //如果修改为true则表单不会提交
//            submitHandler: function() {
//               alert("开始提交了");
//            }
        });
    });
    </script>

</head>

<b><a href="index.php">添加留言</a> | <a href="list.php">浏览留言</a></b>
<hr size=1>

<body>
	<div id="addPostContainer" >
	<form action="insert.php" method="post" name="myform" id="myform">
		<div align="left">
			<label for="content">你要说<br></label>
  			<textarea name="content"  cols="60" rows="9"></textarea><br>
  			<label for="user">你的名字(选填)</label><br>
			<input type="text" size="10" name="user"><br>
			<label for="title">留言主题(选填)</label><br>
			<input type="text" name="title" ><br>
 			<input type="submit" id="submit" name="submit" value="提交留言"/>
 		</div>
	</form>
	</div>
</body>
</html>
<?php
	include("conn.php");
 	include("head.php");
?>

<form action="insert.php" method="post" name="myform" onsubmit="return CheckPost();">
	你的名字：<input type=text size="10" name="user" ><br>
	留言标题：<input type=text name="title" ><br>
  	留言内容：<textarea name="content"  cols="60" rows="9"></textarea><br>

 	<input type=submit name="submit" value="提交留言"/>
</form>

<SCRIPT language=javascript>   //check username & content, Javascript
function CheckPost()
{
	if (myform.user.value=="")
	{
		alert("请输入用户名");
		myform.user.focus();
		return false;
	}

	if (myform.content.value=="")
	{
		alert("内容不能为空");
		myform.content.focus();
		return false;
	}
}
</SCRIPT>

<?php
	include("conn.php");
 	include("head.php");
?>

<body>
	<div id="addPostContainer" >
	<form action="insert.php" method="post" name="myform" id="myform" onsubmit="return CheckPost();">
		<div align="left">
			<span>
			<label for="content">你要说<br></label>
			<textarea name="content"  cols="60" rows="9"></textarea><br>
	  		<label id="nocontent" /><br>
			</span>
  			<label for="user">你的名字(选填)</label><br>
			<input type="text" size="10" name="user"><br>
			<label for="title">留言主题(选填)</label><br>
			<input type="text" name="title" ><br>
 			<input type="submit" id="submit" name="submit" value="提交留言"/>
 		</div>
	</form>
	</div>
</body>

<SCRIPT language=javascript>   //check username & content, Javascript
function CheckPost()
{
	if (myform.content.value=="")
	{
		document.getElementById("nocontent").innerHTML="内容不能为空<br>"
		myform.content.focus();
		return false;
	}
}
</SCRIPT>
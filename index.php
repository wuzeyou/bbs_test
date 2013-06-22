<?php
	include("conn.php");
 	include("head.php");
?>

<body>
	<!-- 导航栏 --> 
	<div class="navbar">
  		<div class="navbar-inner">
    		<a class="brand" href="list.php">昨天说 Yes!Today.Talk</a>
    		<ul class="nav">
      		<li class="active"><a href="index.php">添加留言</a></li>
      		<li><a href="list.php">浏览留言</a></li>
      		<li><a href="about.html">关于</a></li>
    		</ul>
  		</div>
	</div>
	<div align="center">
	<div id="addPostContainer" >
	<form action="insert.php" method="post" name="myform" id="myform" onsubmit="return CheckPost();">
		<div align="left">
			<span>
			<label for="content">你要说<br></label>
			<textarea name="content"  cols="100" rows="9"></textarea><br>
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
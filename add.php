<?php
  include("conn.php");
 	include("head.php");
?>

<SCRIPT language=javascript>   //check username & content, Javascript
function CheckPost()
{
	if (myform.user.value=="")
	{
		alert("Please input user name");
		myform.user.focus();
		return false;
	}

	if (myform.content.value=="")
	{
		alert("Content can't be empty");
		myform.content.focus();
		return false;
	}
}
</SCRIPT>

<form action="add.php" method="post" name="myform" onsubmit="return CheckPost();">
	User:<input type="text" size="10" name="user" /><br>
	Title:<input type="text" name="title" /><br/>
  	Content:<textarea name="content"  cols="60" rows="9"></textarea><br/>

 	<input type="submit" name="submit" value="Submit"/>

</form>

<?php

 if (isset($_post['submit'])){
	$submit = $_POST['submit'];
	if (isset($_post['user'])){
		$user = $_POST['user'];
	}
	if (isset($_post['title'])){
		$title = $_POST['title'];
	}
	if (isset($_post['content'])){
		$content = $_POST['content'];
	}

	$sql="insert into message (id,user,title,content,lastdate) " .
  		"values ('','$user','$title','$content',now())";
  	$result = mysql_query($sql);

  	if ($result) {
		echo "<script language=\"javascript\">alert('Add post successfully');history.go(-1)</script>";}
	else {
		echo "<script language=\"javascript\">alert('Failed to post');history.go(-1)</script>";
	}
 }

?>

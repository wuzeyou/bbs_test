<?php
	include("conn.php");

		$submit = $_POST['submit'];
		$user = $_POST['user'];
		$title = $_POST['title'];
		$content = $_POST['content'];

 		$sql = "INSERT INTO message (id,user,title,content,lastdate) VALUES (NULL, '$user', '$title', '$content', now())";
  		$result = mysql_query($sql);

  		if ($result) {
			echo "<script language=\"javascript\">location.href='list.php'; </script>";}
		else {
			echo "<script language=\"javascript\">alert('Failed to post');history.go(-1)</script>";
		}
?>
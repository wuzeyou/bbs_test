<?php

include "conn.php";

$submit = $_POST['submit'];
$name = $_POST['name'];
$body = $_POST['body'];
$postid = $_POST['postid'];

$query = "INSERT INTO comments (id, name, body, dt, postid) VALUES (NULL, '$name', '$body', now(), '$postid')";
$result = mysql_query($query);

if ($result) {
	echo "<script language=\"javascript\">location.href='post.php?postid=$postid'; </script>";}
else {
	echo "<script language=\"javascript\">alert('Failed to post');history.go(-1)</script>";
}

?>
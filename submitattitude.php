<?php
	include("conn.php");

		$attitude = $_POST['attitude'];
		$like = $_POST['like'];
		$bless = $_POST['bless'];
		$shit = $_POST['shit'];
		$post_id = $_POST['postid'];
		$page = $_POST['page'];
?>

<?php

		if ($like) {
			$sql_like = "UPDATE message SET like_num=like_num+1 WHERE id=$post_id";
			$result_like = mysql_query($sql_like);
		}
		if ($bless) {
			$sql_bless = "UPDATE message SET bless_num=bless_num+1 WHERE id=$post_id";
			$result_bless = mysql_query($sql_bless);
		}
		if ($shit) {
			$sql_shit = "UPDATE message SET shit_num=shit_num+1 WHERE id=$post_id";
			$result_shit = mysql_query($sql_shit);
		}
		if ($page) {
		echo "<script language=\"javascript\">location.href='list.php?page=".$page."'</script>";
		}
?>

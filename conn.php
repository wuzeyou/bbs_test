<?php

@ $conn =  mysql_connect("localhost", "root", "") or die("can't connect database"); //修改为你主机的数据库密码
mysql_select_db("bbs", $conn); //数据库名称
mysql_query("set names 'UTF8'"); //使用UTF8编码;

function htmtocode($content) {
  $content = str_replace("\n", "<br>", str_replace(" ", "&nbsp;", $content));
	return $content;
}

?>

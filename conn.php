<?php

$conn = @ mysql_connect("localhost", "root", "") or die("can't connect database"); //可修改为你主机的数据库密码
mysql_select_db("bbs", $conn); //数据库名称
mysql_query("set names 'GBK'"); //使用GBK中文编码;

function htmtocode($content) {
  $content = str_replace("\n", "<br>", str_replace(" ", "&nbsp;", $content));
	return $content;
}

?>

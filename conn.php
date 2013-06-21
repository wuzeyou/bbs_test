<?php

@ $conn =  mysql_connect("localhost", "root", "") or die("can't connect database"); //修改为你主机的数据库密码
mysql_select_db("bbs", $conn); //数据库名称
mysql_query("set names 'UTF8'"); //使用UTF8编码;

//保留输入字符串中的空格和回车的原有格式，在index.php中被使用。
function htmtocode($content) {
  $content = str_replace("\n", "<br>", str_replace(" ", "&nbsp;", $content));
	return $content;
}

?>

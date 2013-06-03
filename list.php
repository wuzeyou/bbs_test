<?php

 include("conn.php");

 include("head.php");
  $SQL="SELECT * FROM `message` order by id desc";
  $query=mysql_query($SQL);
  while($row=mysql_fetch_array($query)){  //依次列出所有留言
?>

<table width=500 border="0" cellpadding="5" cellspacing="1" bgcolor="#add3ef">
  <tr bgcolor="#eff3ff">
  <td>Title:<?=$row['title']?> User:<?=$row['user']?></td>
  </tr>
  <tr bgColor="#ffffff">
  <td>Content:<?=htmtocode($row['content'])?></td>
  </tr>
</table>
<?php
  }
?>

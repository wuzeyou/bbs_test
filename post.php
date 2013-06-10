<?php
include "conn.php";
include "comment.class.php";
date_default_timezone_set('PRC');

if (isset($_GET['postid'])){
    $post_id = intval($_GET['postid']);
}
//读出当前post
$query_post = mysql_query("SELECT * from message where id=$post_id", $conn);
$post = mysql_fetch_array($query_post);
//读出当前post下的评论
$query_comment = mysql_query("SELECT * FROM comments WHERE postid = $post_id ORDER BY id ASC", $conn);
//$comments = mysql_fetch_array($query_comment);

include "head.php"
?>

<body>
<div id="main" align="center">

<div class="post">
<!-- <table> -->
<table width = 500 border = "0" cellpadding = "5" cellspacing = "1" bgcolor = "#add3ef">
<!--    <tr> -->
    <tr bgcolor = "#eff3ff">
        <td>题目:<?=$post['title']?> User:<?=$post['user']?></td>
    </tr>
<!--    <tr> -->
    <tr bgColor = "#ffffff">
        <td>Content:<?=htmtocode($post['content'])?></td>
    </tr>
</table>
</div>

<?php
$comment_num = 1;//评论编号
while ($comments = mysql_fetch_array($query_comment)) {

?>

<div class="comment">
<?php
    if ($comments['name']) {
?>
    <div class="name"><?=$comments['name']?></div>
<?php
} else{
?>
    <div class="name">路人说</div>
<?
}
?>
    <div class="datetime"><?=$comments['dt']?></div>
    <p align="left"><?=$comments['body']?></p>
    <div class="num">#<?=$comment_num?></div>
</div>

<?php
$comment_num++;
}
?>

<div id="addCommentContainer">
	<form id="addCommentForm" name="addComment" method="post" action="submit.php">
    	<div align="left">

            
            <label for="body">你的回应</label>
            <textarea name="body" id="body" cols="20" rows="5"></textarea>
            <!--传递postid，隐藏变量-->
            <input type="hidden" name="postid" value="<?=$post_id?>" />
            <label for="name">昵称(选填)</label>
            <input type="text" name="name" id="name" />
            <input type="submit" id="submit" name="submit" value="加上去" />
        </div>
    </form>
</div>

</div>
</body>



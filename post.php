<?php
include "conn.php";
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
<!--显示标题-->
<?php
    if ($post['title']) {
?>
    <div class="title" align="right"><?=$post['title']?></div>
<?php
} else{
?>
    <div class="title" align="right">无题</div>
<?php
}
//--显示用户名-->  
    if ($post['user']) {
?>
    <div class="username" align="right"><?=$post['user']?></div>
<?php
} else{
?>
    <div class="username" align="right">匿名人士</div>
<?
}
?> 
    <p align="left"><?=$post['content']?></p>
    <div class="datetime" align="left"><?=$post['lastdate']?></div>
</div>

<?php
//依序显示所有评论
$comment_num = 1;//评论编号
while ($comments = mysql_fetch_array($query_comment)) {
?>

<div class="comment">
<?php
    if ($comments['name']) {
?>
    <div class="name"><?=$comments['name']?><i >说</i></div>
    
<?php
} else{
?>
    <div class="name">路人<i>说</i></div>
    
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
	<form id="addCommentForm" name="addCommentForm" method="post" action="submit.php" onsubmit="return CheckComment();">
    	<div align="left">
            <span>
            <label for="body">你的回应</label>
            <textarea name="body" id="body" cols="20" rows="5"></textarea>
            <label id="nocomment" /><br>
            </span>
            <!--传递postid，隐藏变量-->
            <input type="hidden" name="postid" value="<?=$post_id?>" />
            <label for="name">昵称(选填)<br></label>
            <input type="text" name="name" id="name" /><br>
            <input type="submit" id="submit" name="submit" value="加上去" />
        </div>
    </form>
</div>

</div>
</body>

<SCRIPT language=javascript>   //check username & content, Javascript
function CheckComment()
{
    if (addCommentForm.body.value=="")
    {
        document.getElementById("nocomment").innerHTML="内容不能为空<br>"
        addCommentForm.body.focus();
        return false;
    }
}
</SCRIPT>

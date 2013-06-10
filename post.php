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

//include "head.php"
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <title>BBS_test</title>
    <link href="images/css.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="lib/jquery.min.js"></script>
    <script src="lib/jquery.validate.min.js" type="text/javascript"></script>

    <script type="text/javascript">

        $(function() {
            $("#addCommentForm").validate(

            //在上例中新增的部分
            {
            rules: {
                body: "required",  //密码1必填
            },
            messages: {  //对应上面的错误信息
                body: "回应内容总要写吧~<br>",
            },

            errorPlacement: function(error, element) { //指定错误信息位置
                if (element.is(':radio') || element.is(':checkbox')) {  //如果是radio或checkbox
                    var eid = element.attr('name');  //获取元素的name属性
                    error.appendTo(element.parent());    //将错误信息添加当前元素的父结点后面
                } else {
                    error.insertAfter(element);
                }
            },

            debug: false,  //如果修改为true则表单不会提交
//            submitHandler: function() {
//               alert("开始提交了");
//            }
        });
    });
    </script>

</head>

<b><a href="index.php">添加留言</a> | <a href="list.php">浏览留言</a></b>
<hr size=1>


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
            <label for="name">昵称(选填)<br></label>
            <input type="text" name="name" id="name" /><br>
            <input type="submit" id="submit" name="submit" value="加上去" />
        </div>
    </form>
</div>

</div>
</body>



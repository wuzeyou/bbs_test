<?php
    include("conn.php");
    include("head.php");
    //设定每一页显示的记录数
    $pagesize=5;

    //取得记录总数$rs，计算总页数用
    $rs = mysql_query("select count(*) from message",$conn);
    $row = mysql_fetch_array($rs);
    $numrows=$row[0];

    //计算总页数
    $pages = intval($numrows/$pagesize);
    if ($numrows%$pagesize)
        $pages++;
    //设置页数
    if (isset($_GET['page'])){
        $page = intval($_GET['page']);
    }
    else{
    //设置为第一页
    $page = 1;
    }
    //计算记录偏移量
    $offset = $pagesize*($page - 1);
    //读取指定记录数
    $query = mysql_query("select * from message order by id desc limit $offset,$pagesize",$conn);
    
    $post_num=0; //本页留言编号
    
    while ($myrow = mysql_fetch_array($query))
    {
?>

<div class="post">
<!-- <table> -->
<table width = 500 border = "0" cellpadding = "5" cellspacing = "1" bgcolor = "#add3ef">
<!--    <tr> -->
    <tr bgcolor = "#eff3ff">
        <td>题目:<?=$myrow['title']?> User:<?=$myrow['user']?></td>
    </tr>
<!--    <tr> -->
    <tr bgColor = "#ffffff">
        <td>Content:<?=htmtocode($myrow['content'])?></td>
    </tr>
</table>
<a href="post.php?postid=<?=$myrow['id']?>">评论</a>
</div>
<br>

<?php
    $post_num++;
    }
    $first = 1;
    $prev = $page-1;
    $next = $page+1;
    $last = $pages;
    if ($page == 1){
        echo "首页 上一页 ";
    }
    if ($page > 1){
        echo "<a href='list.php?page=".$first."'>首页</a> ";
        echo "<a href='list.php?page=".$prev."'>上一页</a> ";
    }
//    echo "<div align='center'>共有".$pages."页(".$page."/".$pages.")";
    echo "[".$page."/"."$pages"."] ";
    if ($page < $pages){
        echo "<a href='list.php?page=".$next."'>下一页</a> ";
        echo "<a href='list.php?page=".$last."'>尾页</a>";
    }
    if ($page == $pages){
        echo "下一页 尾页";
    }
?>

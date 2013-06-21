<?php
    include("conn.php");
    include("head.php");
    //设定每一页显示的记录数
    $pagesize=10;

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
?>
<!-- 导航栏 --> 
<div class="navbar">
  <div class="navbar-inner">
    <a class="brand" href="list.php">昨天说 Yes!Today.Talk</a>
    <ul class="nav">
      <li><a href="index.php">添加留言</a></li>
      <li class="active"><a href="list.php">浏览留言</a></li>
      <li><a href="#">关于</a></li>
    </ul>
  </div>
</div>

<div id="bigbox">
<div id="liebiao">
<ul id="flowbox">
<?php    
    while ($myrow = mysql_fetch_array($query))
    {
        // 取得该条post的评论总数,$num_comment为最终取得的数字
        $post_id = $myrow['id'];
        $comms = mysql_query("SELECT count(*) FROM comments WHERE postid = $post_id", $conn);
        $ncomm = mysql_fetch_array($comms);
        $num_comment = $ncomm[0];
        // 取得 Attitudes' number
        $attis = mysql_query("SELECT like_num,bless_num,shit_num FROM message WHERE id=$post_id", $conn);
        $natti = mysql_fetch_array($attis);
        $num_like = $natti['like_num'];
        $num_bless = $natti['bless_num'];
        $num_shit = $natti['shit_num'];
?>

<li>
<!-- <table> -->
<table class="listpost" border = "0" cellpadding = "5" cellspacing = "1">
<!--    <tr> -->
<?php
    if ($myrow['title']) {
//--显示标题-->
?>
    <tr class="title">
        <td><?=$myrow['title']?></td>
    </tr>
<?php
} else{
?>
    <tr class="title">
        <td>无题</td>
    </tr>
<?php
}
//--显示用户名-->  
    if ($myrow['user']) {
?>
    <tr class="author">
        <td><?=$myrow['user']?></td>
    </tr>
<?php
} else{
?>
    <tr class="author">
        <td>匿名人士</td>
    </tr>
<?php
}
?> 
    <tr class = "content">
        <td><?=htmtocode($myrow['content'])?></td>
    </tr>
    <tr><td><br></td></tr>
    <tr id = "comm">
        <td><a href="post.php?postid=<?=$post_id?>">评论(<?=$num_comment?>)</a></td>
    </tr>
    <tr id="atti">
        <td>
            <form action="submitattitude.php" method="post" name="myattitude" id="myattitude">
                <lable for="like"><img src="images/hearta_thumb.gif">(<?=$num_like?>)</label>
                <input type="checkbox" name="like">
                <lable for="bless"><img src="images/lazu_thumb.gif">(<?=$num_bless?>)</label>
                <input type="checkbox" name="bless">
                <lable for="shit"><img src="images/kbsa_thumb.gif">(<?=$num_shit?>)</label>
                <input type="checkbox" name="shit">
                <input type="hidden" name="postid" value="<?=$post_id?>" />
                <input type="hidden" name="page" value="<?=$page?>" />
                <input type="submit" id="submit" name="attitude" value="表态"/>
            </form>
        </td>
    </tr>
</table>
</li>




<?php
    //以下部分为实现翻页条功能
    $post_num++;
    }
    $first = 1;
    $prev = $page-1;
    $next = $page+1;
    $last = $pages;
?>
</ul>
</div>

<div id="bm">
<?php
    if ($page == 1){
        echo "首页 上一页 ";
    }
    if ($page > 1){
        echo "<a href='list.php?page=".$first."'>首页</a> ";
        echo "<a href='list.php?page=".$prev."'>上一页</a> ";
    }
    echo "[".$page."/"."$pages"."] ";
    if ($page < $pages){
        echo "<a href='list.php?page=".$next."'>下一页</a> ";
        echo "<a href='list.php?page=".$last."'>尾页</a>";
    }
    if ($page == $pages){
        echo "下一页 尾页";
    }
?>
</div>
</div>

<!-- 实现瀑布流的js部分 -->
<script type="text/javascript">
     
     function flow(mh, mv) {//参数mh和mv是定义数据块之间的间距，mh是水平距离，mv是垂直距离 
       var w = document.documentElement.offsetWidth;//计算页面宽度 
//       alert(w);
       var ul = document.getElementById("flowbox"); 
       var li = ul.getElementsByTagName("li"); 
       var page=document.getElementById("bm");
       var ww=bm.offsetWidth;
       
        var iw = 300  + mh;//计算数据块的宽度 
        var c = Math.floor(w / iw);//计算列数 
            
        ul.style.width = iw * c - mh + "px";//设置ul的宽度至适合便可以利用css定义的margin把所有内容居中 
        var liLen = li.length;
        var lenArr = [];
        for (var i = 0; i < liLen; i++) {//遍历每一个数据块将高度记入数组
            lenArr.push(li[i].offsetHeight);
            
         }
     var oArr = [];
     for (var i = 0; i < c; i++) {//把第一行排放好，并将每一列的高度记入数据oArr
        
         li[i].style.top = "40px";
        li[i].style.left = iw * i + mv + "px";
        
        oArr.push(lenArr[i]);
        var h=_getMaxValue(oArr);
            //alert(h);
            page.style.top=h+100;
            //alert(page.style.top);
            page.style.left=w/2-ww/2;
        
        
     }
      for (var i = c; i < liLen; i++) {//将其他数据块定位到最短的一列后面，然后再更新该列的高度          
        var x = _getMinKey(oArr);//获取最短的一列的索引值
        li[i].style.top = oArr[x] + mv + 40+"px";
        
        li[i].style.left = iw * x +mv+ "px";
        oArr[x] = lenArr[i] + oArr[x] + mv;//更新该列的高度
        
    
    }
    
            var h=_getMaxValue(oArr);
            page.style.top=h+100;
            page.style.left=w/2-ww/2;
      


}
      flow(10,10);
      var re;
               window.onresize = function() {
                //flow(10,10);
                    clearTimeout(re);
                    re = setTimeout(function() {flow(10, 10);}, 100);
               }

    function _getMaxValue(arr) {
                 var a = arr[0];
                 for (var k in arr) {
                     if (arr[k] > a) {
                         a = arr[k];
                     }
                 }
                 return a;
             }
     function _getMinKey(arr) {
                  var a = arr[0];
                  var b = 0;
                  for (var k in arr) {
                      if (arr[k] < a) {
                          a = arr[k];
                          b = k;
                      }
                 }
                  return b;
              }

</script>

</body>
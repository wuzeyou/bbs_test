<?php

include("conn.php");

  if(isset($_GET['out'])){
    setcookie("cookie", "out");
    echo "<script language=\"javascript\">location.href='login.php';</script>";
  }

  if(isset($_POST['id'])){
    $id = $_POST['id'];
    if($id == 'admin'){
      $pw=md5($_POST['pw']);
      if($pw=='e1bfd762321e409cee4ac0b6e841963c'){
      setcookie("cookie", "ok");
        echo "<script language=\"javascript\">location.href='login.php';</script>";
      }
    }
  }

include("head.php");
if($_COOKIE['cookie']!='ok'){
?>

<SCRIPT language=javascript>
function Checklogin()
{
  if (myform.id.value=="")
  {
    alert("Please input username");
    myform.id.focus();
    return false;
  }
    if (myform.pw.value=="")
  {
    alert("Password can't be empty");
    myform.pw.focus();
    return false;
  }
}
</SCRIPT>

<form action="" method="post" name="myform" onsubmit="return Checklogin();">
  ID:<input type="text" name="id" /><br>
  PW:<input type="password" name="pw" /> <input type="submit" name="submit" value="Login"/>
  </form>
<?php
}else{
?>
  <a href='?out=login'>Logout</a>
<?php
}
?>

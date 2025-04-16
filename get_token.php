<?php
include("include/protect.php");
include("include/dbconnect.php");
$rdate="";
$rtime="";
$num="";
extract($_REQUEST);
$account=$_SESSION['uname'];
 $q1=mysqli_query($connect, "select * from register where account='$account'");
			$r1=mysqli_fetch_array($q1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php include("include/title.php"); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>

<!-- CuFon ends -->
</head>
<body>
<div class="main">

  <div class="header">
    <div class="header_resize">
      <div class="logo">
	  <?php include("include/header.php"); ?>
	  </div>
      <div class="menu_nav">
        <ul>
			<li class="active"><a href="userhome.php">Home</a></li>
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>

  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="clr"></div>
        <form id="form1" name="form1" method="post" action="">
          <h2>Get Token </h2>
          <table width="294" border="0" class="bg1">
            <tr>
              <th align="left" scope="col">Date </th>
              <th align="left" scope="col"><input type="text" name="rdate" placeholder="DD-MM-YYYY" value="<?php echo $rdate; ?>" /></th>
            </tr>
			 <tr>
              <th align="left" scope="col">Time </th>
              <th align="left" scope="col"><input type="text" name="rtime" placeholder="11:00 AM" value="<?php echo $rtime; ?>" /></th>
            </tr>
            <tr>
              <th align="left" scope="row">&nbsp;</th>
              <td align="left"><input type="submit" name="btn" value="Submit" /></td>
            </tr>
          </table>
		  <?php
		  if(isset($btn))
		  {
		  $q2=mysqli_query($connect, "select * from token where rdate='$rdate' && status<=1");
			$num=mysqli_num_rows($q2);
		  ?>
          <h3 align="left">Total tokens are <?php echo $num; ?></h3>
		  <input type="submit" name="btn2" value="Book Token" />
		  <?php
		  }
		  
		  if(isset($btn2))
		  {
		  $mq = mysqli_query($connect, "select max(id) as maxid from token");
			$mr = mysqli_fetch_array($mq);
			$id = $mr['maxid']+1;
			
			$mq1 = mysqli_query($connect, "select max(tid) as maxid from token where rdate='$rdate'");
			$mr1 = mysqli_fetch_array($mq1);
			$tid = $mr['maxid']+1;
			mysqli_query($connect, "insert into token(id,tid,account,rdate,rtime,status) values($id,$tid,'$account','$rdate','$rtime','0')");
			?>
			<script language="javascript">
			alert("Booked Successfully");
			window.location.href="view_token.php";
			</script>
			<?php
		  }
		  ?>
          <p align="left">&nbsp;</p>
          <p>&nbsp;</p>
        </form>
        <p>&nbsp;        </p>
        <div class="clr"></div>
      </div>
      <div class="sidebar">
        <div class="gadget">
          <h2 class="star">Menu</h2>
          <ul class="sb_menu">
            <li><a href="userhome.php">Home</a></li>
			<li><a href="get_token.php">Get token</a></li>
			<li><a href="view_token.php">View token</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
        
      </div>
      <div class="clr"></div>
    </div>
  </div>

  <div class="fbg">
    <div class="fbg_resize">
      <div class="clr"></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <!--<ul class="fmenu">
        <li class="active"><a href="index.html">Home</a></li>
        <li><a href="contact.html">Contacts</a></li>
      </ul>-->
      <?php include("include/footer.php"); ?>
      <div class="clr"></div>
    </div>
  </div>
</div>
</body>
</html>
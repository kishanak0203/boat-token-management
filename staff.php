<?php
include("include/protect.php");
include("include/dbconnect.php");
$btn1="";
extract($_REQUEST);
$uname=$_SESSION['uname'];
$rdate=date("d-m-Y");
$q1=mysqli_query($connect, "select * from token where status=1 limit 0,1");
$n1=mysqli_num_rows($q1);


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
			<li class="active"><a href="staff.php">Home</a></li>
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
          <h2>Staff: <?php echo $uname; ?>, Date: <?php echo $rdate; ?></h2>
          <h3 align="center">Counter: <?php
		  if($uname=="staff1")
		  {
		  echo "1";
		  }
		  else if($uname=="staff2")
		  {
		  echo "2";
		  }
		  else
		  {
		  echo "3";
		  }
		  ?></h3>
		  
		  <?php
		  if($n1>0)
		  {
		  $r1=mysqli_fetch_array($q1);
$uid=$r1['id'];
		  ?>
          <div align="center">
            <p>Process for Token No.:<?php echo $r1['tid']; ?></p>
			<?php
			
			?>
            <p>
              <input type="submit" name="btn1" value="Start Process" />
            </p>
			<?php
			
			}
			else
			{
			echo "No Customer";
			}
			if($btn1)
			{
			mysqli_query($connect, "update token set status=2,staff='$uname' where id=$uid");
			?>
			<script language="javascript">
			window.location.href="staff2.php?uid=<?php echo $uid; ?>";
			</script>
			<?php
			}
			?>
            
          </div>
         
          <p align="center">&nbsp;</p>
          <p>&nbsp;</p>
        </form>
        <p>&nbsp;        </p>
        <div class="clr"></div>
      </div>
      <div class="sidebar">
        <div class="gadget">
          <h2 class="star">Menu</h2>
          <ul class="sb_menu">
            <li><a href="staff.php">Home</a></li>
			<li><a href="process.php">Process</a></li>
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
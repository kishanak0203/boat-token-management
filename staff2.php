<?php
include("include/protect.php");
include("include/dbconnect.php");
$btn2="";
extract($_REQUEST);
$uname=$_SESSION['uname'];
$rdate=date("d-m-Y");
$q1=mysqli_query($connect, "select * from token where status=2 && id=$uid");
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
          <div align="center">
            <p>Process for Token No.:<?php echo $r1['tid']; ?></p>
			<?php
			
			?>
            <p>Token Proccess </p>
            <p>
              <textarea name="bprocess"></textarea>
            </p>
            <p>
              <input type="submit" name="btn2" value="Complete Process" />
            </p>
			<?php
			if($btn2)
			{
			mysqli_query($connect, "update token set status=3,bprocess='$bprocess' where id=$uid");
			
			
			$q2=mysqli_query($connect, "select * from token where id>$uid && status=0 limit 2,1");
			$n2=mysqli_num_rows($q2);
			if($n2>0)
			{
			$uid22=$uid+1;
			mysql_query("update token set status=1 where status=0 && id=$uid22");
			
			
				$r2=mysqli_fetch_array($q2);
				$uid2=$r2['id'];
				mysqli_query($connect, "update token set status=1 where id=$uid2");
				$q11=mysqli_query($connect, "select * from register where id=$uid2");
					$r11=mysqli_fetch_array($q11);
					$mobile=$r11['contact'];
					$na=$r11['name'];
					echo $message="Dear $na, you have ready to come to Bank counter";
					echo '<iframe src="http://pay4sms.in/sendsms/?token= b81edee36bcef4ddbaa6ef535f8db03e&credit=2&sender= RandDC&message='.$message.'&number=91'.$mobile.'" style="display:block"></iframe>';
					echo '<script>
					alert("Process Completed..");
					//Using setTimeout to execute a function after 5 seconds.
					setTimeout(function () {
					   //Redirect with JavaScript
					   window.location.href= "staff.php";
					}, 3000);
					</script>';
			
			
			
			}
			else
			{
				
				$q21=mysqli_query($connect, "select * from token where id>$uid && status=0 limit 0,1");
				$n21=mysqli_num_rows($q21);
				if($n21>0)
				{
				$r21=mysqli_fetch_array($q21);
				$uid2=$r21['id'];
				mysqli_query($connect, "update token set status=1 where id=$uid2");
				$q11=mysqli_query($connect, "select * from register where id=$uid2");
					$r11=mysqli_fetch_array($q11);
					$mobile=$r11['contact'];
					$na=$r11['name'];
					echo $message="Dear $na, you have ready to come to Bank counter";
					echo '<iframe src="http://pay4sms.in/sendsms/?token= b81edee36bcef4ddbaa6ef535f8db03e&credit=2&sender= RandDC&message='.$message.'&number=91'.$mobile.'" style="display:block"></iframe>';
					echo '<script>
					alert("Process Completed..");
					//Using setTimeout to execute a function after 5 seconds.
					setTimeout(function () {
					   //Redirect with JavaScript
					   window.location.href= "staff.php";
					}, 3000);
					</script>';
				
				}
				else
				{
				?>
				<script language="javascript">
				window.location.href="staff.php";
				</script>
				<?php
				}
			}
					
					
			}
			?>
            
          </div>
          <p align="center">&nbsp;</p>
		  <?php
		  if(isset($btn))
			{
			mysql_query("update token set status=3 where id=$uid");
			}
		?>	
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
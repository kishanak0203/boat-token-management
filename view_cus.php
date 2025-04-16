<?php
include("include/protect.php");
include("include/dbconnect.php");
extract($_POST);
$uname=$_SESSION['uname'];
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
			<li><a href="">Home</a></li>
			<li class="active"><a href="view_cus.php">Customer</a></li>
			<li><a href="deposit.php">Deposit</a></li>
			<li><a href="process.php">process</a></li>
			<li><a href="logout.php">Logout</a></li>
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
          <h2>Welcome <?php echo $uname; ?></h2>
          <p align="center">&nbsp;</p>
		  <h3 align="center">Customers</h3>
          <table width="570" border="1" align="center" cellpadding="5" cellspacing="0">
            <tr>
              <th width="59" scope="col">Sno</th>
              <th width="128" scope="col">Boat Owner Name. </th>
              <th width="141" scope="col">Driver Name</th>
              <th width="141" scope="col">Boat Number</th>
              <th width="94" scope="col">Mobile No. </th>
              <th width="141" scope="col">Place</th>
              <th width="94" scope="col">Date</th>
            </tr>
			<?php
			$i=0;
			$qs=mysqli_query($connect, "select * from register");
			while($rs=mysqli_fetch_array($qs))
			{
			$i++;
			?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $rs['name']; ?></td>
              <td><?php echo $rs['driver_name']; ?></td>
              <td><?php echo $rs['boat_number']; ?></td>
              <td><?php echo $rs['contact']; ?></td>
              <td><?php echo $rs['address']; ?></td>
              <td><?php echo $rs['rdate']; ?></td>
            </tr>
			<?php
			}
			?>
          </table>
		  
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
            <li class="active"><a href="admin.php">Home</a></li>
			<li><a href="view_cus.php">Customer</a></li>
			<li><a href="deposit.php">Deposit</a></li>
			<li><a href="process.php">process</a></li>
			<li><a href="token.php">Token Details</a></li>
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
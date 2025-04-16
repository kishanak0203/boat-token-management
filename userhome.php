<?php
include("include/protect.php");
include("include/dbconnect.php");
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
          <h2>Welcome to Boat Business </h2>
          <p align="center">&nbsp;</p>
		  
          <table width="524" border="1" align="center">
            <tr>
              <th width="140" align="left" scope="row">Owner Name</th>
              <td width="131" align="left"><?php echo $r1['name']; ?></td>
              <th width="114" align="left">Driver Name. </th>
              <td width="111" align="left"><?php echo $r1['driver_name']; ?></td>
            </tr>
            <tr>
              <th align="left" scope="row">Contact No. </th>
              <td align="left"><?php echo $r1['contact']; ?></td>
              <th align="left">Place</th>
              <td align="left"><?php echo $r1['address']; ?></td>
            </tr>
            <tr>
              <th align="left" scope="row">Email</th>
              <td align="left"><?php echo $r1['email']; ?></td>
              <th align="left">Created Date </th>
              <td align="left"><?php echo $r1['rdate']; ?></td>
            </tr>
            <tr>
              <th align="left" scope="row">Balance Amount </th>
              <td colspan="3" align="left">Rs. <?php echo $r1['deposit']; ?></td>
            </tr>
          </table>
          <h3 align="center">&nbsp;</h3>
          <h3 align="center">Transactions</h3>
          <table width="472" border="1" align="center" cellpadding="5" cellspacing="0">
            <tr>
              <th width="59" scope="col">Sno</th>
              <th width="128" scope="col">Event</th>
              <th width="141" scope="col">Amount</th>
              <th width="94" scope="col">Date</th>
            </tr>
			<?php
			$i=0;
			$qs=mysqli_query($connect, "select * from event where account='$account'");
			while($rs=mysqli_fetch_array($qs))
			{
			$i++;
			?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php
			 
			  if($rs['event']=="Transfer")
			  {
			  echo "<br>Transfer to:".$rs['transfer_to'];
			  }
			  else if($rs['event']=="Credit")
			  {
			  echo "<br>Credit from:".$rs['transfer_to'];
			  }
			  else
			  {
			   echo $rs['event'];
			  }
			  
			  ?></td>
              <td><?php echo $rs['amount']; ?></td>
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
            <li><a href="userhome.php">Home</a></li>
			<li><a href="get_token.php">Get token</a></li>
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
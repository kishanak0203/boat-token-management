<?php
include("include/protect.php");
include("include/dbconnect.php");
$rdate="";
extract($_REQUEST);

if($rdate=="")
{
$rdate=date("d-m-Y");
}

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
			<li><a href="view_cus.php">Customer</a></li>
			<li><a href="deposit.php">Deposit</a></li>
			<li class="active"><a href="process.php">process</a></li>
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
          <h2>Agent:Admin</h2>
           <p>Date
             <input type="text" name="rdate" value="<?php echo $rdate; ?>" />
             <input type="submit" name="btn" value="Submit" /> 
          </p>
           <p>&nbsp;</p>
		   <?php
		   if($rdate!="")
		   {
		   $qry=mysqli_query($connect, "select * from token where rdate='$rdate' order by id desc");
		   $num=mysqli_num_rows($qry);
		   if($num>0)
		   {
		   ?>
           <table width="574" border="1">
             <tr>
               <th width="70" class="bg1" scope="col">Sno</th>
               <th width="105" class="bg1" scope="col">Token</th>
               <th width="138" class="bg1" scope="col">Account</th>
               <th width="233" class="bg1" scope="col">Process</th>
             </tr>
             <?php
			$i=0;
			
			while($row=mysqli_fetch_array($qry))
			{
			$i++;
			?>
             <tr>
               <th scope="row"><?php echo $i; ?></th>
               <td><?php echo $row['tid']; ?></td>
               <td><?php echo $row['account']; ?></td>
               <td><?php echo $row['bprocess']; ?></td>
             </tr>
             <?php
			}
			?>
           </table>
         <?php
		 
		 }
		 else
		 {
		 echo "No Customers...";
		 }
		 
		 }
		 ?>
          
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
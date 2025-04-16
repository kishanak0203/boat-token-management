<?php
include("include/protect.php");
include("include/dbconnect.php");
$msg="";
extract($_POST);
$rdate=date("d-m-Y");
if(isset($btn))
{
$q1=mysqli_query($connect, "select * from register where account='$account'");
$n1=mysqli_num_rows($q1);
		if($n1==1)
		{
		$ins=mysqli_query($connect, "update register set deposit=deposit+$deposit where account='$account'");
		$mq = mysqli_query($connect, "select max(id) as maxid from event");
			$mr=mysqli_fetch_array($mq);
			$id = $mr['maxid']+1;
			$n=mysqli_query($connect, "insert into event(id,account,event,transfer_to,amount,rdate) values($id,'$account','Deposit','','$deposit','$rdate')");
		if($ins)
		{
		?>
		<script language="javascript">
		alert("Deposit Success...");
		window.location.href="view_cus.php";
		</script>
		<?php
		}
		
		
		
		}
		else
		{
		$msg="Invalid Account!";
		}
		
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
 <script language="javascript">
            function validate()
            {
			  
                
               if (document.form1.deposit.value == "")
                {
                    alert("Enter the Deposit Amount");
                    document.form1.deposit.focus();
                    return false;
                }
				if (isNaN(document.form1.deposit.value))
                {
                    alert("Invalid Deposit Amount!");
                    document.form1.deposit.select();
                    return false;
                }
               
                return true;
            }
        </script>
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
			<li class="active"><a href="deposit.php">Deposit</a></li>
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
          <h2>Customer Amount Deposit </h2>
          <table width="342" height="197" border="0" align="center" class="bg1">
            <tr>
              <th align="left" scope="row">Account No. </th>
              <td align="left"><input type="text" name="account" /></td>
            </tr>
            <tr>
              <th align="left" scope="row"> Deposit Amount </th>
              <td align="left"><input type="text" name="deposit" /></td>
            </tr>
            <tr>
              <th colspan="2" scope="row"><input type="submit" name="btn" value="Submit" onClick="return validate()" /></th>
            </tr>
          </table>
          <p align="center" class="msg"><?php echo $msg; ?></p>
		  <p>&nbsp;</p>
        </form>
        <p>&nbsp;        </p>
        <div class="clr"></div>
      </div>
      <div class="sidebar">
        <div class="gadget">
          <h2 class="star">Menu</h2>
          <ul class="sb_menu">
            <li><a href="admin.php">Home</a></li>
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
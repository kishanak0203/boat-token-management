<?php
session_start();
include("include/dbconnect.php");
extract($_POST);
$msg="";
			if(isset($btn2))
			{
			mysql_query("update register set pass='$pass',status=1 where account='$account'");
			?>
			<script language="javascript">
			alert("Registered Successfully");
			window.location.href="index.php";
			</script>
			<?php
			//header("location:register2.php?id=".$id);
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
  	if(document.form1.account.value=="")
	{
	alert("Enter the Account No.");
	document.form1.account.focus();
	return false;
	}
	if(document.form1.pass.value=="")
	{
	alert("Enter the Password");
	document.form1.pass.focus();
	return false;
	}
	if(document.form1.cpass.value=="")
	{
	alert("Re-type password again..");
	document.form1.cpass.select();
	return false;
	}
	if(document.form1.pass.value!=document.form1.cpass.value)
	{
	alert("Password not match!");
	document.form1.cpass.select();
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
          <li class="active"><a href="index.php">Home</a></li>
         <li><a href="login.php">Admin</a></li>
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
          <h2 align="center">Customer Registration </h2>
          <p align="center">Account No. 
            <input type="text" name="account" value="<?php echo $account; ?>" />
            <input type="submit" name="btn" value="Submit" />
          </p>
		  <?php
		  if(isset($btn))
		  {
		  $qry = mysql_query("select * from register where account='".$account."' && status=0");
					$num=mysql_num_rows($qry);
                    if ($num==1) 
					{
		  $row=mysql_fetch_array($qry);
		  ?>
          <table width="342" height="197" border="0" align="center" class="bg1">
            <tr>
              <th width="161" align="left" scope="col">Customer Name</th>
              <th width="171" align="left" scope="col"><?php echo $row['name']; ?><input type="hidden" name="id" value="<?php echo $row['id']; ?>" /></th>
            </tr>
            <tr>
              <th align="left" scope="row">Gender</th>
              <td align="left"><?php echo $row['gender']; ?></td>
            </tr>
            <tr>
              <th align="left" scope="row">Date of Birth </th>
              <td align="left"><?php echo $row['dob']; ?></td>
            </tr>
            <tr>
              <th align="left" scope="row">Mobile No. </th>
              <td align="left"><?php echo $row['contact']; ?></td>
            </tr>
            <tr>
              <th align="left" scope="row">E-mail</th>
              <td align="left"><?php echo $row['email']; ?></td>
            </tr>
            <tr>
              <th align="left" scope="row">Address</th>
              <td align="left"><?php echo $row['address']; ?></td>
            </tr>
            <tr>
              <th align="left" scope="row">New Password</th>
              <td align="left"><input type="password" name="pass" /></td>
            </tr>
            <tr>
              <th align="left" scope="row">Re- type Password </th>
              <td align="left"><input type="password" name="cpass" /></td>
            </tr>

            <tr>
              <th colspan="2" scope="row"><input type="submit" name="btn2" value="Submit" onclick="return validate()" /></th>
            </tr>
          </table>
		  <?php
		  }
		  else
		  {
		  ?><p align="center" class="msg">Invalid Account No! (or) Already Exist!</p><?php
		  }
		  }
		  ?>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        </form>
        </div>
      <div class="sidebar">
        <div class="gadget">
          <h2 class="star"><img src="images/business-banking.jpg" width="272" height="190" /></h2>
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

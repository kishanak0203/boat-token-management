<?php
session_start();
include("include/dbconnect.php");
extract($_POST);
$msg="";
			if(isset($btn))
			{
                   if($uname!="admin")
				   {
				    $qry = mysqli_query($connect, "select * from admin where username='".$uname."' && password='".$pass."'");
					$num=mysqli_num_rows($qry);
                    if ($num==1) 
					{
					$_SESSION['uname']=$uname;
					
					$q1=mysqli_query($connect, "select * from token where status=0 limit 0,1");
					$r1=mysqli_fetch_array($q1);
					$uid=$r1['id'];
					$acc=$r1['account'];
					mysqli_query($connect, "update token set status=1 where id=$uid");
					$q11=mysqli_query($connect, "select * from register where account='$acc'");
					$r11=mysqli_fetch_array($q11);
					$mobile=$r11['contact'];
					$na=$r11['name'];
					$message="Dear $na, you have ready to come to Bank counter";
					//echo '<iframe src="http://pay4sms.in/sendsms/?token= b81edee36bcef4ddbaa6ef535f8db03e&credit=2&sender= RandDC&message='.$message.'&number=91'.$mobile.'" style="display:block"></iframe>';
					echo '<script>
					//Using setTimeout to execute a function after 5 seconds.
					setTimeout(function () {
					   //Redirect with JavaScript
					   window.location.href= "staff.php";
					}, 1000);
					</script>';

                    } else {
                        $msg = "Invalid User!";
                    }
					
					
					}
					else {
                        $msg = "Invalid User!";
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
  	if(document.form1.uname.value=="")
	{
	alert("Enter the Transaction No.");
	document.form1.uname.focus();
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
          <li><a href="index.php">Home</a></li>
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
          <h2 align="center">Agent Login </h2>
          <p>&nbsp;</p>
          <table width="308" height="167" border="0" align="center" cellpadding="5" cellspacing="0">
            <tr>
              <td colspan="2" class="red"><?php                  
									if ($msg != "") {
                                          echo $msg;
                                        }
                                        ?></td>
            </tr>
            <tr>
              <td width="141" align="left">Username</td>
              <td width="200" align="left"><input type="text" name="uname" /></td>
            </tr>
            <tr>
              <td align="left">Password</td>
              <td align="left"><input type="password" name="pass" />
                  </td>
            </tr>
            <tr>
              <td colspan="2" align="center">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2" align="center"><input type="submit" name="btn" value="Login" onclick="return validate()" /></td>
            </tr>
            <!--onclick="finishMD()" -->
            <tr>
            </tr>
          </table>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        </form>
        </div>
      <div class="sidebar">
        <div class="gadget">
          <h2 class="star"><img src="images/bb.jpg" width="225" height="225" /></h2>
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

<?php
session_start();
include("include/dbconnect.php");
extract($_POST);
$msg="";
			if(isset($btn))
			{
                    $qry = mysqli_query($connect, "select * from register where account='".$uname."' && pass='$pass' && status=1");
					$num=mysqli_num_rows($qry);
                    if ($num==1) 
					{
					$_SESSION['uname']=$uname;
					
					
					header("location:userhome.php");
                    } else {
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
          <li class="active"><a href="index.php">Home</a></li>
		 <li><a href="login.php">Admin</a></li>
<li><a href="admin.php">Register</a></li>
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>

  <div class="content">
    <div class="content_resize">
      <form id="form1" name="form1" method="post" action="">
        <table width="100%" border="0" align="center">

          <tr>
            <th valign="top" scope="row"><h2 align="center">Customer Login </h2>
              <table width="308" height="167" border="0" align="center" cellpadding="5" cellspacing="0">
                <tr>
                  <td colspan="2" class="red"><?php                  
									if ($msg != "") {
                                          echo $msg;
                                        }
                                        ?></td>
                </tr>
                <tr>
                  <td width="141" align="left">Account No. </td>
                  <td width="200" align="left"><input type="text" name="uname" /></td>
                </tr>
                <tr>
                  <td align="left">Password</td>
                  <td align="left"><input type="password" name="pass" /></td>
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
            <p></p></th>
            <td><img src="images/b3.jpg" width="567" height="301" /></td>
          </tr>
        </table>
      </form>
      <p>&nbsp;</p>
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

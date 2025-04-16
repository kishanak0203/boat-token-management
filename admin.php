<?php
include("include/dbconnect.php");
extract($_POST);
$rdate=date("d-m-Y");
$msg="";
if(isset($btn))
{
$q1=mysqli_query($connect, "select * from register where account='$account'");
$n1=mysqli_num_rows($q1);
		if($n1==0)
		{

$mq = mysqli_query($connect, "select max(id) as maxid from register");
        $mr = mysqli_fetch_array($mq);
        $id = $mr['maxid']+1;
		
		$ins=mysqli_query($connect, "insert into register(id,name,boat_number,driver_name,gender,dob,address,contact,email,account,branch,deposit,pass,rdate,status) values($id,'$name','$boat_number','$driver_name','$gender','$dob','$address','$contact','$email','$account','$branch','$deposit','1234','$rdate','1')");
	echo "insert into register(id,name,boat_number,driver_name,gender,dob,address,contact,email,account,branch,deposit,pass,rdate,status) values($id,'$name','$boat_number','$driver_name','$gender','$dob','$address','$contact','$email','$account','$branch','$deposit','1234','$rdate','1')";
if($ins)
		{
		
		header("location:view_cus.php");
$msg="Added Successfully";
		}
		
		
		
		}
		else
		{
		$msg="Account  Already Exist!";
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
			  
                if (document.form1.name.value == "")
                {
                    alert("Enter the Name");
                    document.form1.name.focus();
                    return false;
                }
				var name=document.form1.name;
			    var letters = /^[A-Za-z]+$/;  
				if(name.value.match(letters))  
				{  
				//return true;  
				}  
				else  
				{  
				alert('Username must have alphabet characters only');  
				document.form1.name.select();  
				return false;  
				}
				if (document.form1.gender[0].checked==false && document.form1.gender[1].checked==false)
                {
                    alert("Select the Gender");
                    return false;
                }
				if (document.form1.dob.value == "")
                {
                    alert("Enter the Date of Birth (DD-MM-YYYY)");
                    document.form1.dob.focus();
                    return false;
                }
				/*	var dob=document.form1.dob.value;
				  var str=dob.split("-");
				  
				  if(str[0]>0 && str[0]<=31 && str[1]>0 && str[1]<=12 && str[2]>1910 && str[2]<2016)
				  {tr[2]);
				  }
				  else
				  //alert(s
				  {
				  alert("Invalid Date of Birth!");
				  document.form1.dob.select();
				  return false;
				  }*/
               
                if (document.form1.contact.value == "")
                {
                    alert("Enter the Mobile No.");
                    document.form1.contact.focus();
                    return false;
                }
				if (isNaN(document.form1.contact.value))
                {
                    alert("Invalid Mobile No.");
                    document.form1.contact.select();
                    return false;
                }
				if (document.form1.contact.value.length != 10)
                {
                    alert("10 digists only allowed!!");
                    document.form1.contact.select();
                    return false;
                }
				
                if (document.form1.email.value == "")
                {
                    alert("Enter the E-mail");
                    document.form1.email.focus();
                    return false;
                }
				if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.form1.email.value))  
				  {  
					//return (true)  
				  }  
				  else
				  {
					alert("You have entered an invalid email address!");
					document.form1.email.select();
					return false; 
				  }
				   if (document.form1.address.value == "")
                {
                    alert("Enter your Location / address");
                    document.form1.address.focus();
                    return false;
                }
				if (document.form1.account.value == "")
                {
                    alert("Enter the Account No.");
                    document.form1.account.focus();
                    return false;
                }
				
				if (document.form1.branch.value == "")
                {
                    alert("Enter the Branch Name");
                    document.form1.branch.focus();
                    return false;
                }
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
			
			<li class=""><a href="index.php">Home</a></li>
		 <li><a href="login.php">Admin</a></li>
<li class="active"><a href="admin.php">Register</a></li>
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
          <h2>Registration Form</h2>
          <table width="342" height="197" border="0" align="center" class="bg1">
            <tr>
              <th align="left" scope="col">Owner Name</th>
              <th align="left" scope="col"><input type="text" name="name" /></th>
            </tr>
            <tr>
              <th align="left" scope="col">Driver Name</th>
              <th align="left" scope="col"><input type="text" name="driver_name" /></th>
            </tr>
             <tr>
              <th align="left" scope="col">Boat Number</th>
              <th align="left" scope="col"><input type="text" name="boat_number" /></th>
            </tr>
            <tr>
              <th align="left" scope="row">Gender</th>
              <td align="left"><input name="gender" type="radio" value="Male" />
                Male 
                <input name="gender" type="radio" value="Female" />
                Female</td>
            </tr>
            <tr>
              <th align="left" scope="row">Date of Birth </th>
              <td align="left"><input type="text" name="dob" /></td>
            </tr>
            <tr>
              <th align="left" scope="row">Mobile No. </th>
              <td align="left"><input type="text" name="contact" /></td>
            </tr>
            <tr>
              <th align="left" scope="row">E-mail</th>
              <td align="left"><input type="text" name="email" /></td>
            </tr>
            <tr>
              <th align="left" scope="row">Place</th>
              <td align="left"><textarea name="address"></textarea></td>
            </tr>
            <tr>
              <th align="left" scope="row">&nbsp;</th>
              <td align="left">&nbsp;</td>
            </tr>
            <tr>
              <th align="left" scope="row">Account No. </th>
              <td align="left"><input type="text" name="account" /></td>
            </tr>
            <tr>
              <th align="left" scope="row">Branch</th>
              <td align="left"><input type="text" name="branch" /></td>
            </tr>
            <tr>
              <th align="left" scope="row">Initial Deposit </th>
              <td align="left"><input type="text" name="deposit" /></td>
            </tr>
            <tr>
              <th colspan="2" scope="row"><input type="submit" name="btn" value="Submit" onclick="return validate()" /></th>
            </tr>
          </table>
          <p align="center" class="msg"><?php echo $msg; ?></p>
		  <p>&nbsp;</p>
        </form>
        <p>&nbsp;        </p>
        <div class="clr"></div>
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
<?php ob_start(); ini_set('output_buffering','1'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_1.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script language="JavaScript" src="includes/window.js" type=text/javascript></script>
<!-- InstanceBeginEditable name="doctitle" -->
<title>External Inventory Tracking System</title>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
.style8 {font-size: 9px; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style9 {color: #333333}
.style10 {
	font-size: 18px;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #FFFFFF;
}
.style11 {font-size: 10px; font-weight: bold; font-family: Verdana, Arial, Helvetica, sans-serif;}
.style13 {font-size: 12px; font-family: Verdana, Arial, Helvetica, sans-serif; }
-->
</style>
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
.style14 {font-size: 16px; font-weight: bold;}
.style20 {font-size: 14px; font-weight: bold; color:#FF0000}
-->
</style>
<!-- InstanceEndEditable -->
<link href="styles/style.inv.css" rel="stylesheet" type="text/css">
</head>
<?php require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/setup.info.php");	?>
<body  bgcolor="#000000">

<table width="863" border="0" align="center" bgcolor="#CC7777" >
  <tr>
    <td width="1" height="2"></td>
    <td width="839"></td>
    <td width="10"></td>
  </tr>
  <tr>
    <td height="319"></td>
    <td><table width="848" align="center" bgcolor="#CC9999" id="Ist">
      <tr>
        <td height="59" colspan="3" bordercolor="#FFFFFF" bgcolor="#CC9999" class="style9"><div align="center" class="style10"> External Inventory Tracking System </div></td>
      </tr>
      <tr>
        <td height="21">&nbsp;</td>
        <td class="style8"><div align="right" class="style11">&nbsp;</div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="16" height="166">&nbsp;</td>
        <td width="800"><table width="800" border="3" align="center" bordercolor="#D4D0C8" bgcolor="#E4CBCB" class="style13" id="2nd"
		 style=" height:12px">
            <tr align="center" valign="middle">
              <td width="794" >
			  
			    <div align="center"><!-- InstanceBeginEditable name="EditRegion1" -->
<?php 
ini_set('default_charset', 'ANSI');
//require_once($_SERVER['DOCUMENT_ROOT'] . "includes/lib_1.php");
//echo $_GET['button'];
//echo $_POST['textfield1'];
$err_msg="";
if (isset($_POST['back'])) { header( "Location: index.php" ); }
if (isset($_POST['login'])) 
{	$login_success=0;
	$user_name=0;
	$user_type="";
	if (isset($_POST['txt1'])) { $user_id = $_POST['txt1']; } else { $user_id = "";}
	if (isset($_POST['txt2'])) { $user_pwd = $_POST['txt2']; } else { $user_pwd = "";}
	if (isset($_POST['txt3'])) { $user_cap = $_POST['txt3']; } else { $user_cap = "";}
	if (isset($_POST['txt4'])) { $cap_id = $_POST['txt4']; } else { $cap_id = 0;}
//	switch (trim($_POST['btn'])) 
//	{	case 'Back':
//		    header( "Location: index.php" ) ;
//    		break;
//    	case 'Login':
			$login_option=$_GET['option'];
			require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/dbcon.start.php");
			switch ($login_option)
			{	case 1;
					$user_type="Operator";
					$myquery = "select opt_code, opt_id, opt_pwd, opt_name, '" . $p_software_owner . "' as opt_company from operators ";
					$myquery.= "where upper(opt_id)='".strtoupper($user_id)."'";
					$myquery.= " and opt_pwd='".$user_pwd."'";
					$myquery.= " and active=1";
					break;
				case 2;
					$user_type="Distributor";
					$myquery = "select dist_code, dist_id, dist_pwd, contact_name, dist_name, 0 master_code from distributors ";
					$myquery.= "where upper(dist_id)='".strtoupper($user_id)."'";
					$myquery.= " and dist_pwd='".$user_pwd."'";	
					$myquery.= " and active=1";
					$myquery.= " UNION "; 
					$myquery.= "select a.staff_code, a.staff_id, a.staff_pwd, a.staff_name, b.dist_name, b.dist_code master_code ";
					$myquery.= "from distributors_staff a, distributors b ";
					$myquery.= "where a.dist_code = b.dist_code ";
					$myquery.= "and upper(staff_id)='".strtoupper($user_id)."'";
					$myquery.= " and staff_pwd='".$user_pwd."'";	
					$myquery.= " and a.active=1";
					$myquery.= " and b.active=1";
					//$var1 = $myquery;
					break;
				case 3;
					$user_type="Customer";
					$myquery = "select cust_code, cust_id, cust_pwd, contact_name, cust_name, dist_code from customers ";
					$myquery.= "where upper(cust_id)='".strtoupper($user_id)."'";
					$myquery.= " and cust_pwd='".$user_pwd."'";
					$myquery.= " and active=1";
					break;
			}
			$count = mysql_num_rows(mysql_query($myquery)); // or die('Cannot Execute:'. mysql_error());
			if ($count > 0) 
			{	$login_success=1; 
				//echo "SUCCESS";
				$result = mysql_query($myquery);
				$row = mysql_fetch_row($result);
				$user_code=$row[0];
				$user_name=$row[3];
				$user_comp=$row[4];
				if ($login_option == 2) {$master_code=$row[5];} else { $master_code=$row[0]; }
				if ($login_option == 3) {$master_code=$row[5];} else { $master_code=$row[0]; }
				//echo $myquery;
				// checking captcha value entered...
				$myquery = "select * from captchas ";
				$myquery.= "where cap_code='".$cap_id."'";
				$myquery.= " and upper(cap_value)='".strtoupper($user_cap)."'";
				//echo $myquery;
				$count2 = mysql_num_rows(mysql_query($myquery)); // or die('Cannot Execute:'. mysql_error());
				//echo $count;
				if ($count2 > 0)		// if ($count2 > 0) 
				{	$success=1; 
					$err_msg="";
					if ($count > 1) 
					{	$success=0; $err_msg= "Error: Duplicate ID's found, please contact Site Administrator ..."; $count=0; }
					else
					{	echo "Just before session-start";
						require_once(str_replace('\\','/',dirname(__FILE__))."/includes/session.start.php");
						//require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/session.start.php");
						header( "Location: mainmenu.php" ) ;
					}
				} else { $success=0; $err_msg= "Error: Invalid login credentials ..."; }				
			} else { $login_success=0; $err_msg= "Error: Invalid login credentials ...";}
//		break;
//	}
}   //else {echo "Not set";}
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/lib_1.php");
$pageURL = curPageURL();
//if (empty($login_option)) { $login_option=0;}
if (isset($_GET['option'])) {$login_option=$_GET['option'];} else {$login_option=0;}
if (($login_option >= 1) && ($login_option <= 3))
	{	//echo "Valid";
		switch ($login_option)
		{   case 1:      
				$login_type= "Operator";      
				break;
	    	case 2:      
	    		$login_type= "Distributor";      
	    		break;
	    	case 3:      
	    		$login_type= "Customer";      
	    		break;
		}
	$captcha_id = rand(1,25);
	//$captcha_img = "captcha/cap". $captcha_id. ".bmp";
	?>
	 <form action="<?php echo $pageURL ?>" method="post" >
	 		  	<?php //echo $var1; ?>
			  <table width="360" border="0">
                <tr>
                  <td width="15" height="60">&nbsp;</td>
                  <td colspan="2"> <div align="center"><span class="style14"><?php echo $login_type; ?>'s Login </span></div></td>
                  <td width="14">&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td width="98">&nbsp;</td>
                  <td width="198">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><div align="right">Login ID: </div></td>
                  <td><label>
                    <div align="left">
                      <input type="text" name="txt1" accesskey="1" tabindex="1" >
                      </div>
                  </label></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><div align="right">Password:</div></td>
                  <td><label>
                    <div align="left">
                      <input type="password" name="txt2" accesskey="2" tabindex="2" >
                      </div>
                  </label></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><div align="right">Type characters:</div></td>
                  <td><label>
                    <div align="left">
                      <input type="text" name="txt3" accesskey="3" tabindex="3" >
					  <input type="hidden" name="txt4" value=<?php echo $captcha_id; ?> >
                      </div>
                  </label></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td><div align="left"><img src="captcha/cap<?php echo $captcha_id; ?>.jpg"  alt="image" name="captcha" width="160" height="50" border="2" align="left" id="captcha" /></div></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td colspan="2">
                    
					  <div align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					    <button type="submit" name="login" accesskey="4"  ><img src="images/bb_ok.png" alt="Login" ></button>
						&nbsp;&nbsp;
					    <button type="submit" name="back" accesskey="5"  ><img src="images/bb_cancel.png" alt="Cancel" width="32" height="32" ></button>
					    </div></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="20">&nbsp;</td>
                  <td colspan="2">
                    <div align="center" class="style20"><?php echo $err_msg; ?></div></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </table>
			  </form>
<?php
	}else { header( "Location: index.php" ) ;}
?>

			  			  <!-- InstanceEndEditable -->		          </div></td> 
            </tr>
            
        </table></td>
        <td width="16">&nbsp;</td>
      </tr>
      <tr>
        <td height="33"></td>
        <td><div align="center"><span class="style8">Contact Us | Linking Policy | Confidential Info. Protection Policy | Privacy Policy<br />
        </span></div></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><div align="center"><span class="style8">Copyright &copy; 2010 UCT Global. All rights reserved. By using this site you agree to terms of Use <br />
        </span></div></td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td></td>
  </tr>
  <tr>
    <td height="2"></td>
    <td></td>
    <td></td>
  </tr>
</table>
<script>
	t_height = (getwindowSize('height') - 198) + 'px';
	document.getElementById("2nd").style.height = t_height;
</script>
</body>
<!-- InstanceEnd --></html>
<?php ob_flush() ?>
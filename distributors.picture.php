<?php ob_start(); ini_set('output_buffering','1'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_3.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
.style13 {font-size: 12px; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style53 {color: #FFFFFF; text-decoration: underline;}
-->
</style>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<link href="styles/style.inv.css" rel="stylesheet" type="text/css">
</head>

<body  bgcolor="#000000">
<?php 
			require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/session.check.php");	
			require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/setup.info.php");	
			//echo $user_comp;
			//echo "    (User: ";
			//echo $user_name;
			//echo ")"; 		
		?>
<table width="863" height="331" border="0" align="center" bgcolor="#CC7777">
  <tr>
    <td width="1" height="2"></td>
    <td width="839"></td>
    <td width="10"></td>
  </tr>
  <tr>
    <td height="319"></td>
    <td><table width="848" height="207" align="center" bgcolor="#CC9999" id="Ist">
      <tr>
        <td height="41" colspan="3" bordercolor="#FFFFFF" bgcolor="#CC9999" class="style9">
		<div align="Right" class="style10"> External Inventory Tracking System
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
	<button type="submit" name="add" accesskey="1" onclick="window.close()"><img src="images/bb_close.png" alt="Close" ></button>
		</div></td>
      </tr>
      <tr valign="top">
       <td width="16" height="127">&nbsp;</td>
       <td width="800">
	   <table width="800" height="251" border="0" align="center" bordercolor="#D4D0C8" bgcolor="#E4CBCB" class="style13" id="2nd">
            <tr >
              <td width="794" height="166" align="center" valign="top" >	  
				<!-- InstanceBeginEditable name="EditRegion1" -->
<div class="head1">Distributor Particulars  </div>
<?php
//foreach ($_POST as $var => $value) { echo "$var = $value<br>n"; } 
//echo "<b>";
//foreach ($_GET as $var => $value) { echo "$var = $value<br>n"; } 

if (isset($_POST['image_no'])) {$image_no=$_POST['image_no'];} 
else {$image_no=0;}
//echo "---Image_no:".$image_no."---";

require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/dbcon.start.php");
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/lib_1.php");

$dist_code=$_GET['dist_code'];
//echo "---Part_code:".$part_code."---";
//require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/fetch.part.info.php");
$myquery = "Select dist_code, dist_id, dist_pwd, dist_name, contact_name, add_street, add_city,";
$myquery.= " add_state, add_country, add_postal_code, billing, paypal_email, dist_graphic from distributors";
$myquery.= " where dist_code in ( " . $dist_code . " )";

$result = mysql_query($myquery) or die('Error: ' . mysql_error());
$row = mysql_fetch_row($result) or die('Error: ' . mysql_error());

$dist_id=$row[1];
$dist_pwd=$row[2];
$dist_name=$row[3];
$contact_name=$row[4];
$add_street=$row[5];
$add_city=$row[6];
$add_state=$row[7];
$add_country=$row[8];
$add_postal_code=$row[9];
$billing=$row[10];
$paypal_email=$row[11];
$dist_graphic=$row[12];

//echo $class_name . "---" . $type_name . "---" . $cat_name . "---" . $sub_cat_name;
//if (isset($_FILES['image'.$image_no]['name']))
if ($image_no > 0)
{  //echo "In IF";
	$image_path = $p_image_path . "distributors";
	if (!(create_validate_dir($image_path) == "exist")) {create_validate_dir($image_path);} 
	$image_name = $dist_code . "_" . $image_no;
	require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/image.processor.php");
	if ($errors == 0)
	{	$myquery = "update distributors set";
		$myquery.= " dist_graphic='" . $image_full_name . "'";
		$myquery.= " where dist_code in ( " . $dist_code . " )";
		//echo $myquery;
		$result = mysql_query($myquery) or die('Error: ' . mysql_error());
		$dist_graphic=$image_full_name;
	} else {echo "<div class=error1>" . $error_msg . "</div>";}
}
?>
 <table border="0">
  <tr>
    <td ><div align="right">Distributor Name  : </div></td>
    <td ><div class="display1" align="left"><?php echo $dist_name ?></div></td>
    </tr>
  <tr>
    <td><div align="right">Contact Person  : </div></td>
    <td ><div class="display1" align="left"><?php echo $contact_name ?></div></td>
    </tr>
  <tr>
    <td><div align="right">Address : </div></td>
    <td ><div class="display1" align="left"><?php echo $add_street.',' ?></div></td>
    </tr>
  <tr>
    <td><div align="right"></div></td>
    <td ><div class="display1" align="left"><?php echo $add_city.', '.$add_state.', '.$add_country.' ('.$add_postal_code.')'?></div></td>
    </tr>
  <tr>
    <td><div align="right">Paypal Email :</div></td>
    <td ><div class="display1" align="left"><?php echo $paypal_email ?></div>
      <div align="right"></div>      <div class="display1" align="left"></div></td>
    </tr>
  
  <tr>
    <td><div align="right">Login-ID :</div></td>
    <td><div class="display1" align="left"><?php echo $dist_id ?></div></td>
    
    </tr>
  
  <tr>
    <td><div align="right">
      <div align="right">Billing :</div>
    </div></td>
    <td colspan="2"><div class="display1" align="left"><?php echo iif($billing==1, 'Yes', 'No') ?></div></td>
    </tr>
</table>
 <hr width=80%>

<form name="picform" method="post" enctype="multipart/form-data"  action=""> 
<input name="image_no" type="hidden" value="" />
<table border="0">
  <tr>
    <td >&nbsp;&nbsp;<strong>Photo : </strong>	</td>
    <td>
      <div id="upload1_div">
	  <input name="image1" type="file" size="20" onChange="
	  if(confirm('You want to replace Photo with selected image?')) 
	  { document.picform.image_no.value=1; document.picform.submit(); return true;}
	  else {
	  document.getElementById('upload1_div').innerHTML = document.getElementById('upload1_div').innerHTML;
	  return false;}"
	  ></div>	</td>
    </tr>
  <tr>
    <td colspan="2"><img src="<?php echo $dist_graphic; ?>" alt="Distributor Photo" name="photo1" width="300" height="200" border="2" /></td>
    </tr>
</table>
</form>
<!-- InstanceEndEditable -->		   </td> 
            </tr>
        </table>
		</td>
        <td width="16">&nbsp;</td>
      </tr>
      <tr>
        <td height="0"></td>
        <td>        </td>
        <td></td>
      </tr>
      <tr>
        <td height="21">&nbsp;</td>
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
</body>
<!-- InstanceEnd --></html>
<?php ob_flush() ?>
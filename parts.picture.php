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
<div class="head1">Part Full Details</div>
<?php
switch($login_option){
	case 1:
		break;
	case 2:
		if ($master_code==$user_code ){$dist_code=$user_code; $staff_code=0; }else{$dist_code=0; $staff_code=$user_code;}
		//if ($master_code==$user_code ){$dist_code=$user_code; $staff_code=0; }else{$dist_code=$master_code; $staff_code=$user_code;}
		break;
	case 3:
		header( "Location: mainmenu.php" ); 
		break;
}

//foreach ($_POST as $var => $value) { echo "$var = $value<br>n"; } 
//echo "<b>";
//foreach ($_GET as $var => $value) { echo "$var = $value<br>n"; } 

if (isset($_POST['image_no'])) {$image_no=$_POST['image_no'];} 
else {$image_no=0;}
//echo "---Image_no:".$image_no."---";

require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/dbcon.start.php");
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/lib_1.php");

$part_code=$_GET['part_code'];
//echo "---Part_code:".$part_code."---";
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/fetch.part.info.php");
//************Display if part is owned by distributor***************************************
if ($dist_code>0) {
	$myquery2 = "Select dist_id, dist_name from distributors";
	$myquery2.=	" Where dist_code = " . $dist_code;
	$result2 =  mysql_query($myquery2);
	if (!($result2)) {errHandler();}
	else{	$row2 = mysql_fetch_row($result2);
			echo "<div class='display2'>!!! Part owned by: " . $row2[1] . " (" . $row2[0] . ") !!!</div><br>";}
}
//*******************************************************************************************

//echo $class_name . "---" . $type_name . "---" . $cat_name . "---" . $sub_cat_name;
//if (isset($_FILES['image'.$image_no]['name']))
if ($image_no > 0)
{  //echo "In IF";
	$image_path = $p_image_path . $class_code . "/" . $type_code . "/" . $cat_code . "/" . $sub_cat_code;
	if (!(create_validate_dir($image_path) == "exist"))
	{	$image_path = $p_image_path . $class_code;
		create_validate_dir($image_path); 
		$image_path = $p_image_path . $class_code . "/" . $type_code;
		create_validate_dir($image_path); 
		$image_path = $p_image_path . $class_code . "/" . $type_code . "/" . $cat_code;
		create_validate_dir($image_path); 
		$image_path = $p_image_path . $class_code . "/" . $type_code . "/" . $cat_code . "/" . $sub_cat_code;
		create_validate_dir($image_path); 
	} 
	$image_path = $p_image_path . $class_code . "/" . $type_code . "/" . $cat_code . "/" . $sub_cat_code;
	$image_name = $part_code . "_" . $image_no;
	require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/image.processor.php");
	if ($errors == 0)
	{	$myquery = "update parts set";
		$myquery.= " photo" . $image_no . "='" . $image_full_name . "'";
		$myquery.= " where part_code in ( " . $part_code . " )";
		//echo $myquery;
		$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
		if (!($result)) {errHandler(); $err=1;}
		else 
		{	if ($login_option > 1)
			{	$myquery = " Insert into parts_log (log_code, part_code, dist_code, staff_code, action)";
				$myquery.= " VALUES (NULL, $part_code, $dist_code, $t_staff_code, 7)";
				$result = mysql_query($myquery) or die('Error: ' . mysql_error());	
			}
		}
		if ($image_no == 1) { $photo1=$image_full_name; } else {$photo2=$image_full_name;} 
	} else {echo "<div class=error1>" . $error_msg . "</div>";}
}
?>

<table border="0">
  <tr>
    <td width="82"><div align="right">Type :</div></td>
    <td ><div class="display1" align="left"><?php echo $type_name ?></div></td>
    <td width="15">&nbsp;</td>
    <td width="106"><div align="right">Class :</div></td>
    <td ><div class="display1" align="left"><?php echo $class_name ?></div></td>
  </tr>
  
  <tr>
    <td><div align="right">Category :</div></td>
    <td><div class="display1" align="left"><?php echo $cat_name ?></div></td>
    <td>&nbsp;</td>
    <td><div align="right">SubCategory :</div></td>
    <td><div class="display1" align="left"><?php echo $sub_cat_name ?></div></td>
  </tr>
 </table>
 <hr width=80% >
 
 <table border="0">
 
  <tr>
    <td ><div align="right">Part No : </div></td>
    <td colspan="4"><div class="display1" align="left"><?php echo $part_no ?></div></td>
    </tr>
  <tr>
    <td><div align="right">Part Name : </div></td>
    <td colspan="4"><div class="display1" align="left"><?php echo $part_name ?></div></td>
    </tr>
  <tr>
    <td><div align="right">Short Description : </div></td>
    <td colspan="4"><div class="display1" align="left"><?php echo $short_desc ?></div></td>
    </tr>
  <tr>
    <td><div align="right">Long Description : </div></td>
    <td colspan="4"><div class="display1" align="left"><?php echo $long_desc ?></div></td>
    </tr>
  <tr>
    <td><div align="right">Industry-No :</div></td>
    <td><div class="display1" align="left"><?php echo $industry_no ?></div></td>
    <td>&nbsp;</td>
    <td><div align="right">UPC-No :</div></td>
    <td><div class="display1" align="left"><?php echo $upc_no ?></div></td>
  </tr>
  
  <tr>
    <td><div align="right">UIC-No :</div></td>
    <td><div class="display1" align="left"><?php echo $uic_no ?></div></td>
    <td>&nbsp;</td>
    <td><div align="right">SKU-No :</div></td>
    <td><div class="display1" align="left"><?php echo $sku_no ?></div></td>
  </tr>
  
  <tr>
    <td><div align="right">List-Price : </div></td>
    <td><div class="display1" align="left"><?php echo $list_price ?></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
 <hr width=80%>

<form name="picform" method="post" enctype="multipart/form-data"  action=""> 
<input name="image_no" type="hidden" value="" />
<table border="0">
  <tr>
    <td >&nbsp;&nbsp;<strong>Photo-1:</strong>	</td>
    <td>
      <div id="upload1_div">
	  <input name="image1" type="file" size="18" onChange="
	  if(confirm('You want to replace Photo-1 with selected image?')) 
	  { document.picform.image_no.value=1; document.picform.submit(); return true;}
	  else {
	  document.getElementById('upload1_div').innerHTML = document.getElementById('upload1_div').innerHTML;
	  return false;}"
	  ></div>	
	</td>
    <td width="10">&nbsp;</td>
    <td >&nbsp;&nbsp;<strong>Photo-2:</strong>	</td>
    <td >
	  <div id="upload2_div">
	  <input name="image2" type="file" size="18" onChange="
	  if(confirm('You want to replace Photo-2 with selected image?')) 
	  { document.picform.image_no.value=2; document.picform.submit(); return true;}
	  else {
	  document.getElementById('upload2_div').innerHTML = document.getElementById('upload2_div').innerHTML;
	  return false;}"
	  > </div>	</td>
  </tr>
  <tr>
    <td colspan="2"><img src="<?php echo $photo1; ?>" alt="Part Photo-1" name="photo1" width="300" height="200" border="2" /></td>
    <td>&nbsp;</td>
    <td colspan="2"><img src="<?php echo $photo2; ?>" alt="Part Photo-1" name="photo2" width="300" height="200" border="2" /></td>
  </tr>
</table>
</form>
<hr width=80%>

<?php
//***********************************************************************************************************************************
$myquery = "select a.sfv_code, a.part_code, a.sf_code, b.sf_name, a.sf_value";
$myquery.= " from parts_specs a, sf_name_def b";
$myquery.= " where a.sf_code = b.sf_code";
$myquery.= " and a.part_code=" . $part_code;
$result = mysql_query($myquery);
?>
<span class="head1">Special-Field(s) Assigned</span>
  <table border="0" cellpadding="0" cellspacing="0" >
	<tr height="1">
		<td></td>
		<td></td>
<?php  
while($row = mysql_fetch_row($result)) {
?>
  <tr  >
  <td ><div align="right" ><?php echo $row[3]; ?> :</div></td>
  <td><div class="display1" align="left"><?php echo $row[4]; ?></div></td>
  </tr>

<?php } ?>
</table>

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
<?php ob_start(); ini_set('output_buffering','1'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_2.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script language="JavaScript" src="includes/window.js" type=text/javascript></script>
<!-- InstanceBeginEditable name="doctitle" -->
<title>External Inventory Tracking System</title>
<script language="JavaScript" src="includes/validate.input.js" type=text/javascript></script>
<script language="javascript">
function ValidateForm(thisform) { with (thisform) {
  //alert(window.event.srcElement.parentNode.id);
  //alert(window.document.activeElement.name);
  if (window.document.activeElement.name == "cancel" ) {return true}
  return true; }}
function calcTotal(i, option) 
{	// Below lines gave error for array with just one element, i-e element[0];
	//var part_qty = document.list.elements["part_quantity[]"];
	//var action_qty = document.list.elements["action_quantity[]"];
	//var total_qty = document.list.elements["total_quantity[]"];
	var part_qty = document.getElementsByName('part_quantity[]');
	var action_qty = document.getElementsByName('action_quantity[]');
	var total_qty = document.getElementsByName('total_quantity[]');
	var t_action_qty=0;
	var t_total_qty=0;
	if (parseInt(action_qty[i].value,10) > 0) {t_action_qty = parseInt(action_qty[i].value,10)} else {t_action_qty = 0;}
	if (option==1)
	{	t_total_qty = parseInt(part_qty[i].value,10) + t_action_qty;
		if (t_total_qty > 99999999) 
		{	alert('Total stock can not exceed 99,999,999. Please re-enter quantity ... '); 
			action_qty[i].value=''; total_qty[i].value= part_qty[i].value;
		}
		else {total_qty[i].value = parseInt(part_qty[i].value,10) + t_action_qty;}
	}
	else
	{	t_total_qty = parseInt(part_qty[i].value,10) - t_action_qty;
		if (t_total_qty < 0) 
		{	alert('Total stock can not be negative. Please re-enter quantity ... '); 
			action_qty[i].value=''; total_qty[i].value= part_qty[i].value;
		}
		else {total_qty[i].value = parseInt(part_qty[i].value,10) - t_action_qty;}
	}
}
function setFocus(i)
{	var action_qty = document.list.elements["action_quantity[]"];
	action_qty[i].focus();
}
function openwindow() {
	window.open("catalog.view.details.php?part_code=" + window.document.activeElement.value, null, newwinAttrib(720,900));
	return false;
}
</script>
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
<table width="950" border="0" align="center" bgcolor="#CC7777">
  <tr>
    <td width="1" height="2"></td>
    <td width="839"></td>
    <td width="10"></td>
  </tr>
  <tr>
    <td height="319"></td>
    <td>
	<table width="940" bgcolor="#CC9999" cellpadding="0" cellspacing="0" align="center" id="Ist">
      <tr>
        <td height="39" colspan="3" valign="bottom" bordercolor="#FFFFFF" bgcolor="#CC9999" class="style9"><div align="center" class="style10"> External Inventory Tracking System </div></td>
      </tr>
      <tr>
        <td height="30">&nbsp;</td>
        <td class="style13" align="center">
		  <span class="style53">
		  <?php
			require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/session.check.php");	
			require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/setup.info.php");	
			if ($login_option==1) { echo "Operator: "; }
			if ($login_option==2) { echo "Distributor: "; }
			if ($login_option==3) { echo "Customer: "; }
			echo $user_comp;
			echo "    (User: ";
			echo $user_name;
			echo ")"; 
			if (isset($_GET['selection']))
			{	if ($_GET['selection']==1) { $_SESSION["s_dist_code"]=0; $_SESSION["s_cust_code"]=0; $s_dist_code=0; $s_cust_code=0;}
				if ($_GET['selection']==2) { $_SESSION["s_cust_code"]=0; $s_cust_code=0;}
			} 
		?>
		  </span>		</td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td height="27" valign="baseline">&nbsp;</td>
        <td >
		<div align="left" style="float: left; text-align: left; color:#FFFFFF; font-variant: small-caps; font-style: italic;font-size: 12px; font-weight: bold;" >&nbsp;
		<?php
		if ($s_dist_code>0) {echo "" . $s_dist_name . "&nbsp;&nbsp;( <a href='mainmenu.php?selection=1'>x</a> )&nbsp;&nbsp;";}
		if ($s_cust_code>0) {echo " ". $s_cust_name . "&nbsp;&nbsp;( <a href='mainmenu.php?selection=2'>x</a> )&nbsp;&nbsp;";}	
		?>
		</div>
		<div align="right" style="float: right; text-align: right;">
		<strong>|</strong>		
		<a href="mainmenu.php">Menu</a><strong> | </strong>
		<a href="logout.php">Logout</a><strong> | </strong>		
		
		</div>
		</td>
        <td>&nbsp;</td>
      </tr>
      <tr valign="top">
        <td width="19" height="166">&nbsp;</td>
        <td width="900"><table width="900" border="3" align="center" bordercolor="#D4D0C8" bgcolor="#E4CBCB" class="style13" id="2nd">
            
            <tr align="center" valign="top">
              <td width="894" >
			  
			    <div align="center"><!-- InstanceBeginEditable name="EditRegion1" -->
<?php
$option=0;
if (isset($_GET['option'])) {$option=$_GET['option'];}
if (($option < 1) || ($option > 2)) { $option=0;}
$cust_code=0;
switch($login_option){
	case 1:
		header( "Location: mainmenu.php" );
		break;
	case 2:
		header( "Location: mainmenu.php" );
		break;
	case 3:
		$cust_code=$user_code;
		if($option==1) 
		{	$heading1 = "Inventory Addition";
			$heading2 = "Stock(+)";
			$heading3 = "Note: Below figures will be <strong>ADDED</strong> to your inventory on SAVE. ";
			$heading3.= "Before proceding to the next page or changing parts classification, ";
			$heading3.= "either save or cancel it, otherwise your changes in $heading2 column will be lost.";
			
		}
		if($option==2) 
		{	$heading1="Inventory Subtraction";
			$heading2 = "Stock(-)";
			$heading3 = "Note: Below figures will be <strong>SUBTRACTED</strong> from your inventory on SAVE. ";
			$heading3.= "Before proceding to the next page or changing parts classification, ";
			$heading3.= "either save or cancel it, otherwise your changes in $heading2 column will be lost.";
			
		}
		?>
		<div align="right">Link to: 
			<a href="customer.inventory.report.php">Inventory-Report</a>
		</div>		
		<?php
		break;
}
if (($cust_code==0) || ($option==0)) {header( "Location: mainmenu.php" );}
$err=0;
$form_action="none";
//***********************Check for user-forced page-reload************************************************
if (isset($_POST['load_counter'])) {if (!($_SESSION['load_counter'] == $_POST['load_counter'] + 1)) { unset ($_POST['save']); }}
//********************************************************************************************************
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/lib_1.php");
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/dbcon.start.php");
//***********************Buttons control******************************************************************
//foreach ($_POST as $var => $value) { echo "$var = $value<br>n"; } 
if (isset($_POST['save']))
{	$form_action="save";
	checkCustLog($cust_code);
	$t_timestamp=getTimestamp();
	//echo $t_timestamp;
	$count = count($_POST['part_code']);
	for($i=0; $i < $count; $i++)
	{	//if (isset($_POST["rowselector_". ($i)])) {$t_rowselector=1; } else { $t_rowselector=0; }
		//echo "  ***". $_POST['assign_code'][$i] . ":" .$t_rowselector;
		//echo $_POST['action_quantity'][$i] . ";;";
		if (($_POST['action_quantity'][$i] > 0) && ($_POST['cust_inv_code'][$i] < 1) && ($option=1))
		{	$myquery = "Insert into customer_inventory (cust_inv_code, cust_code, part_code, part_quantity, timestamp)";
			$myquery.= " VALUES (NULL, $cust_code,";
			$myquery.= " " . $_POST['part_code'][$i] . ",";
			$myquery.= " " . $_POST['total_quantity'][$i] . ", '$t_timestamp' )";
			$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
			//echo $myquery;
			if (!($result)) { if (mysql_errno()==1062) {$err=1;} else {errHandler(); $err=1;} }
			else
			{	$myquery = "Insert into _cust_inv_log_$cust_code";
				$myquery.= " (log_code, cust_code, part_code, part_quantity, action_quantity, action, timestamp)";
				$myquery.= " VALUES(NULL, $cust_code,";
				$myquery.= " " . $_POST['part_code'][$i] . ",";
				$myquery.= " " . $_POST['part_quantity'][$i] . ",";
				$myquery.= " " . $_POST['action_quantity'][$i] . ",";
				$myquery.= " $option ,";			
				$myquery.= " '$t_timestamp' )";			
				$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
				//echo $myquery;
			}
		}
		elseif (($_POST['action_quantity'][$i] > 0) && ($_POST['cust_inv_code'][$i] > 1))
		{	$myquery = "Update customer_inventory set";
			$myquery.= " part_quantity = " . $_POST['total_quantity'][$i] . ",";
			$myquery.= " timestamp = '$t_timestamp'" ;
			$myquery.= " where cust_inv_code = " . $_POST['cust_inv_code'][$i];
			$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
			//echo $myquery;
			if (!($result)) {errHandler(); $err=1;} //	else {	$_SESSION["action_allowed"] = "none";}
			else
			{	$myquery = "Insert into _cust_inv_log_$cust_code";
				$myquery.= " (log_code, cust_code, part_code, part_quantity, action_quantity, action, timestamp)";
				$myquery.= " VALUES(NULL, $cust_code,";
				$myquery.= " " . $_POST['part_code'][$i] . ",";
				$myquery.= " " . $_POST['part_quantity'][$i] . ",";
				$myquery.= " " . $_POST['action_quantity'][$i] . ",";
				$myquery.= " $option ,";			
				$myquery.= " '$t_timestamp' )";			
				$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
				//echo $myquery;
			}

		}
	}
}

if (isset($_POST['cancel'])) {$form_action="cancel"; $_SESSION['action_allowed'] = "none";}
//if ($login_option == 1) { echo "<span class='head1'>Inventory Assignment by: $user_comp</span>"; echo "<hr width=90%>";}
?> 
<form action="" method="post" name="list" onsubmit="return ValidateForm(this)">

<table border="0">
  <tr><td align="left" valign="top" >
    <div align="left">Class:  </div>
  </td>
    <td align="left" valign="top" >
		<div align="left">Type: </div></td>
    <td align="left" valign="top" ><div align="left">Category:</div></td>
    <td align="left" valign="top" ><div align="left">SubCategory:</div></td>
  </tr>

  <tr><td valign="top"><select name="classes" size="1" onchange="document.list.submit();">
    <?php
 	//********************Classes combo code********************************************************
	$myquery2 = "Select class_code, class_name from classes order by class_name";
	$result2 = mysql_query($myquery2);
	if (isset($_POST['classes'])) 
	{	$selected_class_code=$_POST['classes'];
		while($row2 = mysql_fetch_row($result2)) 
 		{ 
			if ($row2[0]==$selected_class_code)
				{echo "<option value='" . $row2[0] . "' selected >" . $row2[1] . "</option>";}
			else
				{echo "<option value='" . $row2[0] . "' >" . $row2[1] . "</option>";} 
		}
	}
	else
	{	while($row2 = mysql_fetch_row($result2)) 
 		{ echo "<option value='" . $row2[0] . "'>" . $row2[1] . "</option>"; 
			if (!(isset($selected_class_code))) {$selected_class_code=$row2[0];}
		}
	}?>
  </select>
  </td>
    <td valign="top"><select name="types" size="1" onchange="document.list.submit();">
      <?php
 	//********************Types combo code********************************************************
	$myquery2 = "Select type_code, type_name from types order by type_name";
	$result2 = mysql_query($myquery2);
	if (isset($_POST['types'])) 
	{	$selected_type_code=$_POST['types'];
		while($row2 = mysql_fetch_row($result2)) 
 		{ 
			if ($row2[0]==$selected_type_code)
				{echo "<option value='" . $row2[0] . "' selected >" . $row2[1] . "</option>";}
			else
				{echo "<option value='" . $row2[0] . "' >" . $row2[1] . "</option>";} 
		}
	}
	else
	{	while($row2 = mysql_fetch_row($result2)) 
 		{ echo "<option value='" . $row2[0] . "'>" . $row2[1] . "</option>"; 
			if (!(isset($selected_type_code))) {$selected_type_code=$row2[0];}
		}
	}?>
    </select></td>
    <td valign="top"><select name="categories" size="1" onchange="document.list.submit();">
      <?php
 	//********************Categories combo code********************************************************
	$myquery2 = "Select cat_code, cat_name from categories order by cat_name";
	$result2 = mysql_query($myquery2);
	if (isset($_POST['categories'])) 
	{	$selected_cat_code=$_POST['categories'];
		while($row2 = mysql_fetch_row($result2)) 
 		{ 
			if ($row2[0]==$selected_cat_code)
				{echo "<option value='" . $row2[0] . "' selected >" . $row2[1] . "</option>";}
			else
				{echo "<option value='" . $row2[0] . "' >" . $row2[1] . "</option>";} 
		}
	}
	else
	{	while($row2 = mysql_fetch_row($result2)) 
 		{ echo "<option value='" . $row2[0] . "'>" . $row2[1] . "</option>"; 
			if (!(isset($selected_cat_code))) {$selected_cat_code=$row2[0];}
		}
	}?>
    </select></td>
    <td valign="top"><select name="subcategories" size="1" onchange="document.list.submit();">
      <?php
 	//********************SubCategories combo code********************************************************
	$myquery2 = "Select sub_cat_code, sub_cat_name from sub_categories";
	$myquery2.= " where cat_code=".$selected_cat_code;
	$myquery2.= " order by sub_cat_name";
	$result2 = mysql_query($myquery2);
	$match_found=0;
	$first_sub_cat_code=0;
	if (isset($_POST['subcategories'])) 
	{	$selected_sub_cat_code=$_POST['subcategories'];
		while($row2 = mysql_fetch_row($result2)) 
 		{ 	if ($row2[0]==$selected_sub_cat_code)
				{echo "<option value='" . $row2[0] . "' selected >" . $row2[1] . "</option>"; $matchfound=1;}
			else
				{echo "<option value='".$row2[0]."' >".$row2[1]."</option>"; if($first_sub_cat_code==0){$first_sub_cat_code=$row2[0];}} 
		}
		if ($matchfound == 0) {$selected_sub_cat_code=$first_sub_cat_code;}
	}
	else
	{	while($row2 = mysql_fetch_row($result2)) 
 		{ echo "<option value='" . $row2[0] . "'>" . $row2[1] . "</option>"; 
			if (!(isset($selected_sub_cat_code))) {$selected_sub_cat_code=$row2[0];}
		}
	}
	if (mysql_num_rows(mysql_query($myquery2)) < 1) {$selected_sub_cat_code=0;}

	?>
    </select></td>
  </tr>
  <tr><td height="15" valign="top"></td>
    <td valign="top"></td>
    <td valign="top"></td>
    <td valign="top"></td>
  </tr>
</table>
<?php

//echo "type:" . $selected_type_code."::class:".$selected_class_code."::cat:".$selected_cat_code."::sub:".$selected_sub_cat_code."::";

//if (isset($_POST['categories'])) { $selected_cat_code=$_POST['categories'];}
//***********************************************************************************************************************
//********************PARTS LIST CODE************************************************************************************
//***********************************************************************************************************************

if ((isset($selected_type_code)) && (isset($selected_class_code)) && (isset($selected_cat_code)) && (isset($selected_sub_cat_code))){ 
if (isset($_POST['showall']))
{	$myquery = "SELECT a.part_code, a.part_no, a.part_name, a.list_price, a.dist_code,";
	$myquery.= " c.cust_inv_code, c.part_quantity, c.cust_code";
	$myquery.= " FROM parts a, inventory_assignment b LEFT OUTER JOIN customer_inventory c ON b.part_code = c.part_code";
	$myquery.= " AND c.cust_code = $cust_code";
	$myquery.= " WHERE a.part_code = b.part_code";
	$myquery.= " AND a.class_code = " . $selected_class_code;
	$myquery.= " AND a.type_code = " . $selected_type_code;
	$myquery.= " AND a.sub_cat_code = " . $selected_sub_cat_code;
	$myquery.= " AND b.cust_code = $cust_code";
	$myquery.= " AND a.active = 1";
	$myquery.= " AND b.assigned = 1";
	$myquery.= " ORDER BY part_no";
}else
{	$myquery = "SELECT a.part_code, a.part_no, a.part_name, a.list_price, a.dist_code,";
	$myquery.= " c.cust_inv_code, c.part_quantity, c.cust_code";
	$myquery.= " FROM parts a, inventory_assignment b, customer_inventory c";
	$myquery.= " WHERE b.part_code = c.part_code";
	$myquery.= " AND c.cust_code = $cust_code";
	$myquery.= " AND a.part_code = b.part_code";
	$myquery.= " AND a.class_code = " . $selected_class_code;
	$myquery.= " AND a.type_code = " . $selected_type_code;
	$myquery.= " AND a.sub_cat_code = " . $selected_sub_cat_code;
	$myquery.= " AND b.cust_code = $cust_code";
	$myquery.= " AND a.active = 1";
	$myquery.= " AND b.assigned = 1";
	$myquery.= " AND c.part_quantity > 0";
	$myquery.= " ORDER BY part_no";
}
//echo $myquery;
//---------------Paging Header--------------------*
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/paging.header.php");
//------------------------------------------------*
$result = mysql_query($myquery." LIMIT $from, $max_results");
//$fields_num = mysql_num_fields($result);
?>
   <span class="head1"><?php echo $heading1; ?> </span>
   <table width="849"  >
    <tr>
     <td class="notes1"><?php echo $heading3; ?>
	 </td>
    </tr>
   </table>
   <input name="hidden_code" type="hidden" value="" />
<table width="851" class="listtable1" >
                    <tr class="listheader1" height="22" >
					  <td width="20"><div align="center">*</div></td>
                      <td width="153"><div align="center">Part-No</div></td>
                      <td width="331"><div align="center">Part Name</div></td>
                      <td width="90"><div align="center">List-Price</div></td>
					  <td width="75"><div align="center">Curr-Stock</div></td>
					  <td width="75"><div align="center"><?php echo $heading2 ?></div></td>
					  <td width="75"><div align="center">New-Stock</div></td>
                    </tr>
<?php  
$i=-1;
$list_bgcolor=$p_list_bgcolor_1;
while($row = mysql_fetch_row($result)) {
$i = $i + 1;
?>
  <tr bgcolor=<?php echo $list_bgcolor; ?> >
  <td class="listcell1" >
    <div align="center">
	 <input name="partdetail"  type="image" src="images/b_property.png" alt="Part full Details" 
	 value="<?php echo $row[0] ?>" onclick="openwindow(); return false;" >	
 	</div>
  </td>  
   <td class="listcell1" >
     <input name="part_code[]"   type="hidden" value="<?php echo $row[0];?>" />	
	 <input name="cust_inv_code[]"   type="hidden" value="<?php echo $row[5];?>" />
   <div align="left" ><?php echo $row[1]; ?></div></td>
   <td class="listcell1" ><div align="left" ><?php echo $row[2]; ?></div></td>
   <td class="listcell1" ><div align="right" class="inputtxt2">$<?php echo $row[3]; ?></div></td>
   <td class="listcell1">
     <div align="center"  >
       <input name="part_quantity[]" type="text" id="" accesskey="2"  size="10" maxlength="9" 
	   tabindex="1000" readonly="true"
	   value="<?php if($row[6]>0) {echo $row[6];}else{echo '0';} ?>" 
	   class="inputtxt2" style="background-color: <?php echo $list_bgcolor; ?>; text-align: right" 
	   onfocus="setFocus(<?php echo $i ?>)" />
      </div>
   </td>
   <td class="listcell1">
     <div align="center">
       <input name="action_quantity[]" type="text" id="" accesskey="2" size="9" maxlength="8" style="text-align: right"
	   tabindex="<?php echo $i ?>"
	   onkeypress="return onlyNumbers();"
	   onkeyup="calcTotal(<?php echo $i ?>,<?php echo $option ?>);"
	   class="inputtxt1"
	   value="" />
      </div>
   </td>
   <td class="listcell1">
      <div align="center">
       <input name="total_quantity[]" type="text" id="" accesskey="2"  size="10" maxlength="9" 
	   tabindex="<?php echo $i ?>" readonly="true"
	   value="<?php if($row[6]>0) {echo $row[6];}else{echo '0';} ?>"
	   class="inputtxt2" style="background-color: <?php echo $list_bgcolor; ?>; text-align: right; " 
	   onfocus="setFocus(<?php echo $i+1 ?>)" />
      </div>
   </td>
   </tr>
<?php 
if ($list_bgcolor == $p_list_bgcolor_1) {$list_bgcolor=$p_list_bgcolor_2;} else {$list_bgcolor=$p_list_bgcolor_1;}
} ?>
</table>
<?php if (!(($form_action=="add") || ($form_action=="rowedit"))) {
		if (($selected_type_code>0) && ($selected_class_code>0) && ($selected_cat_code>0) && ($selected_sub_cat_code>0))
			{?>
<table width="850">
 <tr>
  <td width="850" align="Right" ><div align="right">Show all:
    <input name="showall" type="checkbox" accesskey="100" tabindex="100" onclick="document.list.submit();"  
	  <?php if (isset($_POST['showall'])) { echo ' checked'; } ?> 
	  <?php if ($option==2) { echo ' disabled'; } ?> />
  </div></td>
 </tr>
</table>
<table width="127" border="0">
  <tr>
    <td><button type="submit" name="save" accesskey="1" ><img src="images/bb_save.png" alt="Save all changes" ></button></td>
    <td>&nbsp;</td>
	<td><button type="submit" name="cancel" accesskey="2" 
			onclick="
				if(confirm('Are you sure, you want to cancel and reset all changes?')) {return true;} else {return false;} 
			"
			><img src="images/bb_cancel.png" alt="Cancel all changes" ></button>
			<input name="load_counter" type="hidden" value="<?php echo $_SESSION['load_counter']; ?>" />	
		</td>
  </tr>
</table>
<?php
//----------------- Paging Footer------------------*
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/paging.footer.php");
//-------------------------------------------------*

echo "</form>";
	 	} 
	}
} else { echo "In order to assign a Part, you have to have at least one Class, Type, Category, Sub-Category and a Part already defined ...";}	
?>				
				<!-- InstanceEndEditable -->		          </div></td> 
            </tr>
        </table>		
		</td>
        <td width="19">&nbsp;</td>
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
    </table>

	</td>
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
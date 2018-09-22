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
  var t_min_value = document.list.elements["min_value[]"]; 
  var t_max_value = document.list.elements["max_value[]"];  
  var t_rowselector_ = document.list.elements["assigned[]"];  
  for(var i = 0; i < t_min_value.length; i++) 
  {	if (document.getElementById('rowselector_' + i).checked == true)
  	 {	if(invalidNumeric(t_min_value[i], "'Minimum Quantity'", 99999999, true)){return false;}
 		if(invalidNumeric(t_max_value[i], "'Maximum Quantity'", 99999999, true)){return false;}
	 }  
  }
  return true; }}
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
$parts_filter="";
$dist_code=0;
switch($login_option){
	case 1:
		header( "Location: mainmenu.php" ); 
		If ($p_dist_part_filter==0) {$parts_filter="";} else {$parts_filter=" and dist_code < 1";}
		?>
		<div align="right">Link to: 
			<a href="classes.php">Classes</a>
		</div>		
		<?php
		break;
	case 2:
		if ($master_code==$user_code ){$dist_code=$user_code; $staff_code=0; }else{$dist_code=0; $staff_code=$user_code;}
		//if ($master_code==$user_code ){$dist_code=$user_code; $staff_code=0; }else{$dist_code=$master_code; $staff_code=$user_code;}
		$parts_filter=" and (a.dist_code=0 or a.dist_code = $dist_code)";
		?>
		<div align="right">Link to: 
			<a href="customers.php">Customers</a>
		</div>		
		<?php
		break;
	case 3:
		header( "Location: mainmenu.php" ); 
		break;
}
if ($dist_code==0) {header( "Location: mainmenu.php" );}
$err=0;
$form_action="none";
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/lib_1.php");
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/dbcon.start.php");
//***********************Buttons control***************************
//foreach ($_POST as $var => $value) { echo "$var = $value<br>n"; } 
if (isset($_POST['save']))
{	$form_action="save";
	$count = count($_POST['min_value']);
	for($i=0; $i < $count; $i++)
	{	//echo "===". "===" . $_POST['min_value'][$i] . "===" . $_POST['max_value'][$i]. "<br>";
	    if (isset($_POST['rowselector_' . $i])) {$t_assigned=1; } else { $t_assigned=0; }
		//echo "  ***". $_POST['assign_code'][$i] . ":" .$t_rowselector;
		if (($_POST['catalog_detail_code'][$i] < 1) && ($t_assigned==1))
		{	$myquery = "Insert into distributors_catalog_detail (catalog_detail_code, catalog_code,";
			$myquery.= " part_code, assigned, min_value, max_value)";
			$myquery.= " VALUES (NULL," . $_POST['catalog_code'] . ",";
			$myquery.= " " . $_POST['part_code'][$i] . ",";
			$myquery.= " $t_assigned,";
			$myquery.= " " . $_POST['min_value'][$i] . ",";
			$myquery.= " " . $_POST['max_value'][$i] . ")";
			$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
			if (!($result)) { if (mysql_errno()==1062) {$err=1;} else {errHandler(); $err=1; echo $myquery;} }
		}
		elseif (($_POST['catalog_detail_code'][$i] >= 1) && ($t_assigned==1))
		{	$myquery = "Update distributors_catalog_detail set";
			$myquery.= " assigned = $t_assigned ,";
			$myquery.= " min_value = " . $_POST['min_value'][$i] . ",";
			$myquery.= " max_value = " . $_POST['max_value'][$i];
			$myquery.= " where catalog_detail_code = " . $_POST['catalog_detail_code'][$i];
			$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
			if (!($result)) {errHandler(); $err=1; echo $myquery;} //	else {	$_SESSION["action_allowed"] = "none";}
		}
		elseif (($_POST['catalog_detail_code'][$i] >= 1) && ($t_assigned==0))
		{	$myquery = "Update distributors_catalog_detail set";
			$myquery.= " assigned = $t_assigned,";
			$myquery.= " min_value = NULL,";
			$myquery.= " max_value = NULL";
			$myquery.= " where catalog_detail_code = " . $_POST['catalog_detail_code'][$i];
			$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
			if (!($result)) {errHandler(); $err=1; echo $myquery;} //	else {	$_SESSION["action_allowed"] = "none";}
		}
		//echo $myquery;
	}
	//unset ($_POST['save']);
}

if (isset($_POST['cancel'])) {$form_action="cancel"; $_SESSION['action_allowed'] = "none";}

if ($login_option == 1) { echo "<span class='head1'>Inventory Assignment by: $user_comp</span>"; echo "<hr width=90%>";}

?> 

<form action="" method="post" name="list" onsubmit="return ValidateForm(this)">

<?php
//**********Put Cataloges drop-down here***************************************************************	
	$myquery2= "Select catalog_code, catalog_name from distributors_catalog where dist_code=$dist_code";
	$result2 = mysql_query($myquery2);
	$row2 = mysql_fetch_row($result2);
	$catalog_code = $row2[0];
	?>
	<input name="catalog_code" type="hidden" value="<?php echo $catalog_code ?>" />
<table width="253" border="0">
  <tr>
    <td width="65"  align="left" valign="baseline" >Class:</td>
    <td width="69"  align="left" valign="bottom" >Type:</td>
    <td width="66"  align="left" valign="bottom" >Category:</td>
    <td width="121" align="left" valign="bottom" >SubCategory: </td>
  </tr>

  <tr>
    <td valign="top"><div align="left">
      <select name="classes" size="1" onchange="document.list.submit();">
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
    </div></td>
    <td valign="top">
  <div align="left">
    <select name="types" size="1" onchange="document.list.submit();">
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
    </select>
  </div>  </td>
    <td valign="top"><div align="left">
      <select name="categories" size="1" onchange="document.list.submit();">
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
      </select>
    </div></td>
    <td valign="top"><div align="left">
      <select name="subcategories" size="1" onchange="document.list.submit();">
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
      </select>
    </div></td>
  </tr>
  <tr>
    <td  valign="top">&nbsp;</td>
    <td  valign="top">&nbsp;</td>
    <td  valign="top">&nbsp;</td>
    <td  valign="top">&nbsp;</td>
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
{	$myquery = "SELECT a.part_code, a.part_no, a.part_name, a.list_price,"; 
	$myquery.= " b.assigned, b.min_value, b.max_value, a.dist_code part_dist_code, b.catalog_detail_code";  
	$myquery.= " FROM parts a LEFT OUTER JOIN v_distributors_catalog b ON a.part_code = b.part_code";
	$myquery.= " and b.catalog_code = $catalog_code";
	$myquery.= " WHERE a.class_code = " . $selected_class_code;
	$myquery.= " AND   a.type_code = " . $selected_type_code;
	$myquery.= " AND   a.sub_cat_code = " . $selected_sub_cat_code;
	$myquery.= " AND ( a.dist_code=0 or a.dist_code = $dist_code)";
	$myquery.= " AND   a.active = 1";
	$myquery.= " ORDER BY part_no";	
}else
{	$myquery = "SELECT a.part_code, a.part_no, a.part_name, a.list_price,"; 
	$myquery.= " b.assigned, b.min_value, b.max_value, a.dist_code part_dist_code, b.catalog_detail_code";  
	$myquery.= " FROM parts a, v_distributors_catalog b";
	$myquery.= " WHERE a.part_code = b.part_code";
	$myquery.= " AND   b.catalog_code = $catalog_code";
	$myquery.= " AND   b.assigned = 1";
	$myquery.= " AND   a.class_code = " . $selected_class_code;
	$myquery.= " AND   a.type_code = " . $selected_type_code;
	$myquery.= " AND   a.sub_cat_code = " . $selected_sub_cat_code;
	$myquery.= " AND ( a.dist_code=0 or a.dist_code = $dist_code)";
	$myquery.= " AND   a.active = 1";
	$myquery.= " ORDER BY part_no";	
}
//echo $myquery;
//---------------Paging Header--------------------*
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/paging.header.php");
//------------------------------------------------*
$result = mysql_query($myquery." LIMIT $from, $max_results");
//$fields_num = mysql_num_fields($result);
?>
   <span class="head1">Distributor's Catalog </span>
   <input name="hidden_code" type="hidden" value="" />

<table width="743" class="listtable1" >
                    <tr class="listheader1" height="22" >
                      <td width="156"><div align="center">Part-No</div></td>
                      <td width="277"><div align="center">Part Name</div></td>
                      <td width="96"><div align="center">List-Price</div></td>
                      <td colspan="1"><div align="center">Assign</div></td>
					  <td width="78"><div align="center">Minimum</div></td>
					  <td width="78"><div align="center">Maximum</div></td>
                    </tr>
<?php  
$i=-1;
$list_bgcolor=$p_list_bgcolor_1;
while($row = mysql_fetch_row($result)) {
$i = $i + 1;
?>
  <input name="part_code[]"   type="hidden" value="<?php echo $row[0];?>" />	
  <input name="catalog_detail_code[]" type="hidden" value="<?php echo $row[8];?>" />	
  <tr height="20" bgcolor=<?php echo $list_bgcolor; ?> >
   <td ><div align="left" ><?php echo $row[1]; ?></div></td>
   <td ><div align="left" ><?php echo $row[2]; ?></div></td>
   <td ><div align="right">$<?php echo $row[3]; ?></div></td>
   <td width="48" bgcolor=<?php if ($row[7]>0) {echo $p_list_bgcolor_3;} else {echo $list_bgcolor;} ?> ><div align="center">
     <input name="rowselector_<?php echo $i?>" type="checkbox" accesskey="1" tabindex="<?php echo $i ?>"
	 <?php if ($row[4]==1) {echo ' checked';} ?>  /> 
   </div></td>
   <td >

     <div align="center">
       <input name="min_value[]" type="text" id="" accesskey="2"  size="8" maxlength="8" style="text-align: right"
	   tabindex="<?php echo $i ?>"
	   onkeypress="return onlyNumbers();"
	   value="<?php echo $row[5];?>" />
       </div></td>
   <td >
     <div align="center">
       <input name="max_value[]" type="text" id="" accesskey="3" size="8" maxlength="8" style="text-align: right"
	   tabindex="<?php echo $i ?>"
	   onkeypress="return onlyNumbers();"
	   value="<?php echo $row[6];?>" />
       </div></td></tr>
<?php 
if ($list_bgcolor == $p_list_bgcolor_1) {$list_bgcolor=$p_list_bgcolor_2;} else {$list_bgcolor=$p_list_bgcolor_1;}
} ?>
</table>
<?php if (!(($form_action=="add") || ($form_action=="rowedit"))) {
		if (($selected_type_code>0) && ($selected_class_code>0) && ($selected_cat_code>0) && ($selected_sub_cat_code>0))
			{?>
<table width="743">
 <tr>
  <td width="211" align="left" >
    <div align="left"><a href="javascript:checkAll(true)">Check All</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="javascript:checkAll(false)">Uncheck All</a>
      </div></td>
  <td width="304" align="Right" >
    <div align="center"><a href="javascript:copyMinMax()">Copy min/max to all from first row</a>
      </div></td>
  <td width="212" align="Right" ><div align="right">Show all:
      <input name="showall" type="checkbox" accesskey="100" tabindex="100" onclick="document.list.submit();"  
	  <?php if (isset($_POST['showall'])) { echo ' checked'; } ?> /> 
  </div></td>
 </tr>
</table>
<table width="127" border="0">
  <tr>
    <td><button type="submit" name="save" accesskey="1"><img src="images/bb_save.png" alt="Save all changes" ></button></td>
    <td>&nbsp;</td>
	<td><button type="submit" name="cancel" accesskey="2" 
			onclick="
				if(confirm('Are you sure, you want to cancel and reset all changes?')) {return true;} else {return false;} 
			"
			><img src="images/bb_cancel.png" alt="Cancel all changes" ></button>
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
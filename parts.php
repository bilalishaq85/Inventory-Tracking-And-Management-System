<?php ob_start(); ini_set('output_buffering','1'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_2.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script language="JavaScript" src="includes/window.js" type=text/javascript></script>
<!-- InstanceBeginEditable name="doctitle" -->
<title>External Inventory Tracking System</title>
<link href="/inventory/styles/style1.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="includes/validate.input.js" type=text/javascript></script>
<script language="javascript">
function openwindow() {
	window.open("parts.sf.assign.php?part_code=" + window.document.activeElement.value, null, newwinAttrib(720,900));
	return false;
}
function openwindow2() {
	window.open("parts.picture.php?part_code=" + window.document.activeElement.value, null, newwinAttrib(720,900));
	return false;
}
function catvalue() {return (document.list.categories.value); }
function ValidateForm(thisform) { with (thisform) {
  //alert(window.event.srcElement.parentNode.id);
  //alert(window.document.activeElement.name);
  if (window.document.activeElement.name == "cancel" ) {return true}
  if(isBlank(part_no, "'Part-No'", 3)){return false}
  if(isBlank_relax(part_name, "'Part Name'", 3)){return false}
  if(isBlank_relax2(short_desc, "'Short Description'", 0)){return false}
  if(isBlank_relax2(long_desc, "'Long Description'", 0)){return false}
  if(isBlank(industry_no, "'Industry-No'", 0)){return false}
  if(isBlank(upc_no, "'UPC-No'", 0)){return false}
  if(isBlank(uic_no, "'UIC-No'", 0)){return false}
  if(isBlank(sku_no, "'SKU-No'", 0)){return false}
  if(invalidNumeric(list_price, "'List Price'", 9999.9999, true)){return false}		  
  return true; }}
 
function getPath(){ document.forms[0].thepath.value=document.forms[0].photo2.value;}

function recallDefinition()
{	document.detail.elements['part_no'].value = document.detail.elements['o_part_no'].value;
	document.detail.elements['part_name'].value = document.detail.elements['o_part_name'].value;
	document.detail.elements['short_desc'].value = document.detail.elements['o_short_desc'].value;
	document.detail.elements['long_desc'].value = document.detail.elements['o_long_desc'].value;
	document.detail.elements['industry_no'].value = document.detail.elements['o_industry_no'].value;
	document.detail.elements['upc_no'].value = document.detail.elements['o_upc_no'].value;
	document.detail.elements['uic_no'].value = document.detail.elements['o_uic_no'].value;
	document.detail.elements['sku_no'].value = document.detail.elements['o_sku_no'].value;
	document.detail.elements['list_price'].value = document.detail.elements['o_list_price'].value;
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
//foreach ($_POST as $var => $value) { echo "$var = $value<br>n"; } 
$parts_filter="";
$dist_code=0;
switch($login_option){
	case 1:
		If ($p_dist_part_filter==0) {$parts_filter="";} else {$parts_filter=" and dist_code < 1";}
		?>
		<div align="right">Link to: 
			<a href="classes.php">Classes</a>
			<a href="types.php">Types</a>
			<a href="categories.php">Categories</a>
			<a href="sub_categories.php">SubCategories</a>
			<a href="sfname.def.php">SF-Names</a>
			<a href="catalog.view.php">Catalog</a>
		</div>		
		<?php
		break;
	case 2:
		if ($master_code==$user_code ){$dist_code=$user_code; $staff_code=0; }else{$dist_code=0; $staff_code=$user_code;}
		//if ($master_code==$user_code ){$dist_code=$user_code; $staff_code=0; }else{$dist_code=$master_code; $staff_code=$user_code;}
		$parts_filter=" and dist_code = $dist_code";
		break;
	case 3:
		header( "Location: mainmenu.php" ); 
		break;
}
$err=0;
$form_action="none";
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/lib_1.php");
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/dbcon.start.php");
//***********************Buttons control***************************
if ((isset($_POST['save'])) && ($_SESSION['action_allowed'] == "save"))
{	$form_action="save";
	if (isset($_POST['active'])) {$active2=1;} else {$active2=0;} 
	$myquery = "Insert into parts (part_code, part_no, part_name, short_desc, long_desc, industry_no, upc_no, uic_no, sku_no, ";
	$myquery.= " list_price, class_code, type_code, sub_cat_code, active, dist_code)";
	$myquery.= " VALUES (NULL , '".$_POST['part_no']."', '".$_POST['part_name']."', '";
	$myquery.= mysql_real_escape_string($_POST['short_desc'])."', '";
	$myquery.= mysql_real_escape_string($_POST['long_desc']). "', '";
	$myquery.= $_POST['industry_no']. "', '" .$_POST['upc_no']. "', '";
	$myquery.=  $_POST['uic_no']. "', '".$_POST['sku_no']."', '" .$_POST['list_price']. "', '";
	$myquery.=  $_POST['classes']. "', '".$_POST['types']."', '" .$_POST['subcategories']. "', ";
	$myquery.=  " $active2, $dist_code )";
	$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
	if (!($result)) {errHandler(); $_POST['add']=true; $err=1;}
	else
	{	$_SESSION['action_allowed'] = "none";
		//**********Getting new assigned part-code********************************
		$myquery = " Select part_code, part_no from parts where part_no='".$_POST['part_no']."'";
		$result = mysql_query($myquery) or die('Error: ' . mysql_error());
		$row = mysql_fetch_row($result) or die('Error: ' . mysql_error());
		$t_part_code=$row[0];
		//**********Adding all special field name(s) to new part*******************
		if ($_POST['o_part_code'] > 0)
		{	$myquery = "Insert into parts_specs (sfv_code, part_code, sf_code, sf_value) ";
			$myquery.= " select NULL, ".$t_part_code.", sf_code, sf_value from parts_specs where part_code =".$_POST['o_part_code'];
		}
		else
		{	$myquery = "Insert into parts_specs (sfv_code, part_code, sf_code, sf_value) ";
			$myquery.= " select NULL, ".$t_part_code.", sf_code, NULL from sf_name_def where sub_cat_code =".$_POST['subcategories'];
		}
		$result = mysql_query($myquery); 
		if (!($result)) {errHandler();}
		//**********Adding part log's info*****************************************
		if ($login_option > 1)
		{	$myquery = " Insert into parts_log (log_code, part_code, dist_code, staff_code, action)";
			$myquery.= " VALUES (NULL, ".$t_part_code.", $dist_code, $staff_code, 1)";
			$result = mysql_query($myquery);
			if (!($result)) {errHandler();}
		}
	}
}

if ((isset($_POST['save2'])) && ($_SESSION["action_allowed"] == "save2"))
{	$form_action="save2";
	if (isset($_POST['active'])) {$active2=1;} else {$active2=0;} 
	$myquery = "Update parts set ";
	$myquery.= " part_no = '" . $_POST['part_no'] . "' ,"; 
	$myquery.= " part_name = '". mysql_real_escape_string($_POST['part_name']) . "' ,"; 
	$myquery.= " short_desc = '". mysql_real_escape_string($_POST['short_desc']) ."' ,";
	$myquery.= " long_desc = '". mysql_real_escape_string($_POST['long_desc']) ."' ,";
	$myquery.= " industry_no = '".$_POST['industry_no']."' ,";
	$myquery.= " upc_no = '".$_POST['upc_no']."' ,";
	$myquery.= " uic_no = '".$_POST['uic_no']."' ,";
	$myquery.= " sku_no = '".$_POST['sku_no']."' ,";
	$myquery.= " list_price = '".$_POST['list_price']."' ,";
	$myquery.= " active = $active2";
	$myquery.= " where part_code in ( ".$_POST['hidden_code']." )";	
	$result = mysql_query($myquery); //or die('Error: ' . mysql_error());
	if (!($result)) {errHandler();	$_POST['rowedit_x']=true; $err=2;}
	else 
	{	$_SESSION['action_allowed'] = "none";
		if ($login_option > 1)
		{	$myquery = " Insert into parts_log (log_code, part_code, dist_code, staff_code, action)";
			$myquery.= " VALUES (NULL, ".$_POST['hidden_code'].", $dist_code, $staff_code, 2)";
			$result = mysql_query($myquery) or die('Error: ' . mysql_error());	
		}
	}
}

if (isset($_POST['cancel'])) {$form_action="cancel"; $_SESSION['action_allowed'] = "none";}

if (isset($_POST['delete'])) 
{	$form_action="delete"; 
	//echo $form_action;
	$delete_list="";
	for ( $j=0; $j < $p_max_rows; $j += 1) {if (isset($_POST['rowselector_'.$j])) {$delete_list .= $_POST['rowselector_'.$j] . " , ";}}
	$myquery = "Delete from parts where part_code in (" . $delete_list . "0)";  
	$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
	if (!($result)) {errHandler();	$err=3;}
	else
	{	if (($login_option > 1) && !($delete_list == ""))
		{	for ( $j = 1; $j <= $p_max_rows; $j += 1)
			{	if (isset($_POST['rowselector_'.$j]))
				{	$myquery = " Insert into parts_log (log_code, part_code, dist_code, staff_code, action)";
					$myquery.= " VALUES (NULL, ".$_POST['rowselector_'.$j].", $dist_code, $staff_code, 3)";
					//$result = mysql_query($myquery) or die('Error: ' . mysql_error());
				}	
			}
		}
	}
}

if (isset($_POST['rowdelete_x'])) 
{	$form_action="rowdelete";
	$myquery = "Delete from parts where part_code in ( " . $_POST['hidden_code'] . " )";
	$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
	if (!($result)) {errHandler();	$err=4;}
	else
	{	if ($login_option > 1)
		{	$myquery = " Insert into parts_log (log_code, part_code, dist_code, staff_code, action)";
			$myquery.= " VALUES (NULL, " . $_POST['hidden_code'] . ", $dist_code, $staff_code, 3)";
			//$result = mysql_query($myquery) or die('Error: ' . mysql_error());	
		}
	}
}
//*********************************************
if (isset($_POST['add'])) 
{	$_SESSION['action_allowed'] = "save";
	$form_action="add";
	//*****new code for same old part*********
	$myquery = "Select part_code, part_no, part_name, short_desc, long_desc, industry_no, upc_no, uic_no, sku_no,";
	$myquery.= " list_price";
	$myquery.= " from parts";
	$myquery.= " where part_code = (";
	$myquery.= " Select max(part_code) from parts";
	$myquery.= " Where class_code=" . $_POST['classes'];
	$myquery.= " And type_code=" . $_POST['types'];
	$myquery.= " And sub_cat_code=" . $_POST['subcategories']; 
	$myquery.= " And dist_code = 0 )";
	$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
	if (!($result)) {errHandler(); $_POST['rowedit_x']=false; $form_action="";$err=10;}
	else {$row = mysql_fetch_row($result);}
	?>
 <form action="" method="post" name="detail" onsubmit="return ValidateForm(this)">
	  <input name="o_part_code" type="hidden" value="<?php echo $row[0]; ?>" /> 
	  <input name="o_part_no" type="hidden" value="<?php echo $row[1]; ?>" /> 		
  	  <input name="o_part_name" type="hidden" value="<?php echo $row[2]; ?>" /> 		
  	  <input name="o_short_desc" type="hidden" value="<?php echo $row[3]; ?>" /> 		
	  <input name="o_long_desc" type="hidden" value="<?php echo $row[4]; ?>" /> 		
	  <input name="o_industry_no" type="hidden" value="<?php echo $row[5]; ?>" />
	  <input name="o_upc_no" type="hidden" value="<?php echo $row[6]; ?>" />
	  <input name="o_uic_no" type="hidden" value="<?php echo $row[7]; ?>" /> 		 		 		
	  <input name="o_sku_no" type="hidden" value="<?php echo $row[8]; ?>" /> 		
	  <input name="o_list_price" type="hidden" value="<?php echo $row[9]; ?>" /> 		
 
  <input name="classes" type="hidden" value="<?php echo $_POST['classes']; ?>" />
  <input name="types" type="hidden" value="<?php echo $_POST['types']; ?>" />
  <input name="categories" type="hidden" value="<?php echo $_POST['categories']; ?>" />
  <input name="subcategories" type="hidden" value="<?php echo $_POST['subcategories']; ?>" />
  <span class="head1">New Part Definition</span>
	<table width="507" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
  <tr>
    <td width="141"><div align="right">Part-No :</div></td>
    <td colspan="3"><div align="left">
      <input name="part_no" type="text" id="part_no" accesskey="1" tabindex="1" size="22" maxlength="20" 
	  value = "<?php if ($err != 0 ) {echo $_POST['part_no'];} ?>" />
    </div></td>
    </tr>
  <tr>
    <td><div align="right">Part Name :</div></td>
    <td colspan="3"><div align="left">
      <input name="part_name" type="text" id="part_name" accesskey="2" tabindex="2" size="35" maxlength="50" 
	  value = "<?php if ($err != 0 ) {echo htmlentities($_POST['part_name']);} ?>" />
    </div></td>
    </tr>
  <tr>
    <td><div align="right">Short Description :</div></td>
    <td colspan="3"><div align="left">
      <input name="short_desc" type="text" id="short_desc" accesskey="3" tabindex="3" size="47" maxlength="50" 
	  value = "<?php if ($err != 0 ) {echo htmlentities($_POST['short_desc']);} ?>" />
    </div></td>
    </tr>
  <tr>
    <td><div align="right">Long Description :</div></td>
    <td colspan="3"><div align="left">
      <input name="long_desc" type="text" id="long_desc" accesskey="4" tabindex="4" size="60" maxlength="100" 
	  value = "<?php if ($err != 0 ) {echo htmlentities($_POST['long_desc']);} ?>" />
    </div></td>
    </tr>
  
  <tr>
    <td><div align="right">Industry-No:</div></td>
    <td width="134"><input name="industry_no" type="text" id="industry_no" accesskey="5" tabindex="5" size="22" maxlength="30" 
	value = "<?php if ($err != 0 ) {echo $_POST['industry_no'];} ?>" /></td>
	
    <td width="73"><div align="right">UPC-No :</div></td>
    <td width="159"><input name="upc_no" type="text" id="upc_no" accesskey="6" tabindex="6" size="22" maxlength="30" 
	value = "<?php if ($err != 0 ) {echo $_POST['upc_no'];} ?>" /></td>
    </tr>
  <tr>
    <td><div align="right">UIC-No : </div></td>
    <td><div align="left">
      <input name="uic_no" type="text" id="uic_no" accesskey="7" tabindex="7" size="22" maxlength="30" 
	  value = "<?php if ($err != 0 ) {echo $_POST['uic_no'];} ?>" />
    </div></td>
    <td><div align="right">SKU-No :</div></td>
    <td><div align="left">
      <input name="sku_no" type="text" id="sku_no" accesskey="8" tabindex="8" size="22" maxlength="30" 
	  value = "<?php if ($err != 0 ) {echo $_POST['sku_no'];} ?>" />
    </div></td>
    </tr>
  <tr>
    <td><div align="right">List Price : </div></td>
    <td colspan="1">
      <div align="left">
        <input name="list_price" type="text" id="list_price" accesskey="9" tabindex="9" size="22" maxlength="9" 
	  value = "<?php if ($err != 0 ) {echo $_POST['list_price'];} ?>" />
        </div></td>
	<td><div align="right">Active : </div></td>
	<td><div align="left">
	  <input name="active" type="checkbox" id="active" accesskey="10" tabindex="10"
	  	<?php if ($err != 0 ) {if (isset($_POST['active'])) {echo ' checked'; } } else {echo ' checked';} ?> />
	  </div></td>
    </tr>
</table>
<?php if ($login_option ==1) { ?>
<table width="514" border="0">
  <tr>
    <td width="508"><div align="right"><a href="javascript:recallDefinition()">Recall last part definition</a></div></td>
  </tr>
</table>
<?php } ?>
<table width="118" border="0">
  <tr>
    <td width="50" height="5"></td>
    <td width="10"></td>
    <td width="53"></td>
  </tr>
  <tr>
    <td><button type="submit" name="save" accesskey="1" tabindex="10"  ><img src="images/bb_save.png" alt="Save row" ></button></td>
    <td>&nbsp;</td>
	<td><button type="submit" name="cancel" accesskey="2" tabindex="11" ><img src="images/bb_cancel.png" alt="Cancel new" ></button></td>
  </tr>
</table>
</form>
<hr width=90%>
<?php
	} 
//************************************************
if (isset($_POST['rowedit_x']))   
{	$form_action="rowedit";
	//echo $_POST['hidden_code'];
	$myquery = "Select part_code, part_no, part_name, short_desc, long_desc, industry_no, upc_no, uic_no, sku_no,";
	$myquery.= " list_price, class_code, type_code, sub_cat_code, active, dist_code";
	$myquery.= " from parts";
	$myquery.= " where part_code in ( " . $_POST['hidden_code'] . " )";
	$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
	if (!($result)) {errHandler(); $_POST['rowedit_x']=false; $form_action="";$err=5;}
	else {
		$row = mysql_fetch_row($result) or die('Error: ' . mysql_error());
		if (!($row)) {errHandler(); $_POST['rowedit_x']=false; $form_action="";$err=6;}
		else { 	$_SESSION['action_allowed'] = "save2";
				if ($row[14]>0) {
				$myquery2 = "Select dist_id, dist_name from distributors";
				$myquery2.=	" Where dist_code = " . $row[14];
				$result2 =  mysql_query($myquery2);
				if (!($result2)) {errHandler();}
				else{	$row2 = mysql_fetch_row($result2);
						echo "<br><div class='display2'>!!! Part owned by: " . $row2[1] . " (" . $row2[0] . ") !!!</div>";}}

//	$result = mysql_query($myquery) or die('Error: ' . mysql_error());
//	$row = mysql_fetch_row($result) or die('Error: ' . mysql_error());
//	

	?>
  <form action="" method="post" name="detail" onsubmit="return ValidateForm(this)">
  <input name="hidden_code" type="hidden" value="<?php echo $row[0]; ?>" />
  <input name="classes" type="hidden" value="<?php echo $_POST['classes']; ?>" />
  <input name="types" type="hidden" value="<?php echo $_POST['types']; ?>" />
  <input name="categories" type="hidden" value="<?php echo $_POST['categories']; ?>" />
  <input name="subcategories" type="hidden" value="<?php echo $_POST['subcategories']; ?>" />

  <span class="head1">Edit Part Definition</span>
	<table width="507" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
  <tr>
    <td width="141"><div align="right">Part-No :</div></td>
    <td colspan="3"><div align="left">
      <input name="part_no" type="text" id="part_no" accesskey="1" tabindex="1" size="22" maxlength="20" 
	  value="<?php if ($err == 0 ) {echo $row[1];} else { echo $_POST['part_no'];} ?>" />
    </div></td>
    </tr>
  <tr>
    <td><div align="right">Part Name :</div></td>
    <td colspan="3"><div align="left">
      <input name="part_name" type="text" id="part_name" accesskey="2" tabindex="2" size="35" maxlength="50" 
	  value="<?php if ($err == 0 ) {echo htmlentities($row[2]);} else {echo htmlentities($_POST['part_name']);} ?>" />
    </div></td>
    </tr>
  <tr>
    <td><div align="right">Short Description :</div></td>
    <td colspan="3"><div align="left">
      <input name="short_desc" type="text" id="short_desc" accesskey="3" tabindex="3"  size="47" maxlength="50" 
	  value="<?php if ($err == 0 ) {echo htmlentities($row[3]);} else {echo htmlentities($_POST['short_desc']);}?>" />
    </div></td>
    </tr>
  <tr>
    <td><div align="right">Long Description :</div></td>
    <td colspan="3"><div align="left">
      <input name="long_desc" type="text" id="long_desc" accesskey="4" tabindex="4" size="60" maxlength="100" 
	  value="<?php if ($err == 0 ) {echo htmlentities($row[4]);} else {echo htmlentities($_POST['long_desc']);} ?>" />
    </div></td>
    </tr>
  
  <tr>
    <td><div align="right">Industry-No:</div></td>
    <td width="134"><input name="industry_no" type="text" id="industry_no" accesskey="5" tabindex="5" size="22" maxlength="30" 
	value="<?php if ($err == 0 ) {echo $row[5];} else {echo $_POST['industry_no'];} ?>" /></td>
    <td width="73"><div align="right">UPC-No :</div></td>
    <td width="159"><input name="upc_no" type="text" id="upc_no" accesskey="6" tabindex="6" size="22" maxlength="30" 
	value="<?php if ($err == 0 ) {echo $row[6];} else {echo $_POST['upc_no'];} ?>" /></td>
    </tr>
  <tr>
    <td><div align="right">UIC-No : </div></td>
    <td><div align="left">
      <input name="uic_no" type="text" id="uic_no" accesskey="7" tabindex="7" size="22" maxlength="30" 
	  value="<?php if ($err == 0 ) {echo $row[7];} else {echo $_POST['uic_no'];} ?>" />
    </div></td>
    <td><div align="right">SKU-No :</div></td>
    <td><div align="left">
      <input name="sku_no" type="text" id="sku_no" accesskey="8" tabindex="8" size="22" maxlength="30" 
	  value="<?php if ($err == 0 ) {echo $row[8];} else {echo $_POST['sku_no'];} ?>" />
    </div></td>
    </tr>
  <tr>
    <td><div align="right">List Price : </div></td>
    <td colspan="1"><div align="left">
      <input name="list_price" type="text" id="list_price" accesskey="9" tabindex="9" size="22" maxlength="9" 
	  value="<?php if ($err == 0 ) {echo $row[9];} else {echo $_POST['list_price'];} ?>" />
    </div></td>
	<td><div align="right">Active:</div></td>
	<td><div align="left">
	  <input name="active" type="checkbox" id="active" accesskey="10" tabindex="10"
	  	<?php if ($err == 0 ) {if ($row[13]==1) {echo ' checked'; } }
			  else			{if (isset($_POST['active'])) {echo ' checked'; } } ?>
	  />
	  </div></td>
    </tr>
</table>
<table width="118" border="0">
  <tr>
    <td width="50" height="5"></td>
    <td width="10"></td>
    <td width="53"></td>
  </tr>
  <tr>
    <td><button type="submit" name="save2" accesskey="1"  ><img src="images/bb_save.png" alt="Save changes" ></button></td>
    <td>&nbsp;</td>
	<td><button type="submit" name="cancel" accesskey="2" ><img src="images/bb_cancel.png" alt="Cancel edit" ></button></td>
  </tr>
</table>
</form>
<hr width=90%>
	
<?php 
		}
	}
} 

if ($dist_code > 0) { echo "<span class='head1'>Exclusive Inventory for: $user_comp</span>"; echo "<hr width=90%>";}

?> 
<form action="" method="post" name="list">
<table width="248" border="0">
  <tr>
    <td width="45"><div align="left">Class:</div></td>
    <td width="43"><div align="left">Type:</div></td>
    <td width="68"><div align="left">Category:</div></td>
    <td width="158"><div align="left">SubCategory:</div></td>
  </tr>

  <tr><td valign="top">
  <div align="left">
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
  </div>
  </td>
    <td valign="top"><div align="left">
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
    </div></td>
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

$myquery = "SELECT part_code, part_no, part_name, list_price, active, dist_code";
$myquery.= " FROM parts";
$myquery.= " where class_code = " . $selected_class_code;
$myquery.= " and   type_code = " . $selected_type_code;
$myquery.= " and   sub_cat_code = " . $selected_sub_cat_code;
$myquery.= $parts_filter;
$myquery.= " order by part_no"; 
//$myquery;
//---------------Paging Header--------------------*
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/paging.header.php");
//------------------------------------------------*
$result = mysql_query($myquery." LIMIT $from, $max_results");
//$fields_num = mysql_num_fields($result);
?>
   <span class="head1">Inventory Parts</span>
   <input name="hidden_code" type="hidden" value="" />

<table width="780" class="listtable1">
                    <tr class="listheader1" height="22" >
                      <td colspan="5"><div align="center">Action</div></td>
                      <td width="179"><div align="center">Part-No</div></td>
                      <td width="317"><div align="center">Part Name</div></td>
                      <td width="98"><div align="center">List-Price</div></td>
                      <td width="45"> <div align="center">Active </div></td>
                    </tr>
<?php  
$i=-1;
$list_bgcolor=$p_list_bgcolor_1;
while($row = mysql_fetch_row($result)) {
$i = $i + 1;
?>
  <tr height="20" bgcolor=<?php echo $list_bgcolor; ?> >
   <td width="21" bgcolor=<?php if ($row[5]>0) {echo $p_list_bgcolor_3;} else {echo $list_bgcolor;} ?> ><div align="center">
     <input name="rowselector_<?php echo $i ?>" type="checkbox" value="<?php echo $row[0] ?>"  /> 
   </div></td>
   <td width="21" bgcolor=<?php if ($row[5]>0) {echo $p_list_bgcolor_3;} else {echo $list_bgcolor;} ?> >
			<div align="center">
			  <input name="rowedit"  type="image" src="images/b_edit.png" alt="Edit current" value="<?php echo $row[0] ?>" 
			onclick="hidden_code.value=window.document.activeElement.value" >   
			  </div></td>
   <td width="21" bgcolor=<?php if ($row[5]>0) {echo $p_list_bgcolor_3;} else {echo $list_bgcolor;} ?> >
   			<div align="center">
   			  <input name="rowdelete"  type="image" src="images/b_drop.png" alt="Delete current" value="<?php echo $row[0] ?>" 
			onclick="hidden_code.value=window.document.activeElement.value;
			if(confirm('Are you sure, you want to delete selected row?')) return true; else return false;" >	
 			  </div></td>
   <td width="21" bgcolor=<?php if ($row[5]>0) {echo $p_list_bgcolor_3;} else {echo $list_bgcolor;} ?> >
   			<div align="center">
   			  <input name="sfname"  type="image" src="images/b_property.png" alt="Special-Field Name Assignment" 
			value="<?php echo $row[0] ?>" onclick="openwindow(); return false;" >	
 			  </div></td>
   <td width="21" bgcolor=<?php if ($row[5]>0) {echo $p_list_bgcolor_3;} else {echo $list_bgcolor;} ?> >
   			<div align="center">
   			  <input name="partdetail"  type="image" src="images/b_photo.png" alt="Details & Photos" 
			value="<?php echo $row[0] ?>" onclick="openwindow2(); return false;" >	
 			  </div></td>   
   <td ><div align="left" ><?php echo $row[1]; ?></div></td>
   <td ><div align="left" ><?php echo $row[2]; ?></div></td>
   <td ><div align="right">$<?php echo $row[3]; ?></div></td>
   <td ><div align="center" ><?php echo iif($row[4]==1,'Yes', 'No'); ?></div></td>
  </tr>
<?php 
if ($list_bgcolor == $p_list_bgcolor_1) {$list_bgcolor=$p_list_bgcolor_2;} else {$list_bgcolor=$p_list_bgcolor_1;}
} ?>
</table>
<?php if (!(($form_action=="add") || ($form_action=="rowedit"))) {
		if (($selected_type_code>0) && ($selected_class_code>0) && ($selected_cat_code>0) && ($selected_sub_cat_code>0))
			{?>
<table width="783">
  <tr>	<td align="left" >
 <a href="javascript:checkAll(true)">Check All</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="javascript:checkAll(false)">Uncheck All</a></td></tr>
</table>
<table width="127" border="0">
  <tr>
    <td><button type="submit" name="add" accesskey="1"><img src="images/bb_add.png" alt="Add new row" ></button></td>
    <td>&nbsp;</td>
	<td><button type="submit" name="delete" accesskey="2" 
			onclick="
			if(rowsSelected()){
				if(confirm('Are you sure, you want to delete selected row(s)?')) return true; else return false;} 
			else {return false;}
			"
			><img src="images/bb_drop.png" alt="Delete selected row(s)" ></button>
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
} else { echo "In order to define a Part, you have to have at least one Class, Type, Category and a Sub-Category already defined ...";}	
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
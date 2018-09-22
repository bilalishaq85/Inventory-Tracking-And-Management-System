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
function openwindow() {
	window.open("distributors.picture.php?dist_code=" + window.document.activeElement.value, null, newwinAttrib(660,900));
	return false;
}
function ValidateForm(thisform) { with (thisform) {
  //alert(window.event.srcElement.parentNode.id);
  //alert(window.document.activeElement.name);
  if (window.document.activeElement.name == "cancel" ) {return true}
  if(isBlank(dist_name, "'Distributor Name'", 3)){return false}
  if(isBlank(contact_name, "'Contact Person'", 3)){return false}
  if(isBlank_relax(add_street, "'Street Address'", 3)){return false}
  if(isBlank_relax(add_city, "'City'", 3)){return false}
  if(isBlank_relax(add_state, "'State'", 2)){return false}
  if(isBlank_relax(add_country, "'Country'", 3)){return false}
  if(isBlank(add_postal_code, "'Postal Code'", 3)){return false}
  //if(invalidString_relax(paypal_email, "'Paypal Email'", 3)){return false}
  if(invalidEmail(paypal_email, "'Paypal Email'", false)){return false}
  if(isBlank(dist_id, "'Login-ID'", 3)){return false}
  if(isBlank(dist_pwd, "'Password'", 3)){return false}
  if(invalidNumeric(free_ac_qty, "'Free A/C Quantity'", 9999, true)){return false}		  
  if(invalidNumeric(padi_ac_charge, "'Padi A/C Monthly Charge'", 99999.99, true)){return false}		  
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
$err=0;
$form_action="none";
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/dbcon.start.php");
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/lib_1.php");
switch($login_option){
	case 1:
		//echo "<div align='right'>Link to: <a href='distributors.staff.php'>Distributors-Staff</a></div>";
		break;
	case 2:
		header( "Location: mainmenu.php" ); 
		break;
	case 3:
		header( "Location: mainmenu.php" ); 
		break;
}
if (isset($_POST['selectdistributor_x'])) 
{	if ($s_dist_code != $_POST["hidden_code"])
	{	$_SESSION["s_dist_code"] = $_POST["hidden_code"];
		$_SESSION["s_dist_name"] = getDistName($_POST["hidden_code"]);
		$_SESSION["s_cust_code"] = 0;
		$_SESSION["s_cust_name"] = "";
	}
	header( "Location: mainmenu.php" ); 
	//header( "Location: distributors.staff.php?h_code=".$_POST['hidden_code']);
}
//if (isset($_POST['distcust_x']))  {header( "Location: customers.php?h_code=".$_POST['hidden_code']);}
//***********************Buttons control***************************
//foreach ($_POST as $var => $value) { echo "$var = $value<br>n"; } 

if ((isset($_POST['save'])) && ($_SESSION['action_allowed'] == "save"))
{	$form_action="save";
	if (isset($_POST['billing'])) {$billing2=1;} else {$billing2=0;} 
	$myquery = "Select staff_code, staff_id from distributors_staff where staff_id ='" . $_POST['dist_id'] . "'";
	$count = mysql_num_rows(mysql_query($myquery));
	if ($count>0){errHandler(1062); $_POST['add']=true; $err=1;}
	else
	{	$myquery = "Insert into distributors (dist_code, dist_id, dist_pwd, dist_name, contact_name, add_street, add_city,";
		$myquery.= " add_state, add_country, add_postal_code, billing, paypal_email, free_ac_qty, padi_ac_charge)";
		$myquery.= " VALUES (NULL , '".$_POST['dist_id']."', '".$_POST['dist_pwd']."', ";
		$myquery.= "'".$_POST['dist_name']."', '".$_POST['contact_name']."', '".$_POST['add_street']."', ";
		$myquery.= "'".$_POST['add_city']."', '".$_POST['add_state']."', '".$_POST['add_country']."', ";    
		$myquery.= "'".$_POST['add_postal_code']."', '". $billing2 ."', ";
		$myquery.= "'" .$_POST['paypal_email']."', ";
		$myquery.= "'" .$_POST['free_ac_qty']."', ";
		$myquery.= "'" .$_POST['padi_ac_charge']."')";    
		$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
		if (!($result)) {errHandler(); $_POST['add']=true; $err=1;}
		else 
		{	$_SESSION['action_allowed'] = "none";
			$myquery = "Select dist_code from distributors where dist_id='".$_POST['dist_id']."'";
			$result = mysql_query($myquery);
			$row = mysql_fetch_row($result);
			$myquery2 = " Insert into distributors_catalog (catalog_code, catalog_name, dist_code)";
			$myquery2.= " values (NULL, 'Catalog-1'," . $row[0] . ")";
			$result = mysql_query($myquery2);
			//echo "Query done";
		}
	}
}

if ((isset($_POST['save2'])) && ($_SESSION["action_allowed"] == "save2"))
{	$form_action="save2";
	if (isset($_POST['billing'])) {$billing2=1;} else {$billing2=0;}
	$myquery = "Select staff_code, staff_id from distributors_staff where staff_id ='" . $_POST['dist_id'] . "'";
	$count = mysql_num_rows(mysql_query($myquery));
	if ($count>0){errHandler(1062); $_POST['rowedit_x']=true; $err=2;}
	else
	{	$myquery = "Update distributors set ";
		$myquery.= " dist_id = '" . $_POST['dist_id'] . "' ,"; 
		$myquery.= " dist_pwd = '".$_POST['dist_pwd']."' ,";
		$myquery.= " dist_name = '".$_POST['dist_name']."' ,";
		$myquery.= " contact_name = '".$_POST['contact_name']."' ,";
		$myquery.= " add_street = '".$_POST['add_street']."' ,";
		$myquery.= " add_city = '".$_POST['add_city']."' ,";
		$myquery.= " add_state = '".$_POST['add_state']."' ,";
		$myquery.= " add_country = '".$_POST['add_country']."' ,";
		$myquery.= " add_postal_code = '".$_POST['add_postal_code']."' ,";
		$myquery.= " billing = '".$billing2."' ,";
		$myquery.= " paypal_email = '".$_POST['paypal_email']."', ";
		$myquery.= " free_ac_qty = '".$_POST['free_ac_qty']."', ";
		$myquery.= " padi_ac_charge = '".$_POST['padi_ac_charge']."' ";
		$myquery.= " where dist_code in ( " . $_POST['hidden_code'] . " )";
		$result = mysql_query($myquery); //or die('Error: ' . mysql_error());
		if (!($result)) {errHandler();	$_POST['rowedit_x']=true; $err=2;}
		else {$_SESSION['action_allowed'] = "none";}
	}
}

if (isset($_POST['cancel'])) {$form_action="cancel"; $_SESSION['action_allowed'] = "none";}

if (isset($_POST['delete'])) 
{	$form_action="delete"; 
	//echo $form_action;
	$delete_list="";
	for ( $j=0; $j < $p_max_rows; $j += 1) {if (isset($_POST['rowselector_'.$j])) {$delete_list .= $_POST['rowselector_'.$j] . " , ";}}
	$myquery = "Delete from distributors where dist_code in (" . $delete_list . "0)";  
	$result = mysql_query($myquery); //or die('Error: ' . mysql_error());
	if (!($result)) {errHandler(); $_POST['delete']=false; $err=3;}
	else { 
		$delete_list = "0, " . $delete_list;
		if (strpos($delete_list, strval($s_dist_code)) > 0) {$_SESSION["s_dist_code"]=0; $_SESSION["s_cust_code"]=0;} 
	}
}

if (isset($_POST['rowdelete_x'])) 
{	$form_action="rowdelete";
	$myquery = "Delete from distributors where dist_code in ( " . $_POST['hidden_code'] . " )";
	//echo $myquery;
	$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
	if (!($result)) {errHandler();	$err=4;}
	else {if ($_POST["hidden_code"] == $s_dist_code) {$_SESSION["s_dist_code"]=0; $_SESSION["s_cust_code"]=0;}
	}
}
//***********************************************
if (isset($_POST['add'])) 
{	$_SESSION['action_allowed'] = "save";
	$form_action="add";
	?>
                         
<form action="" method="post" name="detail" onsubmit="return ValidateForm(this)">
  <span class="head1">New Distributor Definition</span>
	<table width="539" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
  <tr>
    <td width="206"><div align="right">Distributor-Name:</div></td>
    <td colspan="3"><div align="left">
      <input name="dist_name" type="text" id="dist_name" accesskey="1" tabindex="1" size="50" maxlength="50" 
	  value="<?php if ($err != 0 ) {echo $_POST['dist_name'];} ?>" />
    </div></td>
  </tr>
  <tr>
    <td><div align="right">Contact Person :</div></td>
    <td colspan="3"><div align="left">
      <input name="contact_name" type="text" id="contact_name" accesskey="2" tabindex="2" size="50" maxlength="30" 
	  value="<?php if ($err != 0 ) {echo $_POST['contact_name'];} ?>" />
    </div></td>
  </tr>
  <tr>
    <td><div align="right">Street Address: </div></td>
    <td colspan="3"><div align="left">
      <input name="add_street" type="text" id="add_street" accesskey="3" tabindex="3" size="50" maxlength="100" 
	  value="<?php if ($err != 0 ) {echo $_POST['add_street'];} ?>" />
    </div></td>
  </tr>
  <tr>
    <td><div align="right">City :</div></td>
    <td width="100"><div align="left">
      <input name="add_city" type="text" id="add_city" accesskey="4" tabindex="4" size="15" maxlength="15" 
	  value="<?php if ($err != 0 ) {echo $_POST['add_city'];} ?>" />
    </div></td>
    <td width="94"><div align="right">State :</div></td>
    <td width="139"><div align="left">
      <input name="add_state" type="text" id="add_state" accesskey="5" tabindex="5" size="15" maxlength="15" 
	  value="<?php if ($err != 0 ) {echo $_POST['add_state'];} ?>" />
    </div></td>
  </tr>
  <tr>
    <td><div align="right">Country :</div></td>
    <td><div align="left">
      <input name="add_country" type="text" id="add_country" accesskey="6" tabindex="6" size="15" maxlength="15" 
	  value="<?php if ($err != 0 ) {echo $_POST['add_country'];} ?>" />
    </div></td>
    <td><div align="right">Postal Code :</div></td>
    <td><div align="left">
      <input name="add_postal_code" type="text" id="add_postal_code" accesskey="7" tabindex="7" size="15" maxlength="15" 
	  value="<?php if ($err != 0 ) {echo $_POST['add_postal_code'];} ?>" />
    </div></td>
  </tr>
  <tr>
    <td><div align="right">Paypal Email : </div></td>
    <td colspan="3"><div align="left">
      <input name="paypal_email" type="text" id="paypal_email" accesskey="8" tabindex="8" size="50" maxlength="50" 
	  value="<?php if ($err != 0 ) {echo $_POST['paypal_email'];} ?>" />
    </div></td>
  </tr>
  <tr>
    <td><div align="right">Login-ID :</div></td>
    <td><div align="left">
      <input name="dist_id" type="text" id="dist_id" accesskey="9" tabindex="9" size="15" maxlength="20" 
	  value="<?php if ($err != 0 ) {echo $_POST['dist_id'];} ?>" />
    </div></td>
    <td><div align="right">Password :</div></td>
    <td><div align="left">
      <input name="dist_pwd" type="password" id="dist_pwd" accesskey="10" tabindex="10" size="15" maxlength="10" 
	  value="<?php if ($err != 0 ) {echo $_POST['dist_pwd'];} ?>" />
    </div></td>
  </tr>
  <tr>
    <td><div align="right">Free A/C Quantity : </div></td>
    <td ><div align="left">
      <input name="free_ac_qty" type="text" id="free_ac_qty" accesskey="11" tabindex="11" size="15" maxlength="20" 
	  value="<?php if ($err != 0 ) {echo $_POST['free_ac_qty'];} ?>" />
    </div></td>
	<td > <div align="right"> Billing : </div></td>
	<td ><div align="left">
	  <input name="billing" type="checkbox" accesskey="12" tabindex="12" 
	  <?php if ($err != 0 ) {if (isset($_POST['billing'])) {echo ' checked'; } } ?> />
	</div></td>
  </tr>
  <tr>
    <td><div align="right">Padi A/C Monthly Charge : </div></td>
    <td colspan="3"><div align="left">
      <input name="padi_ac_charge" type="text" id="padi_ac_charge" accesskey="13" tabindex="13" size="15" maxlength="20" 
	  value="<?php if ($err != 0 ) {echo $_POST['padi_ac_charge'];} ?>" />
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
    <td><button type="submit" name="save" accesskey="12"  ><img src="images/bb_save.png" alt="Save row" ></button></td>
    <td>&nbsp;</td>
	<td><button type="submit" name="cancel" accesskey="13" ><img src="images/bb_cancel.png" alt="Cancel new" ></button></td>
  </tr>
</table>
</form>
<hr width=90%>
<?php
	} 
//***********************************************
if (isset($_POST['rowedit_x']))   
{	$form_action="rowedit";
	//$_POST['hidden_code'];
	$myquery = "Select dist_code, dist_id, dist_pwd, dist_name, contact_name, add_street, add_city,";
	$myquery.= " add_state, add_country, add_postal_code, billing, paypal_email, free_ac_qty, padi_ac_charge from distributors";
	$myquery.= " where dist_code in ( " . $_POST['hidden_code'] . " )";
	$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
	if (!($result)) {errHandler(); $_POST['rowedit_x']=false; $form_action="";$err=5;}
	else {
		$row = mysql_fetch_row($result) or die('Error: ' . mysql_error());
		if (!($row)) {errHandler(); $_POST['rowedit_x']=false; $form_action="";$err=6;}
		else { $_SESSION['action_allowed'] = "save2";
	?>
  <form action="" method="post" name="detail" onsubmit="return ValidateForm(this)">
  <input name="hidden_code" type="hidden" value="<?php echo $row[0]; ?>" />
  <span class="head1">Edit Distributor Definition</span>
	<table width="541" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
  <tr>
    <td width="207"><div align="right">Distributor-Name:</div></td>
    <td colspan="3"><div align="left">
      <input name="dist_name" type="text" id="dist_name" accesskey="1" tabindex="1" size="50" maxlength="50" 
	  value="<?php if ($err == 0 ) {echo $row[3];} else { echo $_POST['dist_name'];} ?>" />
    </div></td>
  </tr>
  <tr>
    <td><div align="right">Contact Person :</div></td>
    <td colspan="3"><div align="left">
      <input name="contact_name" type="text" id="contact_name" accesskey="2" tabindex="2" size="50" maxlength="30" 
	  value="<?php if ($err == 0 ) {echo $row[4];} else { echo $_POST['contact_name'];} ?>" />
    </div></td>
  </tr>
  <tr>
    <td><div align="right">Street Address: </div></td>
    <td colspan="3"><div align="left">
      <input name="add_street" type="text" id="add_street" accesskey="3" tabindex="3" size="50" maxlength="100" 
	  value="<?php if ($err == 0 ) {echo $row[5];} else { echo $_POST['add_street'];} ?>" />
    </div></td>
  </tr>
  <tr>
    <td><div align="right">City :</div></td>
    <td width="100"><div align="left">
      <input name="add_city" type="text" id="add_city" accesskey="4" tabindex="4" size="15" maxlength="15" 
	  value="<?php if ($err == 0 ) {echo $row[6];} else { echo $_POST['add_city'];} ?>" />
    </div></td>
    <td width="95"><div align="right">State :</div></td>
    <td width="139"><div align="left">
      <input name="add_state" type="text" id="add_state" accesskey="5" tabindex="5" size="15" maxlength="15" 
	  value="<?php if ($err == 0 ) {echo $row[7];} else { echo $_POST['add_state'];} ?>" />
    </div></td>
  </tr>
  <tr>
    <td ><div align="right">Country :</div></td>
    <td><div align="left">
      <input name="add_country" type="text" id="add_country" accesskey="6" tabindex="6" size="15" maxlength="15" 
	  value="<?php if ($err == 0 ) {echo $row[8];} else { echo $_POST['add_country'];} ?>" />
    </div></td>
    <td><div align="right">Postal Code :</div></td>
    <td><div align="left">
      <input name="add_postal_code" type="text" id="add_postal_code" accesskey="7" tabindex="7" size="15" maxlength="15" 
	  value="<?php if ($err == 0 ) {echo $row[9];} else { echo $_POST['add_postal_code'];} ?>" />
    </div></td>
  </tr>
  <tr>
    <td><div align="right">Paypal Email : </div></td>
    <td colspan="3"><div align="left">
      <input name="paypal_email" type="text" id="paypal_email" accesskey="8" tabindex="8" size="50" maxlength="50" 
	  value="<?php if ($err == 0 ) {echo $row[11];} else { echo $_POST['paypal_email'];} ?>" />
    </div></td>
  </tr>
  <tr>
    <td><div align="right">Login-ID:</div></td>
    <td><div align="left">
      <input name="dist_id" type="text" id="dist_id" accesskey="9" tabindex="9" size="15" maxlength="20" 
	  value="<?php if ($err == 0 ) {echo $row[1];} else { echo $_POST['dist_id'];} ?>" />
    </div></td>
    <td><div align="right">Password:</div></td>
    <td><div align="left">
      <input name="dist_pwd" type="password" id="dist_pwd" accesskey="10" tabindex="10" size="15" maxlength="10" 
	  value="<?php if ($err == 0 ) {echo $row[2];} else { echo $_POST['dist_pwd'];} ?>" />
    </div></td>
  </tr>
  <tr>
    <td><div align="right">Free A/C Quantity: </div></td>
    <td><input name="free_ac_qty" type="text" id="free_ac_qty" accesskey="11" tabindex="11" size="15" maxlength="20" 
	  value="<?php if ($err == 0 ) {echo $row[12];} else {echo $_POST['free_ac_qty'];} ?>" /></td>
	<td><div align="right">Billing :</div></td>
	<td><div align="left">
	  <input name="billing" type="checkbox" accesskey="12" tabindex="12" 
	  <?php if ($err == 0 ) {if ($row[10]==1) {echo ' checked'; } }
			else			{if (isset($_POST['billing'])) {echo ' checked'; } } ?> />
	  </div></td>
  </tr>
  <tr>
    <td><div align="right">Padi A/C Monthly Charge :</div></td>
    <td colspan="3"><div align="left">
      <input name="padi_ac_charge" type="text" id="pady_ac_charge" accesskey=13" tabindex="13" size="15" maxlength="20" 
	  value="<?php if ($err == 0 ) {echo $row[13];} else {echo $_POST['padi_ac_charge'];} ?>" />
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
//***********************************************************************************************************************************

$myquery = "SELECT dist_code, dist_name, contact_name FROM distributors order by dist_name"; 
//---------------Paging Header--------------------*
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/paging.header.php");
//------------------------------------------------*
$result = mysql_query($myquery." LIMIT $from, $max_results");
//$fields_num = mysql_num_fields($result);
?>
<form action="" method="post" name="list">

<span class="head1">Distributors List</span>
				  <input name="hidden_code" type="hidden" value="" />
				  <table width="737" class="listtable1" >
                    <tr class="listheader1" height="22" >
                      <td colspan="5"><div align="center">Action</div></td>
                      <td width="333"><div align="center">Distributor Name</div></td>
                      <td width="246"><div align="center">Contact Person</div></td>
                    </tr>
<?php  
$i=-1;
$list_bgcolor=$p_list_bgcolor_1;
while($row = mysql_fetch_row($result)) {
$i = $i + 1;
?>
  <tr height="20"  bgcolor=<?php echo $list_bgcolor ?>  >
   <td width="22"><div align="center">
     <input name="rowselector_<?php echo $i ?>" type="checkbox" value="<?php echo $row[0] ?>"  /> 
   </div></td>
   <td width="22">
			<div align="center">
			  <input name="rowedit"  type="image" src="images/b_edit.png" alt="Edit current" value="<?php echo $row[0] ?>" 
			onclick="hidden_code.value=window.document.activeElement.value" >
			           </div></td>
   <td width="22">
   			<div align="center">
   			  <input name="rowdelete"  type="image" src="images/b_drop.png" alt="Delete current" value="<?php echo $row[0] ?>" 
			onclick="hidden_code.value=window.document.activeElement.value;
			if(confirm('Are you sure, you want to delete selected row?')) return true; else return false;" >
 			          </div></td>
   <td width="22">
   			<div align="center">
   			  <input name="selectdistributor"  type="image" id="selectdistributor" 
			  alt="Select Distributor"
			  onclick="hidden_code.value=window.document.activeElement.value;" 
			value="<?php echo $row[0] ?>" src="images/b_select.png" >	
 			  </div></td>
   <td width="22">
   			<div align="center">
   			  <input name="distpicture"  type="image" src="images/b_photo.png" alt="Distributor Graphic" 
			value="<?php echo $row[0] ?>" onclick="openwindow(); return false;" >	
 			  </div></td>   

   <td ><div align="left" ><?php echo $row[1]; ?></div></td>
   <td><div align="left"><?php echo $row[2]; ?></div></td>
  </tr>
<?php 
if ($list_bgcolor == $p_list_bgcolor_1) {$list_bgcolor=$p_list_bgcolor_2;} else {$list_bgcolor=$p_list_bgcolor_1;}
} ?>
</table>
<?php if (!(($form_action=="add") || ($form_action=="rowedit"))) {?>
<table width="736" height="20">
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
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
  if(isBlank(cust_name, "'Customer Name'", 5)){return false}
  if(isBlank(contact_name, "'Contact Name'", 3)){return false}
  if(isBlank(cust_id, "'Customer ID'", 5)){return false}
  if(isBlank(cust_pwd, "'Password'", 5)){return false}
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
$dist_code=0;
switch($login_option){
	case 1:
		if ($s_dist_code > 0) {$dist_code=$s_dist_code;}
		echo "<div align='right'>Link to: <a href='distributors.php'>Distributors</a></div>";
		break;
	case 2:
		//if ($master_code==$user_code ){$dist_code=$user_code; $staff_code=0; }else{$dist_code=0; $staff_code=$user_code;}
		if ($master_code==$user_code ){$dist_code=$user_code; $staff_code=0; }else{$dist_code=$master_code; $staff_code=$user_code;}
		break;
	case 3:
		$dist_code=0;
		break;
}
if ($dist_code==0) { header( "Location: mainmenu.php" ); }
if (isset($_POST['selectcustomer_x'])) 
{	$_SESSION["s_cust_code"] = $_POST["hidden_code"];
	$_SESSION["s_cust_name"] = getCustName($_POST["hidden_code"]);
	header( "Location: mainmenu.php" );

	//$_SESSION['cust_code'] = $_POST['hidden_code'];
	//header( "Location: customers.parts.assignment.php" );
}
$err=0;
$form_action="none";
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/dbcon.start.php");
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/lib_1.php");
//***********************Buttons control***************************
//foreach ($_POST as $var => $value) { echo "$var = $value<br>n"; } 
//$myquery = "Select dist_code, dist_id, dist_pwd, dist_name, contact_name, add_street, add_city,";
//$myquery.= " add_state, add_country, add_postal_code, billing, paypal_email, dist_graphic from distributors";
//$myquery.= " where dist_code in ( " . $dist_code . " )";
//$result = mysql_query($myquery) or die('Error: ' . mysql_error());
//$row = mysql_fetch_row($result) or die('Error: ' . mysql_error());
/*
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
? >
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
    <td><div align="right">Maling Address : </div></td>
    <td ><div class="display1" align="left"><?php echo $add_street.',' ?></div></td>
    </tr>
  <tr>
    <td><div align="right"></div></td>
    <td ><div class="display1" align="left"><?php echo $add_city.', '.$add_state.', '.$add_country.' ('.$add_postal_code.')'?></div></td>
    </tr>
</table>
 <hr width=80%>
<?php   */
//*********************************************************************
if ((isset($_POST['save'])) && ($_SESSION['action_allowed'] == "save"))
{	$form_action="save";
	if (isset($_POST['active'])) {$active2=1;} else {$active2=0;} 
	$myquery = "Insert into customers (cust_code, cust_name, contact_name, cust_id, cust_pwd, active, dist_code)";
	$myquery.= " VALUES (NULL , '".$_POST['cust_name']."', ";
	$myquery.= "'".$_POST['contact_name']."', ";
	$myquery.= "'".$_POST['cust_id']."', '".$_POST['cust_pwd']."', $active2, ";
	$myquery.= $dist_code." )";
	$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
	if (!($result)) {errHandler(); $_POST['add']=true; $err=1;}
	else {$_SESSION['action_allowed'] = "none";}
}

if ((isset($_POST['save2'])) && ($_SESSION["action_allowed"] == "save2"))
{	$form_action="save2";
	if (isset($_POST['active'])) {$active2=1;} else {$active2=0;}
	$myquery = "Update customers set ";
	$myquery.= " cust_name = '" . $_POST['cust_name'] . "' ,"; 
	$myquery.= " contact_name = '" . $_POST['contact_name'] . "' ,"; 
	$myquery.= " cust_id = '".$_POST['cust_id']."' ,";
	$myquery.= " cust_pwd = '".$_POST['cust_pwd']."' ,";
	$myquery.= " active = $active2";
	$myquery.= " where cust_code in ( " . $_POST['hidden_code'] . " )";
	$result = mysql_query($myquery); //or die('Error: ' . mysql_error());
	if (!($result)) {errHandler();	$_POST['rowedit_x']=true; $err=2;}
	else {$_SESSION['action_allowed'] = "none";}
}

if (isset($_POST['cancel'])) {$form_action="cancel"; $_SESSION['action_allowed'] = "none";}

if (isset($_POST['delete'])) 
{	$form_action="delete"; 
	//echo $form_action;
	$delete_list="";
	for ( $j=0; $j < $p_max_rows; $j += 1) {if (isset($_POST['rowselector_'.$j])) {$delete_list .= $_POST['rowselector_'.$j] . " , ";}}
	$myquery = "Delete from customers where cust_code in (" . $delete_list . "0)";  
	$result = mysql_query($myquery); //or die('Error: ' . mysql_error());
	if (!($result)) {errHandler(); $_POST['delete']=false; $err=3;}
	else { 
		$delete_list = "0, " . $delete_list;
		if (strpos($delete_list, strval($s_cust_code)) > 0) {$_SESSION["s_cust_code"]=0;} 
	}

}

if (isset($_POST['rowdelete_x'])) 
{	$form_action="rowdelete";
	$myquery = "Delete from customers where cust_code in ( " . $_POST['hidden_code'] . " )";
	//echo $myquery;
	$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
	if (!($result)) {errHandler();	$err=4;}
	else {if ($_POST["hidden_code"] == $s_cust_code) {$_SESSION["s_cust_code"]=0;}
	}
}
//***********************************************
if (isset($_POST['add'])) 
{	$_SESSION['action_allowed'] = "save";
	$form_action="add";
	?>
                         
<form action="" method="post" name="detail" onsubmit="return ValidateForm(this)">
  <span class="head1" >New Customer Definition</span>
	<table width="352"  border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
  <tr>
    <td width="133"><div align="right">Customer Name :</div></td>
    <td colspan="3"><div align="left">
      <input name="cust_name" type="text" id="cust_name" accesskey="1" tabindex="1" size="33" maxlength="30" 
	  value="<?php if ($err != 0 ) {echo $_POST['cust_name'];} ?>" />
    </div></td>
  </tr>
  
  
  <tr>
    <td><div align="right">Contact Person : </div></td>
    <td colspan="3"><div align="left">
      <input name="contact_name" type="text" id="contact_name" accesskey="2" tabindex="2" size="33" maxlength="30" 
	  value="<?php if ($err != 0 ) {echo $_POST['contact_name'];} ?>" />
    </div></td>
    </tr>
  <tr>
    <td><div align="right">Login-ID :</div></td>
    <td width="124"><div align="left">
      <input name="cust_id" type="text" id="cust_id" accesskey="3" tabindex="3" size="20" maxlength="20" 
	  value="<?php if ($err != 0 ) {echo $_POST['cust_id'];} ?>" />
    </div></td>
    <td width="57"><div align="right">Active :</div></td>
    <td width="46"><div align="left">
      <input name="active" type="checkbox" id="active" accesskey="4" tabindex="4" 
	  <?php if ($err != 0 ) {if (isset($_POST['active'])) {echo ' checked'; } } else {echo ' checked';}?> />
    </div></td>
  </tr>
  <tr>
    <td><div align="right">Password : </div></td>
    <td colspan="3"><div align="left">
      <input name="cust_pwd" type="password" id="cust_pwd" accesskey="5" tabindex="5" size="20" maxlength="10" 
	  value="<?php if ($err != 0 ) {echo $_POST['cust_pwd'];} ?>" />
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
	$myquery = "SELECT cust_code, dist_code, cust_name, contact_name, cust_id, cust_pwd, active from customers";
	$myquery.= " where cust_code in ( " . $_POST['hidden_code'] . " )";
	$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
	if (!($result)) {errHandler(); $_POST['rowedit_x']=false; $form_action="";$err=5;}
	else {
		$row = mysql_fetch_row($result) or die('Error: ' . mysql_error());
		if (!($row)) {errHandler(); $_POST['rowedit_x']=false; $form_action="";$err=6;}
		else { $_SESSION['action_allowed'] = "save2";
	?>
  <form action="" method="post" name="detail" onsubmit="return ValidateForm(this)">
  <input name="hidden_code" type="hidden" value="<?php echo $row[0]; ?>" />
  <span class="head1">Edit Customer Definition</span>
	<table width="352" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
  <tr>
    <td width="132"><div align="right">Customer Name :</div></td>
    <td colspan="3"><div align="left">
      <input name="cust_name" type="text" id="cust_name" accesskey="1" tabindex="1" size="33" maxlength="30" 
	  value="<?php if ($err == 0 ) {echo $row[2];} else { echo $_POST['cust_name'];} ?>" />
    </div></td>
  </tr>
  
  
  <tr>
    <td><div align="right">Contact Person : </div></td>
    <td colspan="3"><div align="left">
      <input name="contact_name" type="text" id="contact_name" accesskey="2" tabindex="2" size="33" maxlength="30" 
	  value="<?php if ($err == 0 ) {echo $row[3];} else { echo $_POST['contact_name'];} ?>" />
    </div></td>
    </tr>
  <tr>
    <td><div align="right">Login-ID :</div></td>
    <td width="120"><div align="left">
      <input name="cust_id" type="text" id="cust_id" accesskey="3" tabindex="3" size="20" maxlength="20" 
	  value="<?php if ($err == 0 ) {echo $row[4];} else { echo $_POST['cust_id'];} ?>" />
    </div></td>
    <td width="60"><div align="right">Active :</div></td>
    <td width="44"><div align="left">
      <input name="active" type="checkbox" id="active" accesskey="4" tabindex="4" 
	  <?php if ($err == 0 ) {if ($row[6]==1) {echo ' checked'; } }
			else			{if (isset($_POST['active'])) {echo ' checked'; } } ?> />
    </div></td>
  </tr>
  <tr>
    <td><div align="right">Password : </div></td>
    <td colspan="3"><div align="left">
      <input name="cust_pwd" type="password" id="cust_pwd" accesskey="5" tabindex="5" size="20" maxlength="10" 
	  value="<?php if ($err == 0 ) {echo $row[5];} else { echo $_POST['cust_pwd'];} ?>" />
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
    <td><button type="submit" name="save2" accesskey="6"  ><img src="images/bb_save.png" alt="Save changes" ></button></td>
    <td>&nbsp;</td>
	<td><button type="submit" name="cancel" accesskey="6" ><img src="images/bb_cancel.png" alt="Cancel edit" ></button></td>
  </tr>
</table>
</form>
<hr width=90%>
	<?php
		}
	}
}
//***********************************************************************************************************************************

$myquery = "SELECT cust_code, dist_code, cust_name, contact_name, cust_id, cust_pwd, active FROM customers";
$myquery.= " WHERE dist_code=$dist_code order by cust_name"; 
//---------------Paging Header--------------------*
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/paging.header.php");
//------------------------------------------------*
$result = mysql_query($myquery." LIMIT $from, $max_results");
//$fields_num = mysql_num_fields($result);
?>
<form action="" method="post" name="list">
<span class="head1">Customers List</span>
				  <input name="hidden_code" type="hidden" value="" />
				  <table width="790" class="listtable1" >
                    <tr class="listheader1" height="22" >
                      <td colspan="4"><div align="center">Action</div></td>
                      <td width="262"><div align="center">Customer Name</div></td>
                      <td width="191"><div align="center">Contact Person</div></td>
                      <td width="161"><div align="center">Login-ID</div></td>
                      <td width="56"><div align="center">Active</div></td>
                    </tr>
<?php  
$i=-1;
$list_bgcolor=$p_list_bgcolor_1;
while($row = mysql_fetch_row($result)) {
$i = $i + 1;
?>
  <tr height="20"  bgcolor=<?php echo $list_bgcolor ?>  >
   <td width="21"><div align="center">
     <input name="rowselector_<?php echo $i ?>" type="checkbox" value="<?php echo $row[0] ?>"  
	 <?php if ($login_option==1) { echo ' disabled '; } ?> /> 
   </div></td>
   <td width="21">
			<div align="center">
			  <input name="rowedit"  type="image" src="images/b_edit.png" alt="Edit current" value="<?php echo $row[0] ?>" 
			<?php if ($login_option==1) { echo ' disabled '; } ?>
			onclick="hidden_code.value=window.document.activeElement.value" >
			</div></td>
   <td width="21">
   			<div align="center">
   			  <input name="rowdelete"  type="image" src="images/b_drop.png" alt="Delete current" value="<?php echo $row[0] ?>" 
			<?php if ($login_option==1) { echo ' disabled '; } ?>
			onclick="hidden_code.value=window.document.activeElement.value;
			if(confirm('Are you sure, you want to delete selected row?')) return true; else return false;" >
 			</div></td>
   <td width="21">
   			<div align="center">
   			  <input name="selectcustomer"  type="image" id="selectcustomer" 
			  onclick="hidden_code.value=window.document.activeElement.value;" 
			value="<?php echo $row[0] ?>" src="images/b_select.png" alt="Select Customer" >	
 			  </div></td>

   <td ><div align="left" ><?php echo $row[2]; ?></div></td>
   <td><div align="left"><?php echo $row[3]; ?></div></td>
   <td><div align="left"><?php echo $row[4]; ?></div></td>
   <td><div align="center"><?php echo iif($row[6]==1,'Yes', 'No'); ?></div>
     <div align="center"></div></td>
  </tr>
<?php 
if ($list_bgcolor == $p_list_bgcolor_1) {$list_bgcolor=$p_list_bgcolor_2;} else {$list_bgcolor=$p_list_bgcolor_1;}
} ?>
</table>
<?php if (!(($form_action=="add") || ($form_action=="rowedit"))) {?>
<table width="791">
 <tr>	
  <td align="left" >
   <a href="javascript:checkAll(true)">Check All</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="javascript:checkAll(false)">Uncheck All</a>
  </td>
 </tr>
</table>
<table width="127" border="0">
  <tr>
    <td><button type="submit" name="add" accesskey="1" <?php if ($login_option==1) { echo ' disabled '; } ?> >
		<img src="images/bb_add.png" alt="Add new row" ></button></td>
    <td>&nbsp;</td>
	<td><button type="submit" name="delete" accesskey="2" 
			<?php if ($login_option==1) { echo ' disabled '; } ?>
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
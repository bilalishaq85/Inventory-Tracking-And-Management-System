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
  if(isBlank(sf_name, "'Special-Field Name'", 3)){return false}
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

<div align="right">Link to: 
	<a href="classes.php">Classes</a>
	<a href="types.php">Types</a>
	<a href="categories.php">Categories</a>
	<a href="categories.php">Categories</a>
	<a href="sub_categories.php">SubCategories</a>
	<a href="parts.php">Parts</a>
	<a href="catalog.view.php">Catalog</a>
</div>
 <?php
switch($login_option){
	case 1:
		break;
	case 2:
		if ($master_code==$user_code ){$dist_code=$user_code; $staff_code=0; }else{$dist_code=0; $staff_code=$user_code;}
		//if ($master_code==$user_code ){$dist_code=$user_code; $staff_code=0; }else{$dist_code=$master_code; $staff_code=$user_code;}
		header( "Location: mainmenu.php" );
		break;
	case 3:
		header( "Location: mainmenu.php" ); 
		break;
}
//foreach ($_POST as $var => $value) { echo "$var = $value<br>n"; } 
$err=0;
$form_action="none";
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/dbcon.start.php");
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/lib_1.php");
//***********************Buttons control***************************
if ((isset($_POST['save'])) && ($_SESSION['action_allowed'] == "save"))
{	$form_action="save";
	$myquery = "Insert into sf_name_def (sf_code, sf_name, sub_cat_code)";
	$myquery.= " VALUES (NULL , '".$_POST['sf_name']."', '".$_POST['subcategories']."')";
	$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
	if (!($result)) {errHandler(); $_POST['add']=true; $err=1;}
	else {$_SESSION['action_allowed'] = "none";}
}

if ((isset($_POST['save2'])) && ($_SESSION["action_allowed"] == "save2"))
{	$form_action="save2";
	$myquery = "Update sf_name_def set ";
	$myquery.= " sf_name = '" . $_POST['sf_name'] . "' "; 
	$myquery.= " where sf_code in ( ".$_POST['hidden_code']." )";
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
	$myquery = "Delete from sf_name_def where sf_code in (" . $delete_list . "0)";  
	$result = mysql_query($myquery); //or die('Error: ' . mysql_error());
	if (!($result)) {errHandler(); $_POST['delete']=false; $err=3;}
}

if (isset($_POST['rowdelete_x'])) 
{	$form_action="rowdelete";
	$myquery = "Delete from sf_name_def where sf_code in ( " . $_POST['hidden_code'] . " )";
	$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
	if (!($result)) {errHandler();	$err=4;}
}

//******************************************
if (isset($_POST['add'])) 
{	$_SESSION['action_allowed'] = "save";
	$form_action="add";
	?>
 <form action="" method="post" name="detail" onsubmit="return ValidateForm(this)">
  <input name="categories" type="hidden" value="<?php echo $_POST['categories']; ?>" />
  <input name="subcategories" type="hidden" value="<?php echo $_POST['subcategories']; ?>" />
  <span class="head1">New Special-Field Name Definition</span>
	<table height="50" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
  
  <tr>
    <td width="137" height="34"><div align="right">Special-Field Name  :</div></td>
    <td width="248" ><div align="left">
      <input name="sf_name" type="text" id="sf_name" accesskey="1" tabindex="1" size="40" maxlength="35" 
	  value = "<?php if ($err != 0 ) {echo $_POST['sf_name'];} ?>" />
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
    <td><button type="submit" name="save" accesskey="1" tabindex="2" ><img src="images/bb_save.png" alt="Save row" ></button></td>
    <td>&nbsp;</td>
	<td><button type="submit" name="cancel" accesskey="2" tabindex="3" ><img src="images/bb_cancel.png" alt="Cancel new" ></button></td>
  </tr>
</table>
</form>
<hr width=65%>
<?php
	} 
//****************************************
if (isset($_POST['rowedit_x']))   
{	$form_action="rowedit";
	//echo $_POST['hidden_code'];
	$myquery = "Select sf_code, sf_name, sub_cat_code";
	$myquery.= " from sf_name_def";
	$myquery.= " where sf_code in ( " . $_POST['hidden_code'] . " )";
	$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
	if (!($result)) {errHandler(); $_POST['rowedit_x']=false; $form_action="";$err=5;}
	else {
		$row = mysql_fetch_row($result) or die('Error: ' . mysql_error());
		if (!($row)) {errHandler(); $_POST['rowedit_x']=false; $form_action="";$err=6;}
		else { $_SESSION['action_allowed'] = "save2";
	?>
  <form action="" method="post" name="detail" onsubmit="return ValidateForm(this)">
  <input name="hidden_code" type="hidden" value="<?php echo $row[0]; ?>" />
  <input name="categories" type="hidden" value="<?php echo $_POST['categories']; ?>" />
  <input name="subcategories" type="hidden" value="<?php echo $_POST['subcategories']; ?>" />

  <span class="head1">Edit Special-Field Name</span>
  <table height="50" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
  <tr>
    <td width="134" height="34"><div align="right">Special-Field Name  :</div></td>
    <td width="246" colspan="3"><div align="left">
      <input name="sf_name" type="text" id="sf_name" accesskey="1" tabindex="1" size="40" maxlength="35" 
	  value="<?php if ($err == 0 ) {echo $row[1];} else { echo $_POST['sf_name'];} ?>" />
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
    <td><button type="submit" name="save2" accesskey="1" tabindex="2"  ><img src="images/bb_save.png" alt="Save changes" ></button></td>
    <td>&nbsp;</td>
	<td><button type="submit" name="cancel" accesskey="2" tabindex="3" ><img src="images/bb_cancel.png" alt="Cancel edit" ></button></td>
  </tr>
</table>
</form>
<hr width=65%>
	
<?php 
		}
	}
} ?> 

<form action="" method="post" name="list">
<table border="0">
  <tr><td  valign="top">
  <div align="left">Category:  </div>
  </td>
    <td  valign="top"><div align="left">SubCategory: </div></td>
  </tr>
  <tr><td valign="top">
   <div align="left"><select name="categories" size="1" onchange="document.list.submit();">
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
   </div>
  </td>
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
  </tr>
</table>
<?php
//echo "type:" . $selected_type_code."::class:".$selected_class_code."::cat:".$selected_cat_code."::sub:".$selected_sub_cat_code."::";

//if (isset($_POST['categories'])) { $selected_cat_code=$_POST['categories'];}
//***********************************************************************************************************************
//********************PARTS LIST CODE************************************************************************************
//***********************************************************************************************************************
if ((isset($selected_cat_code)) && (isset($selected_sub_cat_code))){ 
$myquery = "SELECT sf_code, sf_name, sub_cat_code";
$myquery.= " FROM sf_name_def";
$myquery.= " where sub_cat_code = " . $selected_sub_cat_code;
$myquery.= " order by sf_name"; 
//$myquery;
//---------------Paging Header--------------------*
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/paging.header.php");
//------------------------------------------------*
$result = mysql_query($myquery." LIMIT $from, $max_results");
//$fields_num = mysql_num_fields($result);
?>
   <span class="head1">Special-Field Name(s)</span>
   <input name="hidden_code" type="hidden" value="" />

<table width="360" class="listtable1">
                    <tr class="listheader1" height="22" >
                      <td colspan="3"><div align="center">Action</div></td>
                      <td width="295"><div align="center">Special-Field Name(s)</div></td>
                      </tr>
<?php  
$i=-1;
$list_bgcolor=$p_list_bgcolor_1;
while($row = mysql_fetch_row($result)) {
$i = $i + 1;
?>
  <tr height="20"  bgcolor=<?php echo $list_bgcolor ?>  >
   <td width="20"><div align="center">
     <input name="rowselector_<?php echo $i ?>" type="checkbox" value="<?php echo $row[0] ?>"  /> 
   </div></td>
   <td width="20">
			<div align="center">
			  <input name="rowedit"  type="image" src="images/b_edit.png" alt="Edit current" value="<?php echo $row[0] ?>" 
			onclick="hidden_code.value=window.document.activeElement.value" >   
			  </div></td>
   <td width="20">
   			<div align="center">
   			  <input name="rowdelete"  type="image" src="images/b_drop.png" alt="Delete current" value="<?php echo $row[0] ?>" 
			onclick="hidden_code.value=window.document.activeElement.value;
			if(confirm('Are you sure, you want to delete selected row?')) return true; else return false;" >	
 			  </div></td>
   <td ><div align="left" ><?php echo $row[1]; ?></div></td>
   </tr>
<?php 
if ($list_bgcolor == $p_list_bgcolor_1) {$list_bgcolor=$p_list_bgcolor_2;} else {$list_bgcolor=$p_list_bgcolor_1;}
} ?>
</table>
<?php if (!(($form_action=="add") || ($form_action=="rowedit"))) {
		if (($selected_cat_code>0) && ($selected_sub_cat_code>0))
			{?>
<table width="360">
  <tr>	<td width="413" align="left" >
 <a href="javascript:checkAll(true)">Check All</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="javascript:checkAll(false)">Uncheck All</a></td>
  </tr>
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
} else { echo "In order to define Special-Field(s), you have to have at least one Category and a Sub-Category already defined ...";}	
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
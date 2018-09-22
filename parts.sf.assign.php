<?php ob_start(); ini_set('output_buffering','1'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_3.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>External Inventory Tracking System</title>


<script language="JavaScript" src="includes/validate.input.js" type=text/javascript></script>
<script language="javascript">
function ValidateForm(thisform) { with (thisform) {
	//return true;
  //alert(window.event.srcElement.parentNode.id);
  //alert(window.document.activeElement.name);
  if (window.document.activeElement.name == "cancel" ) {return true}
  //if(isBlank(sf_value, "'Special-Field Value'", 3)){return false}
	var t_sf_value = document.detail.elements["sf_value[]"];  
	//alert (t_sf_value.length);
	for(var i = 0; i < t_sf_value.length; i++) {if(invalidString_relax(t_sf_value[i], "'Special-Field Value'")){return false}}  	
  return true; 
}}

function getSelectedOptions(thisobj) { with (thisobj) {
  var SelectedValues = "0";
  for(var i = 0; i < thisobj.options.length; i++) 
   {  if(thisobj.options[i].selected == true) 
		{ SelectedValues = SelectedValues + ',' + thisobj.options[i].value; }	
   }
  if(SelectedValues == "0")
  	{ alert("You have not selected any SPECIAL-FIELD !"); return false; }
  else
    { document.add_sf.hidden_code.value=SelectedValues; return true; }
}}
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
<div class="head1">Special-Field Name Assignment (for below selected Part)</div>
<?php
switch($login_option){
	case 1:
		$dist_code=NULL; $staff_code=NULL;
		break;
	case 2:
		if ($master_code==$user_code ){$dist_code=$user_code; $staff_code=0; }else{$dist_code=0; $staff_code=$user_code;}
		//if ($master_code==$user_code ){$dist_code=$user_code; $staff_code=0; }else{$dist_code=$master_code; $staff_code=$user_code;}
		break;
	case 3:
		header( "Location: mainmenu.php" ); 
		break;
}

require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/dbcon.start.php");
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/lib_1.php");

$part_code=$_GET['part_code'];
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
 <hr width=65% >
 
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
    <td><div class="display1" align="left" ><?php echo $industry_no ?></div></td>
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
 <hr width=65%>


<?php
//*********************************************************************************************************************
$err=0;
$form_action="none";
// Already included above ... require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/dbcon.start.php");

//***********************Buttons control***************************
//foreach ($_POST as $var => $value) { echo "$var = $value<br>n"; } 
//************************************************************************
if ((isset($_POST['save'])) && ($_SESSION['action_allowed'] == "save"))
{	$form_action="save";
	$myquery = "Insert into parts_specs (sfv_code, part_code, sf_code, sf_value) ";
	$myquery.= " select NULL, " . $part_code . ", sf_code, NULL from sf_name_def where sf_code in (" . $_POST['hidden_code'] . ")" ;
	$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
	if (!($result)) {errHandler(); $_POST['save']=false; $err=1;}
	else 
	{	$_SESSION['action_allowed'] = "none";
		if ($login_option > 1)
		{	$myquery = " Insert into parts_log (log_code, part_code, dist_code, staff_code, action)";
			$myquery.= " VALUES (NULL, $part_code, $dist_code, $staff_code, 4)";
			$result = mysql_query($myquery) or die('Error: ' . mysql_error());	
		}
	}
}

if ((isset($_POST['save2'])) && ($_SESSION["action_allowed"] == "save2"))
{	$form_action="save2";
	$count = count($_POST['hidden_code']);
	for($i=0; $i < $count; $i++)
	{	$myquery = "Update parts_specs set";
		$myquery.= " sf_value = '" . mysql_real_escape_string($_POST['sf_value'][$i]) . "'";
		$myquery.= " where sfv_code = '" . $_POST['hidden_code'][$i] . "'";
		$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
		if (!($result)) {errHandler(); $_POST['edit']=true; $err=1;}
		else 
		{	$_SESSION["action_allowed"] = "none";
			if (($login_option > 1) && ($i == 0) && ($count > 0))
			{	$myquery = " Insert into parts_log (log_code, part_code, dist_code, staff_code, action)";
				$myquery.= " VALUES (NULL, $part_code, $dist_code, $staff_code, 5)";
				$result = mysql_query($myquery) or die('Error: ' . mysql_error());	
			}
		}
	}
}

if (isset($_POST['cancel'])) {$form_action="cancel"; $_SESSION['action_allowed'] = "none";}

if (isset($_POST['delete'])) 
{	$form_action="delete"; 
	//echo $form_action;
	$delete_list="";
	for ( $j=0; $j < $p_max_rows; $j += 1) {if (isset($_POST['rowselector_'.$j])) {$delete_list .= $_POST['rowselector_'.$j] . " , ";}}
	$myquery = "Delete from parts_specs where sfv_code in (" . $delete_list . "0)";  
	$result = mysql_query($myquery); //or die('Error: ' . mysql_error());
	//echo "Delete List:" . $delete_list . ";;";
	if (!($result)) {errHandler(); $_POST['delete']=false; $err=3;}
	else
	{	if (($login_option > 1) && !($delete_list == ""))
		{	$myquery = " Insert into parts_log (log_code, part_code, dist_code, staff_code, action)";
			$myquery.= " VALUES (NULL, $part_code, $dist_code, $staff_code, 6)";
			$result = mysql_query($myquery) or die('Error: ' . mysql_error());	
		}
	}
}

if (isset($_POST['rowdelete_x'])) 
{	$form_action="rowdelete";
	$myquery = "Delete from parts_specs where sfv_code in ( " . $_POST['hidden_code'] . " )";
	$result = mysql_query($myquery); //or die('Error: ' . mysql_error());
	if (!($result)) {errHandler(); $err=4;}
	else
	{	if ($login_option > 1)
		{	$myquery = " Insert into parts_log (log_code, part_code, dist_code, staff_code, action)";
			$myquery.= " VALUES (NULL, $part_code, $dist_code, $staff_code, 6)";
			$result = mysql_query($myquery) or die('Error: ' . mysql_error());	
		}
	}
}

if (isset($_POST['add'])) 
{	$_SESSION['action_allowed'] = "save";
	$form_action="add";
	?>
  <form action="" method="post" name="add_sf" onsubmit="return true">
  <input name="hidden_code" type="hidden" value="" />
  <span class="head1">Add Special Field(s)</span>
	<table border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
  <tr>
    <td width="96" height="10" valign="top">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="86" valign="top"><div align="right" >Special-Field :</div></td>
    <td><div align="left">
      <select name="select_sf" size="7" multiple="multiple">
        <?php
	$myquery2 = "Select sf_code, sf_name, sub_cat_code from sf_name_def";
	$myquery2.= " where sub_cat_code = " . $sub_cat_code;
	$myquery2.= " and sf_code not in (select sf_code from parts_specs where part_code=" . $part_code . ")";
	$result2 = mysql_query($myquery2);
	while($row2 = mysql_fetch_row($result2)) 
 		{ echo "<option value='" . $row2[0] . "'>" . $row2[1] . "</option>"; }
	?>
      </select>
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
    <td><button type="submit" name="save" accesskey="1"  
	 onclick="return getSelectedOptions(this.form.select_sf)" ><img src="images/bb_save.png" alt="Save row" ></button></td>
    <td>&nbsp;</td>
	<td><button type="submit" name="cancel" accesskey="2" ><img src="images/bb_cancel.png" alt="Cancel new" ></button></td>
  </tr>
</table>
</form>
<hr width=65%>
<?php
	} 
//********************************************************
if (isset($_POST['edit']))   
{	$form_action="rowedit";
	//$_POST['hidden_code'];
	$myquery = "select a.sfv_code, b.sf_name, a.sf_value";
	$myquery.= " from parts_specs a, sf_name_def b";
	$myquery.= " where a.sf_code = b.sf_code";
	$myquery.= " and a.part_code=" . $part_code;	
	$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
	if (!($result)) {errHandler(); $_POST['edit']=false; $form_action="";$err=5;}
	else { $_SESSION['action_allowed'] = "save2";
	
	?>
  <form action="" method="post" name="detail" onsubmit="return ValidateForm(this)">
  <span class="head1">Edit Special-Field(s) Values	</span>
	<table border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
  <?php $i=0; while($row = mysql_fetch_row($result)) {  ?>
  <tr>
    <td><div align="right"><?php echo $row[1] ?> :</div></td>
    <td ><div align="left">
	  <input name="hidden_code[]" type="hidden" value="<?php echo $row[0]; ?>" />	
      <input name="sf_value[]" type="text" id="" accesskey="1" tabindex="1" size="35" maxlength="50" 
	  		value="<?php if ($err == 0 ) {echo htmlentities($row[2]);} else { echo htmlentities($_POST['sf_value'][$i]);} ?>" />
    </div></td>
  </tr>
  <?php $i=$i+1; } ?>
  
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
<hr width=65%>
	<?php
	}
}

//***********************************************************************************************************************************

$myquery = "select a.sfv_code, a.part_code, a.sf_code, b.sf_name, a.sf_value";
$myquery.= " from parts_specs a, sf_name_def b";
$myquery.= " where a.sf_code = b.sf_code";
$myquery.= " and a.part_code=" . $part_code;

//---------------Paging Header--------------------*
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/paging.header.php");
//------------------------------------------------*
$result = mysql_query($myquery." LIMIT $from, $max_results");
//$fields_num = mysql_num_fields($result);
?>

<form action="" method="post" name="list">
<span class="head1">Special-Field Name Assigments</span>
				  <input name="hidden_code" type="hidden" value="" />
				  <table width="503" border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
                    <tr class="listheader1" height="22" >
                      <td colspan="2"><div align="center">Action</div></td>
                      <td width="146"><div align="center">Field-Name</div></td>
                      <td width="318"><div align="center">Field-Value</div></td>
                    </tr>
<?php  
$i=-1;
$list_bgcolor=$p_list_bgcolor_1;
while($row = mysql_fetch_row($result)) {
$i = $i + 1;
?>
  <tr height="20"  bgcolor=<?php echo $list_bgcolor ?>  >
   <td width="23"><div align="center">
     <input name="rowselector_<?php echo $i ?>" type="checkbox" value="<?php echo $row[0] ?>"  /> 
   </div></td>
   <td width="23">
   			<div align="center">
   			  <input name="rowdelete"  type="image" src="images/b_drop.png" alt="Delete current" value="<?php echo $row[0] ?>" 
			onclick="hidden_code.value=window.document.activeElement.value;
			if(confirm('Delete selected row?')) return true; else return false;" >
 			          </div></td>
   <td ><div align="left" ><?php echo $row[3]; ?></div></td>
   <td><div align="left"><?php echo $row[4]; ?></div></td>
  </tr>
<?php 
if ($list_bgcolor == $p_list_bgcolor_1) {$list_bgcolor=$p_list_bgcolor_2;} else {$list_bgcolor=$p_list_bgcolor_1;}
} ?>
</table>
<?php if (!(($form_action=="add") || ($form_action=="rowedit"))) {?>
<table width="503"><tr>	<td align="left" >
 <a href="javascript:checkAll(true)">Check All</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="javascript:checkAll(false)">Uncheck All</a></td></tr>
</table>
<table width="165" border="0">
  <tr>
    <td><button type="submit" name="add" accesskey="1"><img src="images/bb_add.png" alt="Add new row(s)" ></button></td>
    <td>&nbsp;</td>
    <td><button type="submit" name="edit" accesskey="1" <?php echo iif($i>0,' ','disabled'); ?> ><img src="images/bb_edit.png" alt="Edit all rows" ></button></td>
    <td>&nbsp;</td>
	<td><button type="submit" name="delete" accesskey="2" <?php echo iif($i>0,' ','disabled'); ?> 
			onclick="
			if(rowsSelected()){
				if(confirm('Are you sure, you want to delete selected row(s)?')) return true; else return false;} 
			else {return false;}
			"
			><img src="images/bb_drop.png" alt="Delete selected row(s)" ></button>		</td>
  </tr>
</table>

<?php
//----------------- Paging Footer------------------*
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/paging.footer.php");
//-------------------------------------------------*
echo "</form>";
}
?>






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
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
	window.open("classes.picture.php?class_code=" + window.document.activeElement.value, null, newwinAttrib(570,900));
	return false;
}
function ValidateForm(thisform) { with (thisform) {
  //alert(window.event.srcElement.parentNode.id);
  //alert(window.document.activeElement.name);
  if (window.document.activeElement.name == "cancel" ) {return true}
  if(isBlank(class_name, "'Class-Name'", 3)){return false}
  if(isBlank_relax2(class_desc, "'Class Description'", 3)){return false}
  return true; 
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
	<a href="types.php">Types</a>
	<a href="categories.php">Categories</a>
	<a href="sub_categories.php">SubCategories</a>
	<a href="parts.php">Parts</a>
	<a href="sfname.def.php">SF-Names</a>
	<a href="catalog.view.php">Catalog</a>
</div>

<?php
switch($login_option){
	case 1:
		break;
	case 2:
		header( "Location: mainmenu.php" );
		break;
	case 3:
		header( "Location: mainmenu.php" ); 
		break;
}
$err=0;
$form_action="none";
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/dbcon.start.php");
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/lib_1.php");
//***********************Buttons control***************************

//foreach ($_POST as $var => $value) { echo "$var = $value<br>n"; } 

if ((isset($_POST['save'])) && ($_SESSION['action_allowed'] == "save")) 
{	$form_action="save";
	$myquery = "Insert into classes (class_code, class_name, class_desc)";
	$myquery.= " VALUES (NULL , '".$_POST['class_name']."', '".mysql_real_escape_string($_POST['class_desc'])."')";  	
	$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
	if (!($result)) {errHandler(); $_POST['add']=true; $err=1;}
	else {$_SESSION['action_allowed'] = "none";}
}

if ((isset($_POST['save2'])) && ($_SESSION["action_allowed"] == "save2"))
{	$form_action="save2";
	$myquery = "Update classes set ";
	$myquery.= " class_name = '" . $_POST['class_name'] . "' ,"; 
	$myquery.= " class_desc = '".mysql_real_escape_string($_POST['class_desc'])."' ";
	$myquery.= " where class_code in ( " . $_POST['hidden_code'] . " )";
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
	$myquery = "Delete from classes where class_code in (" . $delete_list . "0)";  
	$result = mysql_query($myquery); //or die('Error: ' . mysql_error());
	if (!($result)) {errHandler(); $_POST['delete']=false; $err=3;}
}

if (isset($_POST['rowdelete_x'])) 
{	$form_action="rowdelete";
	$myquery = "Delete from classes where class_code in ( " . $_POST['hidden_code'] . " )";
	$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
	if (!($result)) {errHandler(); $err=4;}
}

//***************************************************
if (isset($_POST['add'])) 
{	$_SESSION['action_allowed'] = "save";
	$form_action="add";
	?>
  <form action="" method="post" name="detail" onsubmit="return ValidateForm(this)">
  <span class="head1">New Class Definition</span>
	<table width="411" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
  <tr>
    <td width="84"><div align="right">Class-Name:</div></td>
    <td width="327"><div align="left">
      <input name="class_name" type="text" id="class_name" accesskey="1" tabindex="1" size="35" maxlength="50" 
	  value="<?php if ($err != 0 ) {echo $_POST['class_name'];} ?>" />
    </div></td>
  </tr>
  <tr>
    <td><div align="right">Description:</div></td>
    <td><div align="left">
      <input name="class_desc" type="text" id="class_desc" accesskey="2" tabindex="2" size="50" maxlength="100" 
	  value="<?php if ($err != 0 ) {echo htmlentities($_POST['class_desc']);} ?>" />
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
    <td><button type="submit" name="save" accesskey="1"  ><img src="images/bb_save.png" alt="Save row" ></button></td>
    <td>&nbsp;</td>
	<td><button type="submit" name="cancel" accesskey="2" ><img src="images/bb_cancel.png" alt="Cancel new" ></button></td>
  </tr>
</table>
</form>
<hr width=90%>
<?php
	} 
//***************************************************
if (isset($_POST['rowedit_x']))   
{	$form_action="rowedit";
	//$_POST['hidden_code'];
	$myquery = "Select class_code, class_name, class_desc from classes where class_code in ( " . $_POST['hidden_code'] . " )";
	$result = mysql_query($myquery); // or die('Error: ' . mysql_error());
	if (!($result)) {errHandler(); $_POST['rowedit_x']=false; $form_action="";$err=5;}
	else {
		$row = mysql_fetch_row($result) or die('Error: ' . mysql_error());
		if (!($row)) {errHandler(); $_POST['rowedit_x']=false; $form_action="";$err=6;}
		else { $_SESSION['action_allowed'] = "save2";
	?>
  <form action="" method="post" name="detail" onsubmit="return ValidateForm(this)">
  <input name="hidden_code" type="hidden" value="<?php echo $row[0]; ?>" />
  <span class="head1">Edit Class Definition	</span>
	<table width="411" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
  <tr>
    <td width="84"><div align="right">Class-Name:</div></td>
    <td width="327"><div align="left">
      <input name="class_name" type="text" id="class_name" accesskey="1" tabindex="1" size="35" maxlength="50" 
	  		value="<?php if ($err == 0 ) {echo $row[1];} else { echo $_POST['class_name'];} ?>" />
    </div></td>
  </tr>
  <tr>
    <td><div align="right">Description:</div></td>
    <td><div align="left">
      <input name="class_desc" type="text" id="class_desc" accesskey="2" tabindex="2" size="50" maxlength="100" 
  			value="<?php if ($err == 0 ) {echo htmlentities($row[2]);} else { echo htmlentities($_POST['class_desc']);} ?>" />
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

$myquery = "SELECT * FROM classes order by class_name"; 
//---------------Paging Header--------------------*
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/paging.header.php");
//------------------------------------------------*
$result = mysql_query($myquery." LIMIT $from, $max_results");
//$fields_num = mysql_num_fields($result);
?>
<form action="" method="post" name="list">
<span class="head1">Inventory Classes</span>
				  <input name="hidden_code" type="hidden" value="" />
				  <table width="690" class="listtable1">
                    <tr class="listheader1" height="22" >
                      <td colspan="4"><div align="center">Action</div></td>
                      <td width="223"><div align="center">Class Name</div></td>
                      <td width="350"><div align="center">Description</div></td>
                    </tr>
<?php  
$i=-1;
$list_bgcolor=$p_list_bgcolor_1;
while($row = mysql_fetch_row($result)) {
$i = $i + 1;
?>
  <tr height="21"  bgcolor=<?php echo $list_bgcolor ?>  >
   <td width="21"><div align="center">
     <input name="rowselector_<?php echo $i ?>" type="checkbox" value="<?php echo $row[0] ?>"  /> 
   </div></td>
   <td width="21">
			<div align="center">
			  <input name="rowedit"  type="image" src="images/b_edit.png" alt="Edit current" value="<?php echo $row[0] ?>" 
			onclick="hidden_code.value=window.document.activeElement.value" >
			           </div></td>
   <td width="21">
   			<div align="center">
   			  <input name="rowdelete"  type="image" src="images/b_drop.png" alt="Delete current" value="<?php echo $row[0] ?>" 
			onclick="hidden_code.value=window.document.activeElement.value;
			if(confirm('Are you sure, you want to delete selected row?')) return true; else return false;" >
 			          </div></td>
   <td width="21">
   			<div align="center">
   			  <input name="partdetail"  type="image" src="images/b_photo.png" alt="Details & Photos" 
			value="<?php echo $row[0] ?>" onclick="openwindow(); return false;" >	
 			  </div></td>  
			  
   <td ><div align="left" ><?php echo $row[1]; ?></div></td>
   <td><div align="left"><?php echo htmlentities($row[2]); ?></div></td>
  </tr>
<?php 
if ($list_bgcolor == $p_list_bgcolor_1) {$list_bgcolor=$p_list_bgcolor_2;} else {$list_bgcolor=$p_list_bgcolor_1;}
} ?>
</table>
<?php if (!(($form_action=="add") || ($form_action=="rowedit"))) {?>
<table width="690" height="20">
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
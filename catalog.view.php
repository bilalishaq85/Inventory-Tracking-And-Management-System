<?php ob_start(); ini_set('output_buffering','1'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_2.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script language="JavaScript" src="includes/window.js" type=text/javascript></script>
<!-- InstanceBeginEditable name="doctitle" -->
<title>External Inventory Tracking System</title>
<script language="javascript">
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
if (isset($_GET['option'])) { $option=$_GET['option']; }
$heading1="";
$dist_code=0;
switch($login_option){
	case 1:
		if     ($option==2){ $heading1="Selected Distributor's Catalog"; $dist_code=$s_dist_code; }
		elseif ($option==3){ $heading1="Selected Customer's Catalog"; $dist_code=$s_dist_code; $cust_code=$s_cust_code;}
		else{ $heading1="Operator's Catalog"; $option=1; 
				?>
				<div align="right">Link to: 
				<a href="classes.php">Classes</a>
				<a href="types.php">Types</a>
				<a href="categories.php">Categories</a>
				<a href="sub_categories.php">SubCategories</a>
				<a href="sfname.def.php">SF-Names</a>		
				<a href="parts.php">Parts</a>
				</div>		
				<?php
			}
		break;
	case 2:
		if ($master_code==$user_code ){$dist_code=$user_code; $staff_code=0; }else{$dist_code=0; $staff_code=$user_code;}
		//if ($master_code==$user_code ){$dist_code=$user_code; $staff_code=0; }else{$dist_code=$master_code; $staff_code=$user_code;}
		if ($option==3){ $heading1="Selected Customer's Catalog"; $cust_code=$s_cust_code;}
		else			   { $heading1="Distributor's Catalog"; $option=2; }
		?>
		<div align="right">Link to: 
			<a href="distributors.catalog.setup.php">Setup Distributor's Catalog</a>
		</div>		
		<?php
		break;
	case 3:
		$heading1="Assigned Inventory";
		$cust_code=$user_code;
		$option=3;
		//if ($master_code == 0 ){$dist_code=$user_code; $t_staff_code=0;} else {$dist_code=$master_code; $t_staff_code=$user_code;}
		
		break;
}
//if ($dist_code==0) {header( "Location: mainmenu.php" );}
$err=0;
$form_action="none";
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/lib_1.php");
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/dbcon.start.php");
//***********************Buttons control***************************
//foreach ($_POST as $var => $value) { echo "$var = $value<br>n"; } 
?>
<form action="" method="post" name="list" >

<?php
//**********Put Cataloges drop-down here***************************************************************	
	$myquery2= "Select catalog_code, catalog_name from distributors_catalog where dist_code=$dist_code";
	$result2 = mysql_query($myquery2);
	$row2 = mysql_fetch_row($result2);
	$catalog_code = $row2[0];
	?>
	<input name="catalog_code" type="hidden" value="<?php echo $catalog_code ?>" />
<?php
	$myquery="";
	require_once(str_replace('\\', '/', dirname(__FILE__)) . "/catalog_option.php");
//---------------Paging Header--------------------*
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/paging.header.php");
//------------------------------------------------*
$result = mysql_query($myquery." LIMIT $from, $max_results");
//$fields_num = mysql_num_fields($result);
?>
   <span class="head1"><?php echo $heading1; ?> </span>
   <input name="hidden_code" type="hidden" value="" />

<table width="823" class="listtable2" >
                    <tr class="listheader1" height="22" >
                      <td width="17"><div align="center">*</div></td>
					  <td width="150"><div align="center">Part-No</div></td>
                      <td width="249"><div align="center">Part Name</div></td>
                      <td width="287"><div align="center">Short Description</div></td>
					  <td width="96"><div align="center">List-Price</div></td>
                    </tr>
<?php  
$i=-1;
$t_class_code=0;
$t_type_code=0;
$t_sub_cat_code=0;
$list_bgcolor=$p_list_bgcolor_1;
while($row = mysql_fetch_row($result)) 
{$i = $i + 1;
 if (!(($t_class_code==$row[10]) && ($t_type_code==$row[11]) && ($t_sub_cat_code==$row[12])))
  {	$t_class_code=$row[10]; $t_type_code=$row[11]; $t_sub_cat_code=$row[12];
	?>
	<tr class="listheader2" height="22" >
	 <td></td> 
	 <td align="left" colspan="4">
	  <?php echo ''. $row[13] .' : '.$row[14].' : '.$row[15].' : '.$row[16] ?> 
	 </td>
	</tr>
	<?php
  }
?>
	<tr  bgcolor=<?php echo $list_bgcolor; ?> >
	  <td width="17">
    	<div align="center">
	   	  <input name="partdetail"  type="image" src="images/b_property.png" alt="Part full Details" 
		  value="<?php echo $row[0] ?>" onclick="openwindow(); return false;" >	
	 	</div></td>  
	   <td ><div align="left" ><?php echo $row[1]; ?></div></td>
	   <td ><div align="left" ><?php echo $row[2]; ?></div></td>
	   <td ><div align="left" ><?php echo $row[3]; ?></div></td>
	   <td bgcolor=<?php if (($row[18]>0) && ($login_option < 3)) {echo $p_list_bgcolor_3;} else {echo $list_bgcolor;} ?> >
	   	<div align="right">$<?php echo $row[5]; ?></div></td>
	</tr>
<?php if ($list_bgcolor == $p_list_bgcolor_1) {$list_bgcolor=$p_list_bgcolor_2;} else {$list_bgcolor=$p_list_bgcolor_1;}
}
?>
</table>
<?php 
//----------------- Paging Footer------------------*
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/paging.footer.php");
//-------------------------------------------------*
?>
</form>				
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
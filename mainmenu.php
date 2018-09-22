<?php ob_start(); ini_set('output_buffering','1'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_2.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script language="JavaScript" src="includes/window.js" type=text/javascript></script>
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
<table align="center" width="551"  border="0">
<?php
switch($login_option){
case 1:
	?>
	<tr><td align="left" height="40" class="display2">Operator's Menu</td></tr>
	<tr><td align="left" height="20"><a href="classes.php">Classes</a></td></tr>
	<tr><td align="left" height="20"><a href="types.php">Types</a></td></tr>
	<tr><td align="left" height="20"><a href="categories.php">Categories</a></td></tr>
	<tr><td align="left" height="20">&nbsp;&nbsp;<a href="sub_categories.php">SubCategories</a></td></tr>
	<tr><td align="left" height="20">&nbsp;&nbsp;&nbsp;&nbsp;<a href="sfname.def.php">SF-Names Definition</a></td></tr>
	<tr><td align="left" height="20"><a href="parts.php">Parts</a></td></tr>
	<tr><td align="left" height="20"><a href="catalog.view.php">View Operator's Catalog</a></td></tr>
	<tr><td align="left" height="20"><a href="Distributors.php">Distributors</a></td></tr>
	<?php 
	if ($s_dist_code > 0){ ?>
	<tr><td align="left" height="20">&nbsp;&nbsp;<a href="catalog.view.php?option=2">View Distributor's Catalog</a></td></tr>
	<tr><td align="left" height="20">&nbsp;&nbsp;<a href="Distributors.staff.php">Distributor's Staff</a></td></tr>
	<tr><td align="left" height="20">&nbsp;&nbsp;<a href="customers.php">Customers</a></td></tr>
	<?php } ?>
	<?php if (($s_dist_code > 0) && ($s_cust_code > 0)){ ?>
	<tr><td align="left" height="20">&nbsp;&nbsp;&nbsp;&nbsp;<a href="catalog.view.assignment.php">View Assigned Inventory</a></td></tr>
	<tr><td align="left" height="20">&nbsp;&nbsp;&nbsp;&nbsp;<a href="customer.inventory.report.php">Customer Inventory Report</a></td></tr>
	<?php } ?>
	<?php
	break;
case 2:
	?>
	<tr><td align="left" height="40" class="display2">Distributor's Menu</td></tr>
	<tr><td align="left" height="20"><a href="parts.php">Distributor's Part</a></td></tr>
	<tr><td align="left" height="20"><a href="distributors.catalog.setup.php">Setup Distributor's Catalog</a></td></tr>
	<tr><td align="left" height="20"><a href="catalog.view.php">View Distributor's Catalog</a></td></tr>
	<tr><td align="left" height="20"><a href="Distributors.staff.php">Distributor's Staff</a></td></tr>
	<tr><td align="left" height="20"><a href="customers.php">Customers</a></td></tr>
	<?php if ($s_cust_code > 0){ ?>
	<tr><td align="left" height="20">&nbsp;&nbsp;<a href="customers.parts.assignment.php">Inventory Assignment</a></td></tr>
	<tr><td align="left" height="20">&nbsp;&nbsp;<a href="catalog.view.assignment.php">View Assigned Inventory</a></td></tr>
	<tr><td align="left" height="20">&nbsp;&nbsp;<a href="customer.inventory.report.php">Customer Inventory Report</a></td></tr>
	<?php } ?>
	<?php
	break;
case 3:
	?>
	<tr><td align="left" height="40" class="display2">Customer's Menu</td></tr>
	<tr><td align="left" height="20"><a href="catalog.view.php">View Catalog</a></td></tr>
	<tr><td align="left" height="20"><a href="catalog.view.assignment.php">View Assigned Inventory</a></td></tr>
	<tr><td align="left" height="20"><a href="customer.inventory.php?option=1">Inventory Addition</a></td></tr>
	<tr><td align="left" height="20"><a href="customer.inventory.php?option=2">Inventory Subtraction</a></td></tr>
	<tr><td align="left" height="20"><a href="customer.inventory.adjustment.php">Physical vs Perpetual Inventory (Adjustments)</a></td></tr>
	<tr><td align="left" height="20"><a href="customer.inventory.report.php">Inventory Report</a></td></tr>
	<tr><td align="left" height="20"><a href="customer.inventory.log.php">Inventory Log</a></td></tr>

	<?php		
	break;
}
?>
</table>
			
				
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
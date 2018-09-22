<?php ob_start(); ini_set('output_buffering','1'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_2.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script language="JavaScript" src="includes/window.js" type=text/javascript></script>
<!-- InstanceBeginEditable name="doctitle" -->
<title>External Inventory Tracking System</title>
<link rel="stylesheet" type="text/css" href="calender/spiffyCal.css">
<script language="JavaScript" src="calender/spiffyCal.js"></script>
<script language="javascript"> 
 	var cal11=new ctlSpiffyCalendarBox("cal11", "list", "txtDate1","btnDate1",
 	"<?php if (isset($_POST['txtDate1'])) {echo $_POST['txtDate1'];} else {echo '';} ?>"); 
</script>
<script language="javascript"> 
	var cal12=new ctlSpiffyCalendarBox("cal12", "list", "txtDate2","btnDate2",
	"<?php if (isset($_POST['txtDate2'])) {echo $_POST['txtDate2'];} else {echo '';} ?>"); 
</script>
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
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
.style54 {font-size: 9px}
-->
</style>
<!-- InstanceEndEditable -->
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
<div id="spiffycalendar" class="text">&nbsp;</div>
<?php
//$option=0;
//if (isset($_GET['option'])) { $option=$_GET['option']; }
//$heading1="";
//$dist_code=0;
$heading1="Customer Inventory Logs";
switch($login_option){
	case 1:
//		if     ($option==2){ $heading1="Selected Distributor's Catalog"; $dist_code=$s_dist_code; }
//		elseif ($option==3){ $heading1="Selected Customer's Catalog"; $dist_code=$s_dist_code; $cust_code=$s_cust_code;}
//		else{ $heading1="Operator's Catalog"; $option=1; 
		if (($s_dist_code > 0) && ($s_cust_code > 0)) {$dist_code=$s_dist_code; $cust_code=$s_cust_code;}
		else {header( "Location: mainmenu.php" );}
		?>
		<div align="right">Link to: 
		<a href="classes.php">Classes</a>
		</div>		
		<?php
		break;
	case 2:
		if ($master_code==$user_code ){$dist_code=$user_code; $staff_code=0; }else{$dist_code=0; $staff_code=$user_code;}
		//if ($master_code==$user_code ){$dist_code=$user_code; $staff_code=0; }else{$dist_code=$master_code; $staff_code=$user_code;}
		if ($s_cust_code>0){ $cust_code=$s_cust_code;}
		else {header( "Location: mainmenu.php" );}
		?>
		<div align="right">Link to: 
			<a href="distributors.catalog.setup.php">Setup Distributor's Catalog</a>
		</div>		
		<?php
		break;
	case 3:
//		$heading1="Assigned Inventory";
		$cust_code=$user_code;
//		$option=3;
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
<table width="761" border="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="47"><div align="right">From:</div></td>
    <td width="192">
	<table width="192" border="1" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="82"><div align="center" class="style54">Date</div></td>
    <td width="51"><div align="center" class="style54">Hrs</div></td>
    <td width="51"><div align="center" class="style54">Mins</div></td>
    </tr>
  <tr>
    <td><div align="left"><SCRIPT language="JavaScript">cal11.writeControl();</SCRIPT></div></td>
    <td>
	  <div align="left">
	    <select name="fromhrs" class="dropdown2" id="fromhrs">
		  <?php for ($i=0;$i<24;$i++) 
		  		{	echo "<option value=" . sprintf('%02d', $i);
					if (isset($_POST['fromhrs'])) {if ($i == $_POST['fromhrs']) {echo ' selected '; }}
					echo ">" . sprintf('%02d', $i) . "</option>";
				} 
			?>
	        </select>
	      </div></td>
    <td>
	  <div align="left">
	    <select name="frommins" class="dropdown2" id="frommins">
		  <?php for ($i=0;$i<60;$i++) 
		  		{	echo "<option value=" . sprintf('%02d', $i);
					if (isset($_POST['frommins'])) {if ($i == $_POST['frommins']) {echo ' selected '; }}
					echo ">" . sprintf('%02d', $i) . "</option>";
				} 
			?>
	      </select>
	      </div></td>
    </tr>
</table>	</td>
    <td width="51"><div align="right">To:</div></td>
    <td width="199">
<table width="195" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td width="85"><div align="left" class="style54">
      <div align="center">Date</div>
    </div></td>
    <td width="51"><div align="left" class="style54">
      <div align="center">Hrs</div>
    </div></td>
    <td width="52"><div align="left" class="style54">
      <div align="center">Mins</div>
    </div></td>
    </tr>
  <tr>
    <td><div align="left"><SCRIPT language="JavaScript">cal12.writeControl();</SCRIPT></div></td>
    <td>	<div align="left">
      <select name="tohrs" class="dropdown2" id="tohrs">
		  <?php for ($i=0;$i<24;$i++) 
		  		{	echo "<option value=" . sprintf('%02d', $i);
					if (isset($_POST['tohrs'])) {if ($i == $_POST['tohrs']) {echo ' selected '; }}
					echo ">" . sprintf('%02d', $i) . "</option>";
				} 
			?>
      </select>
    </div></td>
    <td><div align="left">
      <select name="tomins" class="dropdown2" id="tomins">
		  <?php for ($i=0;$i<60;$i++) 
		  		{	echo "<option value=" . sprintf('%02d', $i);
					if (isset($_POST['tomins'])) {if ($i == $_POST['tomins']) {echo ' selected '; }}
					echo ">" . sprintf('%02d', $i) . "</option>";
				} 
			?>
      </select>
    </div></td>
    </tr>
</table>	</td>
    <td width="123">&nbsp;</td>
    <td width="123"><input type="submit" name="refresh" value="Refresh Logs" /></td>
    <td width="123">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<?php
	$txt_Date1='';
	$txt_Date2='';
	if (isset($_POST['txtDate1'])) 
	{	if ($_POST['txtDate1'] != '')
		{	$txt_Date1= date ("Y-m-d", strtotime ($_POST['txtDate1']));
			$txt_Date1 = $txt_Date1 . ' ' . $_POST['fromhrs'] . ':' . $_POST['frommins'];
		}
	}
	if (isset($_POST['txtDate2'])) 
	{	if ($_POST['txtDate2'] != '')
		{	$txt_Date2= date ("Y-m-d", strtotime ($_POST['txtDate2']));
			$txt_Date2 = $txt_Date2 . ' ' . $_POST['tohrs'] . ':' . $_POST['tomins'];
		}
	}
//	echo $txt_Date1 . '<br>';	
//	echo $txt_Date2 . '<br>';
	$myquery = "SELECT a.log_code, a.cust_code, a.part_code, a.part_quantity, a.action_quantity, a.action, a.timestamp,";
	$myquery.= " b.part_no, b.part_name";
	$myquery.= " FROM _cust_inv_log_$cust_code a, parts b";
	$myquery.= " WHERE a.part_code = b.part_code";
	$myquery.= " AND   a.timestamp >= '$txt_Date1'";
	$myquery.= " AND   a.timestamp <= '$txt_Date2'" ;
//	$myquery.= " AND   b.part_code = 3" ;
	$myquery.= " ORDER BY b.part_no, a.timestamp";	
	//echo $myquery;
//---------------Paging Header--------------------*
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/paging.header.php");
//------------------------------------------------*
$result = mysql_query($myquery." LIMIT $from, $max_results");
//$fields_num = mysql_num_fields($result);
?>
<span class="head1"><?php echo $heading1; ?> </span>
<input name="hidden_code" type="hidden" value="" />

<table width="858" class="listtable2" >
                    <tr class="listheader1" height="22" >
                      <td width="16"><div align="center">*</div></td>
					  <td width="127"><div align="center">Part-No</div></td>
                      <td width="272"><div align="center">Part Name</div></td>
                      <td width="75"><div align="center">Old-Qty</div></td>
					  <td width="75"><div align="center">Action-Qty</div></td>
  					  <td width="75"><div align="center">New-Qty</div></td>
					  <td width="42"><div align="center">Action</div></td>
					  <td width="140"><div align="center">TimeStamp</div></td>
                    </tr>
<?php  
$i=-1;
$t_class_code=0;
$t_type_code=0;
$t_sub_cat_code=0;
$list_bgcolor=$p_list_bgcolor_1;
$t_action="";
$t_new_qty=0;
while($row = mysql_fetch_row($result)) 
{$i = $i + 1;
 //if (!(($t_class_code==$row[10]) && ($t_type_code==$row[11]) && ($t_sub_cat_code==$row[12])))
 if ($i > 10000000)
  {	$t_class_code=$row[10]; $t_type_code=$row[11]; $t_sub_cat_code=$row[12];
	?>
	<tr class="listheader2" height="22" >
	 <td></td> 
	 <td align="left" colspan="7">
	  <?php echo ''. $row[13] .' : '.$row[14].' : '.$row[15].' : '.$row[16] ?> 
	 </td>
	</tr>
	<?php
  }
if ($row[5]== 1) 	{$t_action='Add';	$t_new_qty= $row[3] + $row[4];}
elseif($row[5]== 2) {$t_action='Sub';	$t_new_qty= $row[3] - $row[4];}
elseif($row[5]== 3)	{$t_action='Adj +';	$t_new_qty= $row[3] + $row[4];}
else				{$t_action='Adj -';	$t_new_qty= $row[3] - $row[4];}
?>
	<tr  bgcolor=<?php echo $list_bgcolor; ?> >
	  <td  width="16">
    	<div align="center">
	   	  <input name="partdetail"  type="image" src="images/b_property.png" alt="Part full Details" 
		  value="<?php echo $row[0] ?>" onclick="openwindow(); return false;" >	
	 	</div></td>  
	   <td class="listcell1"><div align="left" ><?php echo $row[7]; ?></div></td>
	   <td class="listcell1"><div align="left" ><?php echo $row[8]; ?></div></td>
	   <td class="listcell1"><div align="right" ><?php echo number_format($row[3],0); ?></div></td>
   	   <td class="listcell1"><div align="right" ><?php echo number_format($row[4],0); ?></div></td>
   	   <td class="listcell1"><div align="right" ><?php echo number_format($t_new_qty,0); ?></div></td>
	   <td class="listcell1"><div align="left" ><?php echo $t_action; ?></div></td>
	   <td class="listcell1"><div align="left" ><?php echo $row[6]; ?></div></td>
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
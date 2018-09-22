<?php ob_start(); ini_set('output_buffering','1'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_1.dwt.php" codeOutsideHTMLIsLocked="false" -->
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
.style11 {font-size: 10px; font-weight: bold; font-family: Verdana, Arial, Helvetica, sans-serif;}
.style13 {font-size: 12px; font-family: Verdana, Arial, Helvetica, sans-serif; }
-->
</style>
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
.style14 {font-size: 16px; }
.style20 {font-size: 14px; font-weight: bold; color:#FF0000}
-->
</style>
<!-- InstanceEndEditable -->
<link href="styles/style.inv.css" rel="stylesheet" type="text/css">
</head>
<?php require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/setup.info.php");	?>
<body  bgcolor="#000000">

<table width="863" border="0" align="center" bgcolor="#CC7777" >
  <tr>
    <td width="1" height="2"></td>
    <td width="839"></td>
    <td width="10"></td>
  </tr>
  <tr>
    <td height="319"></td>
    <td><table width="848" align="center" bgcolor="#CC9999" id="Ist">
      <tr>
        <td height="59" colspan="3" bordercolor="#FFFFFF" bgcolor="#CC9999" class="style9"><div align="center" class="style10"> External Inventory Tracking System </div></td>
      </tr>
      <tr>
        <td height="21">&nbsp;</td>
        <td class="style8"><div align="right" class="style11">&nbsp;</div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="16" height="166">&nbsp;</td>
        <td width="800"><table width="800" border="3" align="center" bordercolor="#D4D0C8" bgcolor="#E4CBCB" class="style13" id="2nd"
		 style=" height:12px">
            <tr align="center" valign="middle">
              <td width="794" >
			  
			    <div align="center"><!-- InstanceBeginEditable name="EditRegion1" -->

<?php
	require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/browser.php");
	require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/lib_1.php");
If (browserCheck())
{
?>
<table width="784" height="370" border="0">
                <tr>
                  <td height="98" colspan="3" class="style14"><div class="head1" align="center">Welcome to External Inventory Tracking System</div></td>
                  </tr>
                <tr>
                  <td height="16">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td width="297" height="90"><p align="right">Login types:-</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p></td>
                  <td width="181">
				    <p align="left">&nbsp;</p>
				    <p align="left"><a href="login.php?option=1" title="Operator's Login Area" accesskey="1">Operator's Login Area</a></p>
				    <p align="left"><a href="login.php?option=2" title="Distributor's Login Area" accesskey="2"> Distributor's Login Area</a></p>
                    <p align="left"><a href="login.php?option=3" title="Customer's Login Area" accesskey="3"> Customer's Login Area</a></p>					</td>
                  <td width="292">&nbsp;</td>
                </tr>
                <tr>
                  <td height="74">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td><p>&nbsp;</p>
                    <p>Designed and developed by: Bilal Ahmed </p></td>
                </tr>
              </table>
<?php } ?>
			  <p>&nbsp;</p>
			  <!-- InstanceEndEditable -->		          </div></td> 
            </tr>
            
        </table></td>
        <td width="16">&nbsp;</td>
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
    </table></td>
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
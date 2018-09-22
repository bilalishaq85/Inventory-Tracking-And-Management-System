<?php ob_start(); ini_set('output_buffering','1'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/session.check.php");	
require_once(str_replace('\\', '/', dirname(__FILE__)) . "/includes/session.end.php");	
?>
<body>
</body>
</html>
<?php ob_flush(); ?>
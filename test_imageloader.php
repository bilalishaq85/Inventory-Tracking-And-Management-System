<?php
$p_max_part_image_size = 20 * 1024 ;
//define a maxim size for the uploaded images in Kb define ("MAX_SIZE","100"); 
//This function reads the extension of the file. It is used to determine if the file  is an image by checking the extension. 
function getExtension($str) 
{	$i = strrpos($str,".");         
	if (!$i) { return ""; }         
	$l = strlen($str) - $i;         
	$ext = substr($str,$i+1,$l);         
	return $ext; 
}

$errors=0;	
//reads the name of the file the user submitted for uploading 	
echo "Step-1";
if(isset($_POST['Submit'])) 
echo "Submitted";
{ 	$image=$_FILES['image']['name']; 	
	//if it is not empty 	
	if ($image)  	
	{ 	//get the original name of the file from the clients machine 		
		$filename = stripslashes($_FILES['image']['name']); 	//get the extension of the file in a lower case format  		
		$extension = getExtension($filename); 		
		$extension = strtolower($extension); 	//if it is not a known extension, it is an error and will not upload the file,
		if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))  		
		{	echo '<h1>Unknown extension!</h1>'; $errors=1; } 		
	else 		
	{	//get the size of the image in bytes 
		//$_FILES['image']['tmp_name'] is the temporary filename of the file 
		//in which the uploaded file was stored on the server 
		$size=filesize($_FILES['image']['tmp_name']);
		//compare the size with the maxim size we defined and print error if bigger
		if ($size > $p_max_part_image_size)
		{	echo '<h1>You have exceeded the size limit!</h1>';	$errors=1;}
			//we will give an unique name, for example the time in unix time format
			$image_name=time().'.'.$extension;
			//$image_name='abc'.'.'.$extension;
			//the new name will be containing the full path where will be stored (images folder)
			$newname="photos/".$image_name;	
			//we verify if the image has been uploaded, and print error instead
			$copied = copy($_FILES['image']['tmp_name'], $newname);
			if (!$copied) {	echo '<h1>Copy unsuccessfull!</h1>';	$errors=1;}}}}
			//If no errors registred, print the success message 
			if(isset($_POST['Submit']) && !$errors)  { 	echo "<h1>File Uploaded Successfully! Try again!</h1>"; } 
		
		?> 
		

<!--next comes the form, you must set the enctype to "multipart/frm-data" and use an input type "file" --> 
<head>
<script language="javascript">
function dispimage()
{		alert(document.detail.photo1.src);
		document.detail.photo1.src = document.detail.image.value;
		alert(document.detail.photo1.src);
		document.detail.photo1.src = 'C:/UCTGlobal/May10/Inventory/photos/Yamaha_2009.jpg';
}
</script>
</head>
<body>
<form name="detail" method="post" enctype="multipart/form-data"  action=""> 
<table> 	
	<tr><td><input type="file" name="image" onChange="document.detail.submit();"></td></tr> 	
	<tr><td><input name="Submit" type="submit" value="Upload image" ></td></tr> 
</table>	 
<p>&nbsp;</p>
</form>
</body>
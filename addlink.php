<?php

define ('SITE_ROOT', realpath(dirname(__FILE__)));

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

if(!isset($_SESSION))
{
	session_start();
}

if (isset($_REQUEST['websiteName']) and isset($_REQUEST['websiteLink']))
{
	$uploaddir = 'images';

	chdir("SportsAppWizard");
	if (!is_dir(SITE_ROOT.'/'.$uploaddir)) {
	    mkdir(SITE_ROOT.'/'.$uploaddir);
	    chdir("images");
	}
	else
	{
		chdir("images");
	}

	$uploadfile = tempnam(SITE_ROOT.'/'.$uploaddir, $_SESSION["wizardTeamName"].'_');

	if (move_uploaded_file($_FILES['image_file']['tmp_name'], $uploadfile)) {
		$ext = pathinfo($_FILES['image_file']['name'], PATHINFO_EXTENSION);
		$newfile = $uploadfile.'.'.$ext;
		rename($uploadfile, $newfile);
		chmod($newfile, 0755);

		array_push($_SESSION['websiteName'], $_REQUEST['websiteName']);
		array_push($_SESSION['websiteLink'], $_REQUEST['websiteLink']);
		array_push($_SESSION['websiteImage'], basename($newfile));
	} else {
	   //echo "Upload failed";
	}
	
	header("location:wizSports5.php?q=0");
}

else if($_GET['skip']=="DeleteAll"){
	
	$_SESSION['websiteName'] = array();
	$_SESSION['websiteLink'] = array();
	$_SESSION['websiteImage'] = array();
	header("location:wizSports6.php");
}
else if($_GET['skip']=="GotoNext"){
	$length = count($_SESSION["websiteName"]);
	echo $length;
	if($length>0){
		
		header("location:wizSports6.php");
	}else{
		header("location:wizSports5.php?q=3");
		}
	
}else
{
	header("location:wizSports5.php?q=1");
}
//echo $_REQUEST['websiteName']."<br>";
//echo $_REQUEST['websiteLink']."<br>";

?>

<?php

define ('SITE_ROOT', realpath(dirname(__FILE__)));

if(!isset($_SESSION))
{
	session_start();
}

function bytesToSize1024($bytes, $precision = 2) {
    $unit = array('B','KB','MB');
    return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
}

if (isset($_GET['q']))
{
	$name = $_GET['q'];
}
if (isset($_GET['next']))
{
	$next = $_GET['next'];
}
if (isset($name))
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
	  //echo "File is valid, and was successfully uploaded.\n";
		$ext = pathinfo($_FILES['image_file']['name'], PATHINFO_EXTENSION);
		$newfile = $uploadfile.'.'.$ext;
		rename($uploadfile, $newfile);
		chmod($newfile, 0755);
		$_SESSION[$name] = basename($newfile);
	} else {
	   //echo "Upload failed";
	}

	/*
	echo "</p>";
	echo '<pre>';
	echo 'Here is some more debugging info:';
	print_r($_FILES);
	print "</pre>";
	*/
}

// We probably need some more error checking here. The tutorial is very simple


header("location:".$next);

?>

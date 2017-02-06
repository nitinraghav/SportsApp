<?php

define ('SITE_ROOT', realpath(dirname(__FILE__)));

	if(!isset($_SESSION))
	{
		session_start();
	}

	if (empty($_SESSION["wizardTeamName"]) or empty($_SESSION["wizardCoachName"]) or empty($_SESSION["wizardCoachEmail"])) {
		// not following along with the forms, move to first page
		header("location:wizSports1.php");
		session_destroy();
		exit;
		$userName=$_SESSION["wizardTeamName"];
	}
	if (isset($_FILES['image_file']))
	{
		
		if (empty($_FILES['image_file']['error']))
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

			$uploadfile = tempnam(SITE_ROOT.'/'.$uploaddir, $_SESSION["wizardTeamName"]);

			if (move_uploaded_file($_FILES['image_file']['tmp_name'], $uploadfile)) {
			  //echo "File is valid, and was successfully uploaded.\n";
				$ext = pathinfo($_FILES['image_file']['name'], PATHINFO_EXTENSION);
				$newfile = $uploadfile.'.'.$ext;
				rename($uploadfile, $newfile);
				chmod($newfile, 0755);
				$_SESSION['bg_image'] = basename($newfile);
				$_SESSION["bg_color"]="";
				//copy('http://launchliveapp.com/SportsAppWizard/images/'.$_SESSION['bg_image'], "http://launchliveapp.com//users-folder/$userName/liveapp/app_bg_image.jpg");
				//echo "bg".$_SESSION["bg_image"];
				//echo "stored: ".$_SESSION["bg_color"]."<br>";
				
			} else {
			   echo "Upload failed";
			}
		}else if (isset($_REQUEST['color']))
	{
		//echo "Color: ".$_REQUEST['color']."<br>";
		$_SESSION["bg_color"] = $_REQUEST['color'];
		$_SESSION['bg_image'] = "";
		//echo "bg".$_SESSION["bg_image"];
		//echo "stored: ".$_SESSION["bg_color"]."<br>";
	}
	}
	
	//header("location: wizSports9.php");
	header("location: wizSports9.php");
//cho function_exists("copy");
?>

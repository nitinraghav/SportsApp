<?php
define ('SITE_ROOT', realpath(dirname(__FILE__)));

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

if(!isset($_SESSION))
{
	session_start();
}

include '../config.php';
include 'to12hr.php';

if (empty($_SESSION["wizardTeamName"]) or empty($_SESSION["wizardCoachName"]) or empty($_SESSION["wizardCoachEmail"])) {
	// not following along with the forms, move to first page
	header("location:wizSports1.php");
	session_destroy();
	exit;
}

$userID = $_SESSION['user_id']; 
$userName = $_SESSION['user_name'];
//$_SESSION['user_id'] = $userID;
//$_SESSION['user_name'] = $userName;

if(!mysql_query("DELETE FROM `liveapp` WHERE `user_id` = ".$userID))
{
  //die('Error: ' . mysql_error());
}

// Add a text widget (company name)
$pagenumber = 1; // the Signup Wizard only has 1 page on its app
$skip = "no"; // wheither this field should be skipped when tabbing through the page
$font = "Arial"; // double check if this is a valid font for widgets
$size = 14; // double-check if this is a valid text-size for widgets
if (isset($_SESSION["bg_color"]))
{
	$color = $_SESSION["bg_color"]; // this color comes from the forms! 
}
else
{
	$color = "#000000";
}
//$teamName = "<p style=\"text-align: center; background-color:".$color."\">";
//if (empty($_SESSION["app_logo"]["error"]))
//{
	//$teamName .= "<img style=\"width: 50px; height: 50px;\" src=\"http://www.launchliveapp.com/SportsAppWizard/images/".$_SESSION["app_logo"]["name"]."\">";
//}
//$teamName .= $_SESSION["wizardTeamName"]."</p>";
$number = 1; // this might be the sorting order for the widgets
$bgHeight = 130;  // FIX: This is required due to a bug in the Portal's Image Widget. 
// Math.round(new Date().getTime() / 100000) + Math.floor(Math.random()*100001) + user_id;

$liveapp_id = uniqid($userID.strval(rand(0, 10000))."1"); // generate unique id

//$insertQuery = "INSERT INTO liveapp(user_id,number,type, liveapp_id, comment, skip, page_number, font, size, background_color) ";
//$insertQuery .= "VALUES('$userID','$number','textbox','$liveapp_id', '$teamName', '$skip', $pagenumber, '$font', '$size', '$color')";

//echo $insertQuery."<br>";

//if(!mysql_query($insertQuery))
//{
  //die('Error: ' . mysql_error());
//}

//$result_add = $connection->query($insertQuery) or die($connection->error);
//echo $result_add."<br>";

$comment = "<p style=\"text-align: center; background-color:".$color."\">Schedule</p>"; // Custom HTML widget data 
$scheduleAssigned = false;
for ($i = 0; $i < count($_SESSION['dates']); $i++)
{
	if (!empty($_SESSION['dates'][$i]))
	{
		$comment .= '<p style=background-color:'.$color.'>'.$_SESSION['gametypes'][$i].' on '.$_SESSION['dates'][$i].' at '.to12hr($_SESSION['times'][$i]).', '.$_SESSION['locations'][$i].'</p>';
		$scheduleAssigned = true;
	}
}

if ($scheduleAssigned)
{
	//$number++;
	$liveapp_id = uniqid($userID.strval(rand(0, 10000))."2"); // generate unique id
	$insertQuery = "INSERT INTO liveapp(user_id,number,type, liveapp_id, comment, skip, page_number, font, size, background_color) ";
	$insertQuery .= "VALUES('$userID','$number','textbox','$liveapp_id', '$comment', '$skip', $pagenumber, '$font', '$size', '$color')";

	//echo $insertQuery."<br>";

	if(!mysql_query($insertQuery))
	{
	  //die('Error: ' . mysql_error());
	}
}

//$result_add = $connection->query($insertQuery) or die($connection->error);
//echo $result_add."<br>";

$comment = "<p style=\"text-align: center;background-color:".$color."\">Contacts</p>"; // Custom HTML widget data 
$number++;
$liveapp_id = uniqid($userID.strval(rand(0, 10000))."3"); // generate unique id

$insertQuery = "INSERT INTO liveapp(user_id, number, type, liveapp_id, comment, skip, page_number, font, size, background_color) ";
$insertQuery .= "VALUES('$userID','$number','textbox','$liveapp_id', '$comment', '$skip', $pagenumber, '$font', '$size', '$color')";

//echo $insertQuery."<br>";

if(!mysql_query($insertQuery))
{
  //die('Error: ' . mysql_error());
}

//$result_add = $connection->query($insertQuery) or die($connection->error);
//echo $result_add."<br>";

$numElements = 0;
if (!empty($_SESSION["Titles"]) and !empty($_SESSION["Names"]))
{
	$length = count($_SESSION["Titles"]);
	for ($i = 0; $i < $length; $i++) 
	{
		$number++;
		$liveapp_id = uniqid($userID.strval(rand(0, 10000))."4"); // generate unique id
		$title = "<p style=\"background-color:".$color."\">".$_SESSION["Titles"][$i].": ".$_SESSION["Names"][$i]."</p>";
		//echo $title;
		$insertQuery = "INSERT INTO liveapp(user_id, number, type, liveapp_id, comment, skip, page_number, font, size, background_color) ";
		$insertQuery .= "VALUES('$userID','$number','textbox','$liveapp_id', '$title', '$skip', $pagenumber, '$font', '$size', '$color')";
		if(!mysql_query($insertQuery))
		{
		  die('Error: ' . mysql_error());
		}
		$number++;
		$numElements++;
		if (isset($_SESSION["Emails"][$i]) and isset($_SESSION["Phones"][$i])) 
		{
			$phone = $_SESSION['Phones'][$i];
			$emailaddress = $_SESSION['Emails'][$i];
			
			$liveapp_id = uniqid($userID.strval(rand(0, 10000))."4"); // generate unique id
			
			$insertQuery = "INSERT INTO liveapp(user_id, number, type, liveapp_id, skip, page_number, numCols, colNum, phone_number, item_width) ";
			$insertQuery .= "VALUES('$userID','$number','phone','$liveapp_id', '$skip', $pagenumber, 2, 0, '$phone', 50)";

			if(!mysql_query($insertQuery))
			{
			  die('Error: ' . mysql_error());
			}
			
			if (!isset($emailaddress) or empty($emailaddress))
			{
				$emailaddress = "none";
			}
			
			//$result_add = $connection->query($insertQuery) or die($connection->error);
			//echo $result_add."<br>";
			
			$liveapp_id = uniqid($userID.strval(rand(0, 10000))."4"); // generate unique id
			
			$insertQuery = "INSERT INTO liveapp(user_id, number, type, liveapp_id, skip, page_number, numCols, colNum, email, item_width) ";
			$insertQuery .= "VALUES('$userID','$number','email','$liveapp_id', '$skip', $pagenumber, 2, 1, '$emailaddress', 50)";

			if(!mysql_query($insertQuery))
			{
			  //die('Error: ' . mysql_error());
			}
			
			//$result_add = $connection->query($insertQuery) or die($connection->error);
			//echo $result_add."<br>";
		}
		if ($numElements == 2)
		{
			break; // only allow three contacts to be displayed
		}
	}
}
//echo SITE_ROOT."<br>";

if (isset($_SESSION['websiteName']) and isset($_SESSION['websiteLink']))
{
	$comment = "<p style=\"text-align: center; background-color:".$color."\">Quick links</p>"; // Custom HTML widget data 
	$number++;
	$liveapp_id = uniqid($userID.strval(rand(0, 10000))."5"); // generate unique id

	$insertQuery = "INSERT INTO liveapp(user_id, number, type, liveapp_id, comment, skip, page_number, font, size, background_color) ";
	$insertQuery .= "VALUES('$userID','$number','textbox','$liveapp_id', '$comment', '$skip', $pagenumber, '$font', '$size', '$color')";

	if(!mysql_query($insertQuery))
	{
	  //die('Error: ' . mysql_error());
	}
	$number++;
	
	$length = count($_SESSION['websiteName']);
	//echo $length."<br>";
	$comment = "<p style=\"text-align: center; background-color:".$color."\">";
	for ($i = 0; $i < $length; $i++)
	{
		$currentImage = $_SESSION['websiteImage'][$i];
		$path = "http://www.launchliveapp.com/SportsAppWizard/images/".$currentImage['name'];
		$name = $_SESSION["websiteName"][$i];
		$url = $_SESSION["websiteLink"][$i];
		//echo $name."<br>";
		//echo $url."<br>";
		if ($i >= 1)
		{
			$comment .= "&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		if (empty($currentImage["error"]))
		{
			$comment .= "<a href=\"".$url."\"><img style=\"width: 50px; height: 50px;\" src=\"".$path."\"></a>"; 
		}
		else
		{
			$comment .= "<a href=\"".$url."\">".$name."</a>"; 
		}
		//echo $comment."<br>";
		$liveapp_id = uniqid($userID.strval(rand(0, 10000))."5"); // generate unique id
		//$connection->query($insertQuery);
	}
	$comment .= "</p>";
	$insertQuery = "INSERT INTO liveapp(user_id, number, type, liveapp_id, comment, skip, page_number, font, size, background_color) ";
	$insertQuery .= "VALUES('$userID','$number','textbox','$liveapp_id', '$comment', '$skip', $pagenumber, '$font', '$size', '$color')";
	$number++;
	if(!mysql_query($insertQuery))
	{
	  //die('Error: ' . mysql_error());
	}
}

if (isset($_SESSION["sponsor_image"]))
{
	if (!empty($_SESSION["sponsor_image"]["name"]))
	{
		$comment = "<p style=\"text-align: center; background-color:".$color."\">Sponsor</p>"; // Custom HTML widget data 
		$number++;
		$liveapp_id = uniqid($userID.strval(rand(0, 10000))."6"); // generate unique id
		$path = "http://www.launchliveapp.com/SportsAppWizard/images/".$_SESSION["sponsor_image"]['name'];
		$comment .= "<img style=\"display: block; margin-left: auto; margin-right: auto; width: 100%; height:100%;\" src=\"".$path."\">";
		$insertQuery = "INSERT INTO liveapp(user_id, number, type, liveapp_id, comment, skip, page_number, font, size, background_color) ";
		$insertQuery .= "VALUES('$userID','$number','textbox','$liveapp_id', '$comment', '$skip', $pagenumber, '$font', '$size', '$color')";

		if(!mysql_query($insertQuery))
		{
		  //die('Error: ' . mysql_error());
		}
		$number++;
	}
}

$socialMediaMenu = "<div style=\"margin: auto; width: 100%;\">";
$socialMediaMenuItems = count($_SESSION["social_media"]);
for ($i = 0; $i < $socialMediaMenuItems; $i++)
{
	$socialMediaMenu .= "<a style=\"padding: 10px;\" target=\"_blank\" href=\"".$_SESSION["social_media"][$i]."\">";
	$socialMediaMenu .= "<img style=\"width: 50px; height: 50px;\" src=\"http://launchliveapp.com/SportsAppWizard/img/";
	if (
		strncmp ( $_SESSION["social_media"][$i], "http://www.facebook.com" , strlen("http://www.facebook.com") ) == 0
		or strncmp ( $_SESSION["social_media"][$i], "http://facebook.com" , strlen("http://facebook.com") ) == 0
	)
	{
		$socialMediaMenu .= "facebook-logo.svg\">";
	}
	else if (
		strncmp ( $_SESSION["social_media"][$i], "http://www.twitter.com" , strlen("http://www.twitter.com") ) == 0
		or strncmp ( $_SESSION["social_media"][$i], "http://twitter.com" , strlen("http://twitter.com") ) == 0
	)
	{
		$socialMediaMenu .= "twitter-logo-on-black-background.svg\">";
	}
	else if (
		strncmp ( $_SESSION["social_media"][$i], "http://www.youtube.com" , strlen("http://www.youtube.com") ) == 0
		or strncmp ( $_SESSION["social_media"][$i], "http://youtube.com" , strlen("http://youtube.com") ) == 0
	)
	{
		$socialMediaMenu .= "youtube-logo.svg\">";
	}
	else if (
		strncmp ( $_SESSION["social_media"][$i], "http://www.linkedin.com" , strlen("http://www.linkedin.com") ) == 0
		or strncmp ( $_SESSION["social_media"][$i], "http://linkedin.com" , strlen("http://linkedin.com") ) == 0
	)
	{
		$socialMediaMenu .= "linkedin.svg\">";
	}
	$socialMediaMenu .= "</a>";
}
$socialMediaMenu .= "</div>";

$liveapp_id = uniqid($userID.strval(rand(0, 10000))."7"); // generate unique id
$insertQuery = "INSERT INTO liveapp(user_id, number, type, liveapp_id, comment, skip, page_number, font, size, background_color) ";
$insertQuery .= "VALUES('$userID','$number','textbox','$liveapp_id', '$socialMediaMenu', '$skip', $pagenumber, '$font', '$size', '$color')";
if(!mysql_query($insertQuery))
{
  //die('Error: ' . mysql_error());
}

// Here we have to redirect to processliveappXML
header("location: ../processliveappXML_SAW.php");

?>
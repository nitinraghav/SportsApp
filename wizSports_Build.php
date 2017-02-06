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

// file_put_contents("log.txt", "GET: ".var_export($_GET, true)."\n", FILE_APPEND);

if (isset($_GET["newsession"]))
{
	//echo "newssesion";
	header("location: ../processsignup_SAW.php");
	exit;
}

/*
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
*/
//echo '<input type ="button" onclick="location.href = \'../processimages_SAW.php\';" value="Build (Wizard)"> ';
//echo '<input type ="button" onclick="location.href = \'../processimages.php\';" value="Build (Portal)"> ';

?>

<html>
<head><script type="text/javascript">var _gaq=_gaq||[];_gaq.push(['_setSiteSpeedSampleRate',100]);</script>
<title>Signup Wizard</title>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<!-- NEW BOOTSTRAP CSS -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<!-- Added CSS for design wizard -->
<link rel="stylesheet" href="css/sportsAppWiz.css">
<!-- taken from Loyalty Widget and updated-->
<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body onunload="endProcess()" >
<div class="container">
<header class="branding">

</header>
<header class="row">
<!--<div class="welcome-message col-md-12">-->
<div class="col-md-12 designWizardHeader">
<img  class="logoImage" src="img/live_app_logo.png" alt=""/>
<div class="headerText" >LiveApp Team Wizard</div>
<div style="clear:both;"></div>
</div>

</header>

<section class="col-md-12 sectionW1" >
<div class="buildContent">
	<img  class="buildImage" src="img/gear_fade.png" alt=""/>
	<div class="buildingText"> Building your app ...</div>
</div>
</section>

<!--</div>--><!--End Container  -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>

$('.buildImage').animate({  borderSpacing: 1200000 }, {
	step: function(now,fx) {
	  $(this).css('-webkit-transform','rotate('+now+'deg)');
	  $(this).css('-moz-transform','rotate('+now+'deg)');
	  $(this).css('transform','rotate('+now+'deg)');
	},
	duration: 2700000
},'linear');

function endProcess(){
      $( ".buildImage" ).stop();
}
</script>
<script type="text/javascript">if(window.parent==window){var _gaq=_gaq||[];_gaq.push(['_setAccount','UA-59566634-1']);_gaq.push(['_setDomainName','www.liveapp.ca']);_gaq.push(['_setAllowLinker',true]);_gaq.push(['_trackPageview']);(function(){var ga=document.createElement('script');ga.type='text/javascript';ga.async=true;ga.src='http://www.google-analytics.com/ga.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga,s);})();}</script></body>

<?php

$userID = $_SESSION['user_id'];
$userName = $_SESSION['user_name'];
//$_SESSION['user_id'] = $userID;
//$_SESSION['user_name'] = $userName;

//if(!mysql_query("DELETE FROM `liveapp` WHERE `user_id` = ".$userID))
//{
//	echo $number."<br>";
  //die('Error: ' . mysql_error());
//}

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
	$color = "";
}


$insertQuery = "UPDATE user_settings SET appBgColor='$color' WHERE user_id='$userID' AND app_name='$userName'";

	//echo $insertQuery."<br>";

	if(!mysql_query($insertQuery))
	{
		//echo $number."<br>";
	  die('Error: ' . mysql_error());
	}
				//title bar image//
				$filename1 = "img/TitleBar.png";
				$newfilename1 = "../users-folder/$userName/liveapp/TitleBar.png";
				copy($filename1, $newfilename1);
				
				$insertQuery = "INSERT INTO liveapp(user_id,number,page_number,type, location, plocation, text,opens_in,hor_width,item_width, numCols, colNum, item_height,bg_color) ";
				$insertQuery .= "VALUES('$userID','1','1','app', 'TitleBar.png','TitleBar.png', '2','APP','100', '100', '1', '0', '130','transparent'),";
                $insertQuery .= "('$userID','1','2','app', 'TitleBar.png','TitleBar.png', '2','APP','100', '100', '1', '0', '130','transparent'),";
				$insertQuery .= "('$userID','1','3','app', 'TitleBar.png','TitleBar.png', '2','APP','100', '100', '1', '0', '130','transparent'),";
				$insertQuery .= "('$userID','1','4','app', 'TitleBar.png','TitleBar.png', '2','APP','100', '100', '1', '0', '130','transparent'),";
				$insertQuery .= "('$userID','1','5','app', 'TitleBar.png','TitleBar.png', '2','APP','100', '100', '1', '0', '130','transparent')";
                if(!mysql_query($insertQuery))
                {
                    die('Error: ' . mysql_error());
                }
				
				//space image//
				
				$filename = "img/space.png";
				$newfilename = "../users-folder/$userName/liveapp/space.png";
				copy($filename, $newfilename);
				$insertQuery = "INSERT INTO liveapp(user_id,number,page_number,type,location, plocation,hor_width,item_width, numCols, colNum, item_height,bg_color) ";
				$insertQuery .= "VALUES('$userID','4','1','app','space.png','space.png',   '100', '100', '1', '0', '130','transparent'),";
				$insertQuery .= "('$userID','6','1','app','space.png','space.png',   '100', '100', '1', '0', '130','transparent'),";
				$insertQuery .= "('$userID','8','1','app','space.png','space.png',   '100', '100', '1', '0', '130','transparent'),";
				$insertQuery .= "('$userID','10','1','app','space.png','space.png',   '100', '100', '1', '0', '130','transparent'),";
				//$insertQuery .= "('$userID','4','2','app','space.png','space.png',   '100', '100', '1', '0', '130','transparent'),";
				//$insertQuery .= "('$userID','7','2','app','space.png','space.png',   '100', '100', '1', '0', '130','transparent'),";
				$insertQuery .= "('$userID','4','3','app','space.png','space.png',   '100', '100', '1', '0', '130','transparent'),";
				$insertQuery .= "('$userID','4','4','app','space.png','space.png',   '100', '100', '1', '0', '130','transparent'),";
				$insertQuery .= "('$userID','4','5','app','space.png','space.png',   '100', '100', '1', '0', '130','transparent'),";
				$insertQuery .= "('$userID','6','5','app','space.png','space.png',   '100', '100', '1', '0', '130','transparent')";
				if(!mysql_query($insertQuery))
                {
                    die('Error: ' . mysql_error());
                }
				$filename = "img/moreSpace.png";
				$newfilename = "../users-folder/$userName/liveapp/moreSpace.png";
				copy($filename, $newfilename);
				$insertQuery = "INSERT INTO liveapp(user_id,number,page_number,type,location, plocation,hor_width,item_width, numCols, colNum, item_height,bg_color) ";
				$insertQuery .= "VALUES('$userID','11','1','app','moreSpace.png','moreSpace.png',   '100', '100', '1', '0', '130','transparent'),";
				$insertQuery .= "('$userID','5','3','app','moreSpace.png','moreSpace.png',   '100', '100', '1', '0', '130','transparent'),";
				$insertQuery .= "('$userID','6','3','app','moreSpace.png','moreSpace.png',   '100', '100', '1', '0', '130','transparent'),";
				$insertQuery .= "('$userID','7','3','app','moreSpace.png','moreSpace.png',   '100', '100', '1', '0', '130','transparent'),";
				$insertQuery .= "('$userID','8','3','app','moreSpace.png','moreSpace.png',   '100', '100', '1', '0', '130','transparent'),";
				//$insertQuery .= "('$userID','7','5','app','moreSpace.png','moreSpace.png',   '100', '100', '1', '0', '130','transparent'),";
				$insertQuery .= "('$userID','8','5','app','moreSpace.png','moreSpace.png',   '100', '100', '1', '0', '130','transparent')";
				if(!mysql_query($insertQuery))
                {
                    die('Error: ' . mysql_error());
                }
				
				$filename = "img/shadow.png";
				$newfilename = "../users-folder/$userName/liveapp/shadow.png";
				copy($filename, $newfilename);
				
				$insertQuery = "INSERT INTO liveapp(user_id,number,page_number,type,location, plocation,hor_width,item_width, numCols, colNum, item_height,bg_color) ";
				$insertQuery .= "VALUES('$userID','2','1','app','shadow.png','shadow.png',    '100', '100', '1', '0', '130','transparent'),";
				$insertQuery .= "('$userID','13','1','app','shadow.png','shadow.png',    '100', '100', '1', '0', '130','transparent'),";
				$insertQuery .= "('$userID','2','2','app','shadow.png','shadow.png',    '100', '100', '1', '0', '130','transparent'),";
				$insertQuery .= "('$userID','31','2','app','shadow.png','shadow.png',    '100', '100', '1', '0', '130','transparent'),";
				$insertQuery .= "('$userID','2','3','app','shadow.png','shadow.png',    '100', '100', '1', '0', '130','transparent'),";
				$insertQuery .= "('$userID','13','3','app','shadow.png','shadow.png',    '100', '100', '1', '0', '130','transparent'),";
				$insertQuery .= "('$userID','2','4','app','shadow.png','shadow.png',    '100', '100', '1', '0', '130','transparent'),";
				$insertQuery .= "('$userID','13','4','app','shadow.png','shadow.png',    '100', '100', '1', '0', '130','transparent'),";
				$insertQuery .= "('$userID','2','5','app','shadow.png','shadow.png',    '100', '100', '1', '0', '130','transparent'),";
				$insertQuery .= "('$userID','201','5','app','shadow.png','shadow.png',    '100', '100', '1', '0', '130','transparent')";
				if(!mysql_query($insertQuery))
                {
                    die('Error: ' . mysql_error());
                }
				// footer images//
				$filename = "img/facebook.png";
				$newfilename = "../users-folder/$userName/liveapp/facebook.png";
				copy($filename, $newfilename);
			
				$filename = "img/twitter2.png";
				$newfilename = "../users-folder/$userName/liveapp/twitter2.png";
				copy($filename, $newfilename);
			if(isset($_SESSION["wizardFacebookURL"])){
				$facebook =$_SESSION["wizardFacebookURL"];
			}else{
				$facebook ="";
			}
			if(isset($_SESSION["wizardtwitterNameURL"])){
				$twitter =$_SESSION["wizardtwitterNameURL"];
			}else{
				$twitter ="";
			}
				$insertQuery = "INSERT INTO liveapp(user_id,number,page_number,type,location, plocation,url, text,opens_in,hor_width,item_width, numCols, colNum, item_height,bg_color) ";
				$insertQuery .= "VALUES('$userID','12','1','web','facebook.png','facebook.png', '$facebook',  'liveappshare','WEB_BROWSER','100', '24', '2', '0', '130','transparent'),";
				$insertQuery .= "('$userID','12','1','web','twitter2.png','twitter2.png', '$twitter',   'liveappshare','WEB_BROWSER','100', '24', '2', '1', '130','transparent'),";
				$insertQuery .= "('$userID','30','2','web','facebook.png','facebook.png', '$facebook',  'liveappshare','WEB_BROWSER','100', '24', '2', '0', '130','transparent'),";
				$insertQuery .= "('$userID','30','2','web','twitter2.png','twitter2.png', '$twitter',    'liveappshare','WEB_BROWSER','100', '24', '2', '1', '130','transparent'),";
				$insertQuery .= "('$userID','12','3','web','facebook.png','facebook.png', '$facebook',   'liveappshare','WEB_BROWSER','100', '24', '2', '0', '130','transparent'),";
				$insertQuery .= "('$userID','12','3','web','twitter2.png','twitter2.png', '$twitter',   'liveappshare','WEB_BROWSER','100', '24', '2', '1', '130','transparent'),";
				$insertQuery .= "('$userID','12','4','web','facebook.png','facebook.png', '$facebook', 'liveappshare','WEB_BROWSER','100', '24', '2', '0', '130','transparent'),";
				$insertQuery .= "('$userID','12','4','web','twitter2.png','twitter2.png', '$twitter',   'liveappshare','WEB_BROWSER','100', '24', '2', '1', '130','transparent'),";
				$insertQuery .= "('$userID','200','5','web','facebook.png','facebook.png', '$facebook',  'liveappshare','WEB_BROWSER','100', '24', '2', '0', '130','transparent'),";
				$insertQuery .= "('$userID','200','5','web','twitter2.png','twitter2.png', '$twitter',   'liveappshare','WEB_BROWSER','100', '24', '2', '1', '130','transparent')";
				if(!mysql_query($insertQuery))
                {
                    die('Error: ' . mysql_error());
                }
				
				//Schedule image//
				
				$filename = "img/Schedules.png";
				$newfilename = "../users-folder/$userName/liveapp/Schedules.png";
				copy($filename, $newfilename);
				//$liveapp_id=uniqid();
				
				
				$insertQuery = "INSERT INTO liveapp(user_id,number,page_number,type, location, plocation,  text,opens_in,hor_width,item_width, numCols, colNum) ";
				$insertQuery .= "VALUES('$userID','3','1','app', 'Schedules.png','Schedules.png',   '2','APP','100', '100', '1', '0'),";
				$insertQuery .= "('$userID','3','2','app', 'Schedules.png','Schedules.png',   '2','APP','100', '100', '1', '0')";
                if(!mysql_query($insertQuery))
                {echo "14";
                    die('Error: ' . mysql_error());
                }
				$filename = "img/octorber16.png";
				$newfilename = "../users-folder/$userName/liveapp/octorber16.png";
				copy($filename, $newfilename);
				/*$insertQuery = "INSERT INTO liveapp(user_id,number,page_number,type, location, plocation,  text,opens_in,hor_width,item_width, numCols, colNum) ";
				$insertQuery .= "VALUES('$userID','5','2','app', 'octorber16.png','octorber16.png',   '2','APP','100', '100', '1', '0')";
                if(!mysql_query($insertQuery))
                {echo "14";
                    die('Error: ' . mysql_error());
                }*/
				$filename = "img/november16.png";
				$newfilename = "../users-folder/$userName/liveapp/november16.png";
				copy($filename, $newfilename);
				/*$insertQuery = "INSERT INTO liveapp(user_id,number,page_number,type, location, plocation,  text,opens_in,hor_width,item_width, numCols, colNum) ";
				$insertQuery .= "VALUES('$userID','6','2','app', 'november16.png','november16.png',   '2','APP','100', '100', '1', '0')";
                if(!mysql_query($insertQuery))
                {echo "14";
                    die('Error: ' . mysql_error());
                }*/
				if (!empty($_SESSION["dates"]) and !empty($_SESSION["locations"]))
				{
					$length = count($_SESSION["gametypes"]);
					$j=8;
					for ($i = 0; $i < $length; $i++) {
						if (!empty($_SESSION["dates"][$i]) and !empty($_SESSION["locations"][$i]))
						{
						  $sGame= $_SESSION["gametypes"][$i];
						  $sDate= $_SESSION["dates"][$i];
						  $sTime=$_SESSION["times"][$i];
						  $sLocation= $_SESSION["locations"][$i];
						  $j=$j+1;
							$insertQuery = "INSERT INTO liveapp(user_id,number,page_number,type,alignment,size,font,background_color,textbox,textcolor,item_height,comment) ";
							$insertQuery .= "VALUES('$userID','$j','2','textbox','left','20','Verdana, Geneva, sans-serif','transparent','true','000000','130','";
							$insertQuery .= "<p>";
								$insertQuery .= "<span data-redactor-tag=\"span\" data-verified=\"redactor\" data-redactor-style=\"color: #000000;\" style=\"color: rgb(0, 0, 0);\">";
									$insertQuery .= "<strong data-redactor-tag=\"strong\" data-verified=\"redactor\"></strong>";
									$insertQuery .= "<span data-redactor-tag=\"span\" data-verified=\"redactor\" data-redactor-style=\"color: rgb(0, 0, 0); background-color: initial; text-align: left;\" rel=\"color: rgb(0, 0, 0); background-color: initial; text-align: left;\" style=\"background-color: initial;margin-left=3%; text-align: left; font-size: 24px;\">";
										$insertQuery .= "<strong data-redactor-tag=\"strong\" data-verified=\"redactor\" style=\" margin-left: 6%;\">$sGame</strong>";
									$insertQuery .= "</span>";
								$insertQuery .= "</span>";
							$insertQuery .= "</p>";

							$insertQuery .= "<ul style=\"list-style-type: disc; list-style-position: outside; margin-left: 40px;\">";
								$insertQuery .= "<li>";
									$insertQuery .= "<span data-redactor-tag=\"span\" data-verified=\"redactor\" data-redactor-style=\"color: #000000;\" style=\"font-size:20px;color: rgb(0, 0, 0);\">$sDate</span>";
								$insertQuery .= "</li>";
								$insertQuery .= "<li>";
									$insertQuery .= "<span data-redactor-tag=\"span\" data-verified=\"redactor\" data-redactor-style=\"color: #000000;\" style=\"font-size:20px;color: rgb(0, 0, 0);\">$sTime</span>";
								$insertQuery .= "</li>";
								$insertQuery .= "<li>";
									$insertQuery .= "<span data-redactor-tag=\"span\" data-verified=\"redactor\" data-redactor-style=\"color: #000000;\" style=\"color: rgb(0, 0, 0);\"><span data-redactor-tag=\"span\" data-verified=\"redactor\" data-redactor-style=\"color: rgb(0, 0, 0);\" rel=\"color: rgb(0, 0, 0);\"></span></span><span data-redactor-tag=\"span\" data-verified=\"redactor\" data-redactor-style=\"color: #000000;\" style=\"font-size:20px;color: rgb(0, 0, 0);\">$sLocation</span>";
								$insertQuery .= "</li>";
							$insertQuery .= "</ul>";
							$insertQuery .= "<p>";
								$insertQuery .= "<span data-redactor-tag=\"span\" data-verified=\"redactor\" data-redactor-style=\"color: rgb(0, 0, 0);\" rel=\"font-size:20px;color: rgb(0, 0, 0);\" style=\"color: rgb(0, 0, 0);\"></span>";
							$insertQuery .= "</p>')";
							if(!mysql_query($insertQuery))
							{
								die('Error: ' . mysql_error());
							}
							$s=$j+1;
							$insertQuery = "INSERT INTO liveapp(user_id,number,page_number,type,location, plocation,hor_width,item_width, numCols, colNum, item_height,bg_color) ";
							$insertQuery .= "VALUES('$userID','$s','2','app','space.png','space.png',   '100', '100', '1', '0', '130','transparent'),";
							$insertQuery .= "('$userID','$s+1','2','app','space.png','space.png',   '100', '100', '1', '0', '130','transparent'),";
							$insertQuery .= "('$userID','$s+1','2','app','space.png','space.png',   '100', '100', '1', '0', '130','transparent'),";
							$insertQuery .= "('$userID','$s+2','2','app','space.png','space.png',   '100', '100', '1', '0', '130','transparent')";
							if(!mysql_query($insertQuery))
							{
								die('Error: ' . mysql_error());
							}
						} 
						
					}
					
				}
				//MedicalInfo image//
				
				$filename = "img/MedicalInfo.png";
				$newfilename = "../users-folder/$userName/liveapp/MedicalInfo.png";
				copy($filename, $newfilename);
				
				$insertQuery = "INSERT INTO liveapp(user_id,number,page_number,type, location, plocation,  text,opens_in,hor_width,item_width, numCols, colNum, item_height,bg_color) ";
				$insertQuery .= "VALUES('$userID','5','1','app','MedicalInfo.png','MedicalInfo.png',   '3','APP','100', '100', '1', '0', '130','transparent'),";
				$insertQuery .= "('$userID','3','3','app','MedicalInfo.png','MedicalInfo.png',   '3','APP','100', '100', '1', '0', '130','transparent')";
                
                if(!mysql_query($insertQuery))
                {
                    die('Error: ' . mysql_error());
                }
				
				//Contacts image//
				
				$filename = "img/Contacts.png";
				$newfilename = "../users-folder/$userName/liveapp/Contacts.png";
				copy($filename, $newfilename);
				
				
				$insertQuery = "INSERT INTO liveapp(user_id,number,page_number,type,location, plocation,  text,opens_in,hor_width,item_width, numCols, colNum, item_height,bg_color) ";
				$insertQuery .= "VALUES('$userID','7','1','app','Contacts.png','Contacts.png',   '4','APP','100', '100', '1', '0', '130','transparent'),";
                $insertQuery .= "('$userID','3','4','app','Contacts.png','Contacts.png',   '4','APP','100', '100', '1', '0', '130','transparent')";
                if(!mysql_query($insertQuery))
                {
                    die('Error: ' . mysql_error());
                }
				if (!empty($_SESSION["Titles"]) and !empty($_SESSION["Names"]))
				{
					$length = count($_SESSION["Titles"]);
					for ($i = 0; $i < $length; $i++) {
					  $conTitle= $_SESSION["Titles"][$i];
					  $conName= $_SESSION["Names"][$i];
					  if (!empty($_SESSION["Emails"][$i]))
					  {
						  $conEmail=$_SESSION["Emails"][$i];
					  }
					  else
					  {
						  $conEmail="";
					  }
					  if (!empty($_SESSION["Phones"][$i]))
					  {
						  $conPhone= $_SESSION["Phones"][$i];
					  }
					  else
					  {
						  $conPhone= "";
					  }
						$insertQuery = "INSERT INTO liveapp(user_id,number,page_number,type,contactName,contactDescript,contactAddr,contactBt1img,contactBt1,contactBt2img,contactBt2,contactBt3img,contactBt3,contactBtBg) ";
						$insertQuery .= "VALUES('$userID','5','4','contact','$conName','$conTitle','','tel.png','$conPhone','sms.png','$conPhone','email.png','$conEmail','rgba(56, 119, 94, 0.93)')";
						if(!mysql_query($insertQuery))
						{
							die('Error: ' . mysql_error());
						}
					  
					}
					
				}else{
					
					$insertQuery = "INSERT INTO liveapp(user_id,number,page_number,type,contactName,contactDescript,contactAddr,contactBt1img,contactBt2img,contactBt3img,contactBtBg) ";
					$insertQuery .= "VALUES('$userID','5','4','contact','Name','Position','','tel.png','sms.png','email.png','rgba(56, 119, 94, 0.93)')";
					if(!mysql_query($insertQuery))
					{
						die('Error: ' . mysql_error());
					}
				}
				
				//Check in image//
				
				$filename = "img/CheckMark.png";
				$newfilename = "../users-folder/$userName/liveapp/CheckMark.png";
				copy($filename, $newfilename);
				
				$insertQuery = "INSERT INTO liveapp(user_id,number,page_number,type,location, plocation,  text,opens_in,hor_width,item_width, numCols, colNum, item_height,bg_color) ";
				$insertQuery .= "VALUES('$userID','9','1','app', 'CheckMark.png','CheckMark.png',   '5','APP','100', '100', '1', '0', '130','transparent')";
				if(!mysql_query($insertQuery))
                {
                    die('Error: ' . mysql_error());
                }
				
				
				$insertQuery = "INSERT INTO liveapp(user_id,number,page_number,type,alignment,comment,textbox )";
				$insertQuery .= "VALUES('$userID','3','5','html', 'left','<script type=\"text/javascript\" src=\"https://www.launchliveapp.com/gps_rev2_highAccuracy.js\"></script>
							<script type=\"text/javascript\">
							function checkLogin(){if(email==\"\"){alert(\"You must be logged in to view this page\");menulogic(\"login\");}else{getLocation()}}</script>
							<form name=\"send\" action=\"liveapp_current.php\" method=\"post\">
							  <input type=\"text\" id=\"name\" name=\"name\" style=\"display: none\">
							  <input type=\"text\" id=\"appname\" name=\"appname\" style=\"display: none\" value=\"zeya\">
							  <input type=\"text\" id=\"email\" name=\"email\" style=\"display: none\">
							  <input type=\"text\" id =\"long\" name=\"gps_long\" style=\"display: none\">
							  <input type=\"text\" id=\"lat\" name=\"gps_lat\" style=\"display: none\">
							  <input type=\"text\" id=\"gps_ng\" name=\"gps_ng\" style=\"display: none\">
							  <input type=\"text\" id=\"address\" name=\"address\" style=\"display:none\"> 
							  <input type=\"text\" id=\"e_mail\" name=\"e_mail\" style=\"display: none\" value=\"zeya@getliveapp.com";
				if(isset($_SESSION["wizardCoachEmail"])){
					$CoachEmail=$_SESSION["wizardCoachEmail"];
					$insertQuery .= ",".$CoachEmail.",anil@getliveapp.com\">";
				}else{
					
					$insertQuery .= ", anil@getliveapp.com\">";
				}
				$insertQuery .= "</form>  
							 <div id=\"checkIn\" style=\"background-image :url(\'CheckMark.png\'); width: auto; height: 13%; background-size: 100% 100%\" onclick=\"checkLogin()\"></div>',   'true')";
				
                
                if(!mysql_query($insertQuery))
                {
                    die('Error: ' . mysql_error());
                }
				$filename = "img/checkin.png";
				$newfilename = "../users-folder/$userName/liveapp/checkin.png";
				copy($filename, $newfilename);
				$insertQuery = "INSERT INTO liveapp(user_id,number,page_number,type, location, plocation,  text,opens_in,hor_width,item_width, numCols, colNum) ";
				$insertQuery .= "VALUES('$userID','5','5','app', 'checkin.png','checkin.png',   '2','APP','100', '100', '1', '0')";
                if(!mysql_query($insertQuery))
                {echo "14";
                    die('Error: ' . mysql_error());
                }
				
				//$filename = "SportsAppWizard/img/TitleBar.png";
				//$newfilename = "users-folder/$userName/liveapp/TitleBar.png";
				//copy($filename, $newfilename);
				
			

//$teamName = "<p style=\"text-align: center; background-color:".$color."\">";
//if (empty($_SESSION["app_logo"]["error"]))
//{
	//$teamName .= "<img style=\"width: 50px; height: 50px;\" src=\"http://www.launchliveapp.com/SportsAppWizard/images/".$_SESSION["app_logo"]."\">";
//}
//$teamName .= $_SESSION["wizardTeamName"]."</p>";
$number = 1; // this might be the sorting order for the widgets
$bgHeight = 130;  // FIX: This is required due to a bug in the Portal's Image Widget.
// Math.round(new Date().getTime() / 100000) + Math.floor(Math.random()*100001) + user_id;

//$liveapp_id = uniqid($userID.strval(rand(0, 10000))."1"); // generate unique id

//$insertQuery = "INSERT INTO liveapp(user_id,number,type, liveapp_id, comment, skip, page_number, font, size, background_color) ";
//$insertQuery .= "VALUES('$userID','$number','textbox','$liveapp_id', '$teamName', '$skip', $pagenumber, '$font', '$size', '$color')";

//echo $insertQuery."<br>";

//if(!mysql_query($insertQuery))
//{
  //die('Error: ' . mysql_error());
//}

//$result_add = $connection->query($insertQuery) or die($connection->error);
//echo $result_add."<br>";

				/*$filename1 = "SportsAppWizard/img/TitleBar.png";
				$newfilename1 = "users-folder/$username/liveapp/TitleBar.png";
				copy($filename1, $newfilename1);
				$liveapp_id = uniqid($userID.strval(rand(0, 10000))."2");
				//echo "liveapp:".$liveapp_id;
				$insertQuery = "INSERT INTO liveapp(user_id,number,type, liveapp_id,location, plocation, text,opens_in,hor_width,item_width, numCols, colNum, item_height,bg_color) ";
				$insertQuery .= "VALUES('$userID','1','app','$liveapp_id', 'TitleBar.png','TitleBar.png', '2','APP','100', '100', '1', '0', '130','transparent')";
                
                if(!mysql_query($insertQuery))
                {
                    die('Error: ' . mysql_error());
                }*/
				
$comment = "<p style=\"text-align: center;\">Schedule</p>"; // Custom HTML widget data background-color:".$color."
$scheduleAssigned = false;
for ($i = 0; $i < count($_SESSION['dates']); $i++)
{
	if (!empty($_SESSION['dates'][$i]))
	{
		//style=background-color:'.$color.'
		$comment .= '<p >'.$_SESSION['gametypes'][$i].' on '.$_SESSION['dates'][$i].' at '.to12hr($_SESSION['times'][$i]).', '.$_SESSION['locations'][$i].'</p>';
		$scheduleAssigned = true;
	}
}

/*if ($scheduleAssigned)
{
	//$number++;
	$liveapp_id = uniqid($userID.strval(rand(0, 10000))."2"); // generate unique id
	$insertQuery = "INSERT INTO liveapp(user_id,number,type, liveapp_id, comment, skip, page_number, font, size, background_color) ";
	$insertQuery .= "VALUES('$userID','$number','textbox','$liveapp_id', '$comment', '$skip', $pagenumber, '$font', '$size', '$color')";

	//echo $insertQuery."<br>";

	if(!mysql_query($insertQuery))
	{
		echo $number."<br>";
	  //die('Error: ' . mysql_error());
	}
}*/

//$result_add = $connection->query($insertQuery) or die($connection->error);
//echo $result_add."<br>";

$comment = "<p style=\"text-align: center;\">Contacts</p>"; // Custom HTML widget data background-color:".$color."
$number++;
//$liveapp_id = uniqid($userID.strval(rand(0, 10000))."3"); // generate unique id

//$insertQuery = "INSERT INTO liveapp(user_id, number, type, liveapp_id, comment, skip, page_number, font, size, background_color) ";
//$insertQuery .= "VALUES('$userID','$number','textbox','$liveapp_id', '$comment', '$skip', $pagenumber, '$font', '$size', '$color')";

//echo $insertQuery."<br>";

//if(!mysql_query($insertQuery))
//{
  //die('Error: ' . mysql_error());
//}

//$result_add = $connection->query($insertQuery) or die($connection->error);
//echo $result_add."<br>";

$numElements = 0;
if (!empty($_SESSION["Titles"]) and !empty($_SESSION["Names"]))
{
	$length = count($_SESSION["Titles"]);
	for ($i = 0; $i < $length; $i++)
	{
		$number++;
		//$liveapp_id = uniqid($userID.strval(rand(0, 10000))."4"); // generate unique id
		$title = "<p >".$_SESSION["Titles"][$i].": ".$_SESSION["Names"][$i]."</p>";//style=\"background-color:".$color."\"
		//echo $title;
		//$insertQuery = "INSERT INTO liveapp(user_id, number, type, liveapp_id, comment, skip, page_number, font, size, background_color) ";
		//$insertQuery .= "VALUES('$userID','$number','textbox','$liveapp_id', '$title', '$skip', $pagenumber, '$font', '$size', '$color')";
		//if(!mysql_query($insertQuery))
		//{
		  //die('Error: ' . mysql_error());
		//}
		$number++;
		$numElements++;
		if (isset($_SESSION["Emails"][$i]) and isset($_SESSION["Phones"][$i]))
		{
			$phone = $_SESSION['Phones'][$i];
			$emailaddress = $_SESSION['Emails'][$i];

			//$liveapp_id = uniqid($userID.strval(rand(0, 10000))."4"); // generate unique id

			/*$insertQuery = "INSERT INTO liveapp(user_id, number, type,  skip, page_number, numCols, colNum, phone_number, item_width) ";
			$insertQuery .= "VALUES('$userID','$number','phone', '$skip', $pagenumber, 2, 0, '$phone', 50)";

			if(!mysql_query($insertQuery))
			{
				echo $number."<br>";
			  //die('Error: ' . mysql_error());
			}*/

			if (!isset($emailaddress) or empty($emailaddress))
			{
				$emailaddress = "none";
			}

			//$result_add = $connection->query($insertQuery) or die($connection->error);
			//echo $result_add."<br>";

			//$liveapp_id = uniqid($userID.strval(rand(0, 10000))."4"); // generate unique id

			/*$insertQuery = "INSERT INTO liveapp(user_id, number, type, skip, page_number, numCols, colNum, email, item_width) ";
			$insertQuery .= "VALUES('$userID','$number','email', '$skip', $pagenumber, 2, 1, '$emailaddress', 50)";

			if(!mysql_query($insertQuery))
			{
				echo $number."<br>";
			  //die('Error: ' . mysql_error());
			}*/

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
	$comment = "<p style=\"text-align: center; \">Quick links</p>"; // Custom HTML widget data background-color:".$color."
	$number++;
	//$liveapp_id = uniqid($userID.strval(rand(0, 10000))."5"); // generate unique id

	/*$insertQuery = "INSERT INTO liveapp(user_id, number, type, comment, skip, page_number, font, size, background_color) ";
	$insertQuery .= "VALUES('$userID','$number','textbox', '$comment', '$skip', $pagenumber, '$font', '$size', '$color')";

	if(!mysql_query($insertQuery))
	{
		echo $number."<br>";
	  //die('Error: ' . mysql_error());
	}*/
	$number++;

	$length = count($_SESSION['websiteName']);
	//echo $length."<br>";
	$comment = "<p style=\"text-align: center; \">";//background-color:".$color."
	for ($i = 0; $i < $length; $i++)
	{
		$currentImage = $_SESSION['websiteImage'][$i];
		$path = "http://www.launchliveapp.com/SportsAppWizard/images/".$currentImage;
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
		//$liveapp_id = uniqid($userID.strval(rand(0, 10000))."5"); // generate unique id
		//$connection->query($insertQuery);
	}
	$comment .= "</p>";
	/*$insertQuery = "INSERT INTO liveapp(user_id, number, type,  comment, skip, page_number, font, size, background_color) ";
	$insertQuery .= "VALUES('$userID','$number','textbox', '$comment', '$skip', $pagenumber, '$font', '$size', '$color')";
	$number++;
	if(!mysql_query($insertQuery))
	{
		echo $number."<br>";
	  //die('Error: ' . mysql_error());
	}*/
}

if (isset($_SESSION["sponsor_image"]))
{
	if (!empty($_SESSION["sponsor_image"]))
	{
		$comment = "<p style=\"text-align: center; \">Sponsor</p>"; // Custom HTML widget data background-color:".$color."
		$number++;
		//$liveapp_id = uniqid($userID.strval(rand(0, 10000))."6"); // generate unique id
		$path = "http://www.launchliveapp.com/SportsAppWizard/images/".$_SESSION["sponsor_image"];
		$comment .= "<img style=\"display: block; margin-left: auto; margin-right: auto; width: 100%; height:100%;\" src=\"".$path."\">";
		/*$insertQuery = "INSERT INTO liveapp(user_id, number, type, comment, skip, page_number, font, size, background_color) ";
		$insertQuery .= "VALUES('$userID','$number','textbox', '$comment', '$skip', $pagenumber, '$font', '$size', '$color')";

		if(!mysql_query($insertQuery))
		{
			echo $number."<br>";
		  //die('Error: ' . mysql_error());
		}*/
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
if(isset($_SESSION['wizardPass'])&&isset($_SESSION['wizardCoachEmail'])){
	$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$subject= "Your ".$_SESSION["wizardTeamName"]." App's password";
$CoachEmail=$_SESSION['wizardCoachEmail'];
	$message= "<br>
			 <p >Your password is:</p></br>
			 
			  <p>".$_SESSION['wizardPass']."</p>";
			    //echo "mail to".$CoachEmail;
			   mail($CoachEmail,$subject, $message, $headers);
			 
}
//$liveapp_id = uniqid($userID.strval(rand(0, 10000))."7"); // generate unique id
//$insertQuery = "INSERT INTO liveapp(user_id, number, type,  comment, skip, page_number, font, size, background_color) ";
//$insertQuery .= "VALUES('$userID','$number','textbox', '$socialMediaMenu', '$skip', $pagenumber, '$font', '$size', '$color')";
//if(!mysql_query($insertQuery))
//{
//	echo $number."<br>";
  //die('Error: ' . mysql_error());
//}
//INSERT ITEMS
				
// Here we have to redirect to processliveappXML
header("location: ../processliveappXML_SAW2.php");

//echo "<script>location.href = \"../processliveappXML_SAW.php\"</script>";

?>

</html>

<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

if(!isset($_SESSION))
{
	session_start();
}

if (empty($_SESSION["wizardTeamName"]) or empty($_SESSION["wizardCoachName"]) or empty($_SESSION["wizardCoachEmail"])) {
	// not following along with the forms, move to first page
	header("location:wizSports1.php");
	session_destroy();
	exit;
}

if (!isset($_SESSION["social_media"]))
{
	$_SESSION["social_media"] = array();
}

if (!empty($_REQUEST["wizardFacebookURL"]))
{
	array_push($_SESSION["social_media"], $_REQUEST["wizardFacebookURL"]);
	$_SESSION["wizardFacebookURL"]=$_REQUEST["wizardFacebookURL"];
}
if (!empty($_REQUEST["wizardtwitterNameURL"]))
{
	array_push($_SESSION["social_media"], $_REQUEST["wizardtwitterNameURL"]);
	$_SESSION["wizardtwitterNameURL"]=$_REQUEST["wizardtwitterNameURL"];
}
if (!empty($_REQUEST["wizardYouTubeURL"]))
{
	array_push($_SESSION["social_media"], $_REQUEST["wizardYouTubeURL"]);
	$_SESSION["wizardYouTubeURL"]=$_REQUEST["wizardYouTubeURL"];
}
if (!empty($_REQUEST["wizardLinkedInURL"]))
{
	array_push($_SESSION["social_media"], $_REQUEST["wizardLinkedInURL"]);
	$_SESSION["wizardLinkedInURL"]=$_REQUEST["wizardLinkedInURL"];
}

header("location: wizSports7.php");

?>
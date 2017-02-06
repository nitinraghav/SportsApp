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

$_SESSION["gametypes"] = array();
$_SESSION["dates"] = array();
$_SESSION["locations"] = array();
$_SESSION["times"] = array();


foreach ($_POST as $key => $value) {
	if (substr_compare($key, "gametype", 0, 7) == 0)
	{
		array_push($_SESSION["gametypes"], $value);
	}
	else if (substr_compare($key, "date", 0, 3) == 0)
	{
		array_push($_SESSION["dates"], $value);
	}
	else if (substr_compare($key, "location", 0, 7) == 0)
	{
		array_push($_SESSION["locations"], $value);
	}
	else if (substr_compare($key, "time", 0, 3) == 0)
	{
		array_push($_SESSION["times"], $value);
	}
}
echo $_SESSION["gametypes"][0];
echo $_SESSION["dates"][0];
echo $_SESSION["locations"][0];
echo $_SESSION["times"][0];
header("location:wizSports4.php");
?>
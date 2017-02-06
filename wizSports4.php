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
else if (isset($_GET["q"]))
{
	header("location:wizSports4x.php");
}
if (empty($_SESSION["Titles"]) and !empty($_POST["wizardTitle"]))
{
	$_SESSION["Titles"] = array($_POST["wizardTitle"]);
}
else if (isset($_SESSION["Titles"]) and !empty($_POST["wizardTitle"]))
{
	array_push($_SESSION["Titles"], $_POST["wizardTitle"]);
}

if (empty($_SESSION["Names"]) and !empty($_POST["wizardNameFirst"]) and !empty($_POST["wizardNameLast"]))
{
	$_SESSION["Names"] = array($_POST["wizardNameFirst"]." ".$_POST["wizardNameLast"]);
}
else if (isset($_SESSION["Names"]) and !empty($_POST["wizardTitle"]) and !empty($_POST["wizardNameLast"]))
{
	array_push($_SESSION["Names"], $_POST["wizardNameFirst"]." ".$_POST["wizardNameLast"]);
}

if (empty($_SESSION["Emails"]) and !empty($_POST["wizardEmail"]))
{
	$_SESSION["Emails"] = array($_POST["wizardEmail"]);
}
else if (isset($_SESSION["Emails"]) and !empty($_POST["wizardEmail"]))
{
	array_push($_SESSION["Emails"], $_POST["wizardEmail"]);
}

if (empty($_SESSION["Phones"]) and !empty($_POST["wizardCellPhone"]))
{
	$_SESSION["Phones"] = array($_POST["wizardCellPhone"]);
}
else if (isset($_SESSION["Phones"]) and !empty($_POST["wizardCellPhone"]))
{
	array_push($_SESSION["Phones"], $_POST["wizardCellPhone"]);
}

if (!empty($_SESSION["Titles"]) and !empty($_SESSION["Names"]))
{
	$length = count($_SESSION["Titles"]);
	for ($i = 0; $i < $length; $i++) {
	 // print "number1". $_SESSION["Titles"][$i]."&nbsp;&nbsp;&nbsp;&nbsp;";
	  //print $_SESSION["Names"][$i]."&nbsp;&nbsp;&nbsp;&nbsp;";
	  if (!empty($_SESSION["Emails"][$i]))
	  {
		//  print $_SESSION["Emails"][$i]."&nbsp;&nbsp;&nbsp;&nbsp;";
	  }
	  else
	  {
		//  print "No Email&nbsp;&nbsp;&nbsp;&nbsp;";
	  }
	  if (!empty($_SESSION["Phones"][$i]))
	  {
		//  print $_SESSION["Phones"][$i]."<br>";
	  }
	  else
	  {
		 // print "No Phone number<br>";
	  }
	}
}

?>

<html>
<head><script type="text/javascript">var _gaq=_gaq||[];_gaq.push(['_setSiteSpeedSampleRate',100]);</script>
<title>Sports Wizard</title>
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
<script type="text/javascript">
    function submitForm(action)
    {
        document.getElementById('form').action = action;
        document.getElementById('form').submit();
    }
</script>
</head>
<body>
<div class="container">
<header class="branding">

</header>
<header class="row" >
<!--<div class="welcome-message col-md-12">-->
<div class="col-md-12 designWizardHeader">
<img  class="logoImage" src="img/live_app_logo.png" alt=""/>
<div class="headerText" >LiveApp Sports Wizard</div>
<div style="clear:both;"></div>
<div class="stepNo"> Step 4 of 9</div>
</div>

</header>

<section class="col-md-12 sectionW1" >
<div class="title4" >
<?php
	if (isset($_POST["wizardTitle"]))
	{
		echo "Your ".$_POST["wizardTitle"]."'s info has been added, would you like to add more contacts?";
	}
?>
</div>
<form role="form" class="cmxform outerFormW1" method="post" id="form">

<div class="row signup-wizard-form formW1" >
	<div class="col-md-12 formAreaW4">
		<div class="form-group fieldW4">
		<label for="wizardTitle">Title (ie: Coach, Trainer etc.)</label>
		<input type="text" name="wizardTitle" id="wizardTitle" value="" maxlength="100" required class="form-control"/>
		</div>
		<div class="form-group fieldW4">
		<label for="wizardNameFirst">First Name</label>
		<input type="text" name="wizardNameFirst" id="wizardNameFirst" value="" maxlength="100" required class="form-control"/>
		</div>
		<div class="form-group fieldW4">
		<label for="wizardNameLast">Last Name</label>
		<input type="text" name="wizardNameLast" id="wizardNameLast" value="" maxlength="100" required class="form-control"/>
		</div>
		<div class="form-group fieldW4">
		<label for="wizardEmail">Email</label>
		<input type="email" name="wizardEmail" id="wizardEmail" value="" maxlength="100" required class="form-control"/>
		</div>
		<div class="form-group fieldW4">
		<label for="wizardCellPhone">Cell Phone (###-###-####)</label>
		<input type="text" class="input-medium bfh-phone" data-format="+1 (ddd) ddd-dddd" name="wizardCellPhone" id="wizardCellPhone" value="" maxlength="100" required class="form-control"/>
		</div>

		<div class=" btnAAC_box">
		<input type="submit" onclick="submitForm('wizSports4.php')" name="" id="" value="Add Another Contact" class="btn btnAAC" />
		</div>
	</div>
</div> <!-- End form-row -->
<div class="btnW1_holder" >
<input type="submit" onclick="submitForm('wizSports4.php?q=0')" class="btn btnW1" value="Next Step">
</div>
<input type="hidden" id="appIconData" name="appIconData" value=""/>
</form> <!-- End Form -->
</section>
<!--</div>--><!--End Container  -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="./scripts/bootstrap-formhelpers-phone.js"></script>
<script type="text/javascript">if(window.parent==window){var _gaq=_gaq||[];_gaq.push(['_setAccount','UA-59566634-1']);_gaq.push(['_setDomainName','www.liveapp.ca']);_gaq.push(['_setAllowLinker',true]);_gaq.push(['_trackPageview']);(function(){var ga=document.createElement('script');ga.type='text/javascript';ga.async=true;ga.src='http://www.google-analytics.com/ga.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga,s);})();}</script></body>
</html>

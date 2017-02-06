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
if (isset($_REQUEST["q"]) and isset($_REQUEST["editted"]))
{
	$i = $_REQUEST["q"];
	$index = intval($i);
	echo '<pre>';
	var_dump($_POST);
	echo '</pre>';
	if (isset($_POST["wizardTitle"]))
	{
		$_SESSION["Titles"][$index] = $_POST["wizardTitle"];
		echo $_SESSION["Titles"][$index];
	}
	if (isset($_POST["wizardNameFirst"]) and isset($_POST["wizardNameLast"]))
	{
		$_SESSION["Names"][$index] = $_POST["wizardNameFirst"]." ".$_POST["wizardNameLast"];
		echo $_SESSION["Names"][$index];
	}
	if (isset($_POST["wizardEmail"]))
	{
		$_SESSION["Emails"][$index] = $_POST["wizardEmail"];
		echo $_SESSION["Emails"][$index];
	}
	if (isset($_POST["wizardCellPhone"]))
	{
		$_SESSION["Phones"][$index] =  $_POST["wizardCellPhone"];
		echo $_SESSION["Phones"][$index];
	}
	header("location: wizSports4x.php");
}
else if (isset($_REQUEST["q"]))
{
	$i = $_REQUEST["q"];
	$index = intval($i);
	$name = $_SESSION["Names"][$index];
	$spaceIndex = strpos($name, " ");
	$firstName = substr($name, 0, $spaceIndex);
	$lastName = substr($name, $spaceIndex, strlen($name));
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
</div>

</header>

<section class="col-md-12 sectionW1" >
<form role="form" class="cmxform outerFormW1" method="post" id="form">
<br><br>
<div class="row signup-wizard-form formW1" >
	<div class="col-md-12 formAreaW4">
		<div class="form-group fieldW4">
		<label for="wizardTitle">Title (ie: Coach, Trainer etc.)</label>
		<input type="text" name="wizardTitle" id="wizardTitle" value="<?php if (isset($_SESSION["Titles"][$index])){ echo $_SESSION["Titles"][$index]; } ?>" maxlength="100" required class="form-control"/>
		</div>
		<div class="form-group fieldW4">
		<label for="wizardNameFirst">First Name</label>
		<input type="text" name="wizardNameFirst" id="wizardNameFirst" value="<?php if (isset($firstName)){ echo $firstName; } ?>" maxlength="100" required class="form-control"/>
		</div>
		<div class="form-group fieldW4">
		<label for="wizardNameLast">Last Name</label>
		<input type="text" name="wizardNameLast" id="wizardNameLast" value="<?php if (isset($lastName)){ echo $lastName; } ?>" maxlength="100" required class="form-control"/>
		</div>
		<div class="form-group fieldW4">
		<label for="wizardEmail">Email</label>
		<input type="email" name="wizardEmail" id="wizardEmail" value="<?php if (isset($_SESSION["Emails"][$index])){ echo $_SESSION["Emails"][$index]; } ?>" maxlength="100" required class="form-control"/>
		</div>
		<div class="form-group fieldW4">
		<label for="wizardCellPhone">Cell Phone</label>
		<input type="text" class="input-medium bfh-phone" data-format="+1 (ddd) ddd-dddd" name="wizardCellPhone" id="wizardCellPhone" value="<?php if (isset($_SESSION["Phones"][$index])){ echo $_SESSION["Phones"][$index]; } ?>" maxlength="100" required class="form-control"/>
		</div>

	</div>
</div> <!-- End form-row -->
<div class="btnW1_holder" >
<input type="submit" onclick="submitForm('contactEdit.php?q=<?php echo $index; ?>&editted=yes')" class="btn btnW1" value="Continue">
</div>
<input type="hidden" id="appIconData" name="appIconData" value=""/>
</form> <!-- End Form -->
</section>
<!--</div>--><!--End Container  -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./scripts/bootstrap-formhelpers-phone.js"></script>
<script type="text/javascript" src="./scripts/jquery.validate.js"></script>
<script type="text/javascript" src="./scripts/uploading.js"></script>
<script type="text/javascript">if(window.parent==window){var _gaq=_gaq||[];_gaq.push(['_setAccount','UA-59566634-1']);_gaq.push(['_setDomainName','www.liveapp.ca']);_gaq.push(['_setAllowLinker',true]);_gaq.push(['_trackPageview']);(function(){var ga=document.createElement('script');ga.type='text/javascript';ga.async=true;ga.src='http://www.google-analytics.com/ga.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga,s);})();}</script></body>
</html>

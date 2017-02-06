<?php 
	if(!isset($_SESSION))
	{
		session_start();
	}
	$path = "http://launchliveapp.com/users-folder/".$_SESSION["wizardTeamName"]."/liveapp/qrcode.jpg";
	if (isset($_POST['email']))
	{
		mail($_POST['email'], "QR code download for ".$_SESSION["wizardTeamName"], '<html><img src="'.$path.'"></html>', "MIME-Version: 1.0\r\nContent-type:text/html;charset=UTF-8\r\n");
		header("location: wizSports_Ready.php");
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
	<br>
	<h2 align="center">Send QR code to:</h2>
	<div class="col-md-12 formAreaW4">
		<div class="form-group fieldW4">
		<label for="wizardEmail">Email</label>
		<input type="email" name="email" maxlength="100" class="form-control"/>
		</div>

	</div>
</div> <!-- End form-row -->
<div class="btnW1_holder" >
<input type="submit" class="btn btnW1" value="Submit">
</div>
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
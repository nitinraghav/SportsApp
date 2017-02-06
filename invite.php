<?php 
	if(!isset($_SESSION))
	{
		session_start();
	}
	if (isset($_POST["email-0"]))
	{
		echo "submitted<br>";
		$path = "http://launchliveapp.com/users-folder/".$_SESSION["wizardTeamName"]."/liveapp/qrcode.jpg";
		foreach ($_POST as $key => $value) {
			if (!empty($value))
			{
				mail($value."", "QR code download for ".$_SESSION["wizardTeamName"], '<html><img src="'.$path.'"></html>', "MIME-Version: 1.0\r\nContent-type:text/html;charset=UTF-8\r\n");
				//echo $value."<br>";
				//mail($value, "Download for ".$appName, '<a href="http://launchliveapp.com/.'.$appName.'">Click here</a>');
			}
		}
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
<form role="form" class="cmxform outerFormW1" method="post">
<br><br>
<div class="row signup-wizard-form formW1" >
	<br>
	<h2 align="center">Email addresses to invite:</h2>
	<div class="col-md-12 formAreaW4">
		<div class="form-group fieldW4" id="form">
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
<form  method="post">
<label></label><br>
</form>

<script>
	var form = document.getElementById("form");
	for (var i = 0; i < 5; i++)
	{
		var node = document.createElement("input"); 
		node.type = "email";
		node.name = "email-" + i;
		node.class = "form-control";
		var label = document.createElement("label");
		label.innerHTML = "Email " + (i + 1);
		form.appendChild(label);
		form.appendChild(node);
		form.appendChild(document.createElement("br"));
	}
</script>
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
?>

<html>
<head><script type="text/javascript">var _gaq=_gaq||[];_gaq.push(['_setSiteSpeedSampleRate',100]);</script>
<title>Signup Wizard</title>
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
<body>
<div class="container">
<header class="branding">

</header>
<header class="row">
<!--<div class="welcome-message col-md-12">-->
<div class="col-md-12 designWizardHeader">
<div class="headerText" >LiveApp Team Wizard</div>
<div style="clear:both;"></div>
<div class="stepNo"> Step 4 of 9</div>
</div>

</header>

<section class="col-md-12 sectionW1" >
<div class="title1" >Confirm the contacts and their info you provided:</div>
<div class="contactList_holder">
   <?php
   if (!empty($_SESSION["Titles"]) and !empty($_SESSION["Names"]))
	{
		$length = count($_SESSION["Titles"]);
		for ($i = 0; $i < $length; $i++)
		{
			if (!empty($_SESSION["Emails"][$i]) and !empty($_SESSION["Phones"][$i]))
			{?>
		<div class="contactRecord" >
          <div class="btnEditCR">
		      <div class=" btnECR_box">
			  <input type="button" onclick="location.href = 'contactEdit.php?q=<?php echo $i; ?>';" name="" id="" value="Edit" class="btn btnECR" />
			  </div>
		  </div>
		  <div class="ciInfoBox">
		         <div class="personData">
					   <div class="contactType"><?php echo $_SESSION["Titles"][$i]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</div>
					   <div class="contactName"><?php echo $_SESSION["Names"][$i]; ?></div>
					   <div style="clear:both"></div>
				 </div>
				 <?php  ?>
				 <div class="contactData">
					 <div class="email_CIB">
						<?php
						if (!empty($_SESSION["Emails"][$i]))
						{
							echo $_SESSION["Emails"][$i];
						}
						else
						{
							echo "No Email";
						}
						?>
					 </div>
					
					 <div class="cell_CIB">
					 <?php
						if (empty($_SESSION["Phones"][$i])
							or strcmp ($_SESSION["Phones"][$i], "+1 ") == 0)
						{
							echo "No Phone Number";
						}
						else
						{
							echo $_SESSION["Phones"][$i];
						}
					 ?>
					 </div>
					 <div class="text_CIB">
					 <?php
						if (empty($_SESSION["Phones"][$i])
							or strcmp ($_SESSION["Phones"][$i], "+1 ") == 0)
						{
							echo "No Phone Number";
						}
						else
						{
							echo $_SESSION["Phones"][$i];
						}
					 ?></div>
					 <div style="clear:both"></div>
				 </div>
		  </div>
		  <div style="clear:both"></div>
		</div>
		<?php
			}
		}
	}
   ?>
</div>

<div class="btnW2_holder" >
<input type="submit" onclick="location.href='wizSports5.php'" value="Confirm, Next Step" class="btn btnW4x" />
</div>
</section>

<!--</div>--><!--End Container  -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript">if(window.parent==window){var _gaq=_gaq||[];_gaq.push(['_setAccount','UA-59566634-1']);_gaq.push(['_setDomainName','www.liveapp.ca']);_gaq.push(['_setAllowLinker',true]);_gaq.push(['_trackPageview']);(function(){var ga=document.createElement('script');ga.type='text/javascript';ga.async=true;ga.src='http://www.google-analytics.com/ga.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga,s);})();}</script></body>
</html>

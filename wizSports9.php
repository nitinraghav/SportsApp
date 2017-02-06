<?php

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

if(!isset($_SESSION))
{
	session_start();
}

if (empty($_SESSION["wizardTeamName"]) or empty($_SESSION["wizardCoachName"]) or empty($_SESSION["wizardCoachEmail"])){
	// not following along with the forms, move to first page
	header("location:wizSports1.php");
	session_destroy();
	exit;
}
include('to12hr.php');
?>

<!DOCTYPE>
<html>
<head><script type="text/javascript">var _gaq=_gaq||[];_gaq.push(['_setSiteSpeedSampleRate',100]);</script>
<title>Signup Wizard</title>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
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
<style>
#recompileNotice {
    display: none;
    margin-top: 20px;
    width: 100%;
    text-align: center;
}
#recompileNotice p {
    margin: 10px;
    color: #FFFFFF;
}
</style>
<script>

  var colBtn="";
 /* An invisible (opacity 0) input type = color element is included with each of the three blue colour picking
    buttons.  */

/* This function gets the info on which button has been clicked, stores it in a variable and causes the
   appropriate hidden input item to be clicked displaying a colour picker on the screen */

function getColPic(origBtn){
    colBtn = origBtn;
	if (colBtn == "title"){
	   document.getElementById("hiddenCP1").click();
	}
	else if (colBtn == "text"){
	   document.getElementById("hiddenCP2").click();
	}
	else if (colBtn == "icon"){
	   document.getElementById("hiddenCP3").click();
	}

}

/*  This function runs after the user picks a colour. It gets the chosen colour and changes the appropriate
    items on the screen to that colour. (If the user clicks on the hidden input instead of the button, only
	this function runs.  Because of this possibility, the colBtn variable is sent to this function too.) */
function setNewColour(colBtn){
    var colr="";
	if (colBtn == "title"){
	    colr = document.getElementById('hiddenCP1').value;
	    document.getElementById('colChoiceSH').style.color = colr;
        document.getElementById('colChoiceCH').style.color = colr;
	}
	else if (colBtn == "text"){
	   colr = document.getElementById('hiddenCP2').value;
	   document.getElementById('usLine1').style.color = colr;
	   document.getElementById('usLine2').style.color = colr;
	   document.getElementById('usLine3').style.color = colr;
	   document.getElementById('contactID1').style.color = colr;
	   document.getElementById('contactID2').style.color = colr;
	   document.getElementById('contactID3').style.color = colr;
	}
	else if (colBtn == "icon"){
	   colr = document.getElementById('hiddenCP3').value;
	   document.getElementById('iconRH1').style.color = colr;
	   document.getElementById('iconRH2').style.color = colr;
	   document.getElementById('iconRH3').style.color = colr;
	   $('.image_icon').css({"background-color":colr});
	}
}
</script>
</head>
<body>
<div class="container">
<header class="branding">

</header>
<header class="row">
<!--<div class="welcome-message col-md-12">-->
<div class="col-md-12 designWizardHeader">
<img  class="logoImage" src="img/live_app_logo.png" alt=""/>
<div class="headerText" >LiveApp Team Wizard</div>
<div style="clear:both;"></div>
<div class="stepNo"> Step 9 of 9</div>
</div>

</header>

<form id="publishForm" action="wizSports_Build.php?newsession=true" method="post">
<section class="col-md-12 sectionW1" >
<div class="title9" >Choose the colours you want for your icons and your text:</div>
<div class="colorOptions_holder">
	<div class="colorChoiceBox">
             <div class="colChoiceSchedHeading" id="colChoiceSH">Upcoming Schedule:</div>
			 <table style="width:100%;padding-left:1vw" >
			 <tr class="usLine" id="usLine1" >
		      <!--<div  >-->
			 
			      <td  style="padding-right:0vw"><div class="usDate no1"  >Date:</div></td>
				  <td  ><div class="usDate" ><?php echo $_SESSION["dates"][0]?></div></td>
				  <td  style="padding-right:0vw"><div class="usTime ">Time:</div></td>
				  <td  ><div class="usDate" ><?php echo $_SESSION["times"][0]?></div></td>
				  <td style="padding-right:0vw"><div class="usEvent ">Event:</div></td>
				  <td  ><div class="usDate " ><?php echo $_SESSION["gametypes"][0]?></div></td>
				  <td style="padding-right:0vw"><div class="usLoc">Place:</div></td>
				  <td  ><div class="usLoc " ><?php echo $_SESSION["locations"][0]?></div></td>
				  <div style="clear:both"></div>
			   <!--<div  >-->
			 </tr>
			 <tr class="usLine" id="usLine2">
		       <!--<div  >-->
			      <td style="padding-right:0vw"><div class="usDate " >Date:</div></td>
				  <td  ><div class="usDate" ><?php echo $_SESSION["dates"][1]?></div></td>
				  <td style="padding-right:0vw"><div class="usTime ">Time:</div></td>
				  <td  ><div class="usDate" ><?php echo $_SESSION["times"][1]?></div></td>
				  <td style="padding-right:0vw"><div class="usEvent ">Event:</div></td>
				  <td  ><div class="usDate" ><?php echo $_SESSION["gametypes"][1]?></div></td>
				  <td style="padding-right:0vw"><div class="usLoc ">Place:</div></td>
				  <td  ><div class="usLoc" ><?php echo $_SESSION["locations"][1]?></div></td>
				  <div style="clear:both"></div>
			   <!--<div  >-->
			 </tr>
			 <tr class="usLine" id="usLine3">
		     <!--<div  >-->
			      <td style="padding-right:0vw"><div class="usDate ">Date:</div></td>
				  <td ><div class="usDate"><?php echo $_SESSION["dates"][2]?></div></td>
				  <td style="padding-right:0vw"><div class="usTime ">Time:</div></td>
				  <td ><div class="usDate"><?php echo $_SESSION["times"][2]?></div></td>
				  <td style="padding-right:0vw"><div class="usEvent ">Event:</div></td>
				  <td ><div class="usDate"><?php echo $_SESSION["gametypes"][2]?></div></td>
				  <td style="padding-right:0vw"><div class="usLoc ">Place:</div></td>
				  <td ><div class="usLoc"><?php echo $_SESSION["locations"][2]?></div></td>
				  <div style="clear:both"></div>
			  <!--<div  >-->
			 </tr>
			 </table>
		     <div class="colChoiceContactHeading" id="colChoiceCH">Team Contacts:</div>
			 
			 <?php 
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
					  }?><div class="contactLine">
					  <div class="contactID" id="contactID1"><span id="contactType1"><?php echo $conTitle ?></span>:<span id="contactName1">&nbsp;&nbsp;<?php echo $conName ?></span></div>
				  <div class="iconRowHolder" id="iconRH1">
					  <div class="iconHolder">
						  <div class="iconImage"><img  class="image_icon" src="img/phone2_icon.png" alt=""/></div>
						  <div class="iconText">CALL</div>
					  </div>
					  <div class="iconHolder">
						  <div class="iconImage"><img  class="image_icon" src="img/text2_icon.png" alt=""/></div>
						  <div class="iconText">TEXT</div>
					  </div>
					  <div class="iconHolder">
						  <div class="iconImage"><img  class="image_icon" src="img/envelope2_icon.png" alt=""/></div>
						  <div class="iconText">EMAIL</div>
					  </div>
					  <div style="clear:both"></div>
				  </div></div><?php
					  
					}
					
				}else{
					
				
			 ?><div class="contactLine">
			      <div class="contactID" id="contactID1"><span id="contactType1">Coach</span>:<span id="contactName1">Name</span></div>
				  <div class="iconRowHolder" id="iconRH1">
					  <div class="iconHolder">
						  <div class="iconImage"><img  class="image_icon" src="img/phone2_icon.png" alt=""/></div>
						  <div class="iconText">CALL</div>
					  </div>
					  <div class="iconHolder">
						  <div class="iconImage"><img  class="image_icon" src="img/text2_icon.png" alt=""/></div>
						  <div class="iconText">TEXT</div>
					  </div>
					  <div class="iconHolder">
						  <div class="iconImage"><img  class="image_icon" src="img/envelope2_icon.png" alt=""/></div>
						  <div class="iconText">EMAIL</div>
					  </div>
					  <div style="clear:both"></div>
				  </div>
			 </div>
			 <div class="contactLine">
			      <div class="contactID" id="contactID2"><span id="contactType2">Coach</span>:<span id="contactName2">Name</span></div>
				  <div class="iconRowHolder" id="iconRH2">
					  <div class="iconHolder">
						  <div class="iconImage"><img  class="image_icon" src="img/phone2_icon.png" alt=""/></div>
						  <div class="iconText">CALL</div>
					  </div>
					  <div class="iconHolder">
						  <div class="iconImage"><img  class="image_icon" src="img/text2_icon.png" alt=""/></div>
						  <div class="iconText">TEXT</div>
					  </div>
					  <div class="iconHolder">
						  <div class="iconImage"><img  class="image_icon" src="img/envelope2_icon.png" alt=""/></div>
						  <div class="iconText">EMAIL</div>
					  </div>
					  <div style="clear:both"></div>
				  </div>
			 </div>
			 <div class="contactLine">
			      <div class="contactID" id="contactID3"><span id="contactType3">Coach</span>:<span id="contactName3">Name</span></div>
				  <div class="iconRowHolder" id="iconRH3">
					  <div class="iconHolder">
						  <div class="iconImage"><img  class="image_icon" src="img/phone2_icon.png" alt=""/></div>
						  <div class="iconText">CALL</div>
					  </div>
					  <div class="iconHolder">
						  <div class="iconImage"><img  class="image_icon" src="img/text2_icon.png" alt=""/></div>
						  <div class="iconText">TEXT</div>
					  </div>
					  <div class="iconHolder">
						  <div class="iconImage"><img  class="image_icon" src="img/envelope2_icon.png" alt=""/></div>
						  <div class="iconText">EMAIL</div>
					  </div>
					  <div style="clear:both"></div>
				  </div>
				</div><?php }?>
	</div>
    <div class="textBtnRow">
			<div class=" btnTT_box">
			<input type="button" onClick="getColPic('title')" name="" id="" value="Title" class="btn btnTT" />
			<input type="color" class="hiddenColPic" id="hiddenCP1" onChange="setNewColour('title')"/>
			</div>
			<div type="color" class=" btnRT_box">
			<input type="button" onClick="getColPic('text')" name="" id="" value="Regular" class="btn btnRT" />
			<input type="color" class="hiddenColPic" id="hiddenCP2" onChange="setNewColour('text')"/>
			</div>
			<div style="clear:both"></div>
	</div>
	<div class=" btnIC_box">
	<input type="button" onClick="getColPic('icon')" name="" id="" value="Icon Colour" class="btn btnIC" />
	<input type="color" class="hiddenColPic" id="hiddenCP3" onChange="setNewColour('icon')"/>
	</div>
</div>

<div class="btnW9_holder" >
<input type="submit" name="" id="" value="Build My App!" class="btn btnW9" />
</div>
</section>
</form>

<div id='recompileNotice'>
    <img id ='rotate_image' src='../portalGraphics/gear.png' />
    <p>Please do NOT refresh or close the page while we publishing your app, it will take up to 5 mins.</p>
</div>

<!--</div>--><!--End Container  -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="../scripts/jQueryRotate.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript">if(window.parent==window){var _gaq=_gaq||[];_gaq.push(['_setAccount','UA-59566634-1']);_gaq.push(['_setDomainName','www.liveapp.ca']);_gaq.push(['_setAllowLinker',true]);_gaq.push(['_trackPageview']);(function(){var ga=document.createElement('script');ga.type='text/javascript';ga.async=true;ga.src='http://www.google-analytics.com/ga.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga,s);})();}</script>
<script type="text/javascript">

function rotateImage() {
    var angle = 0;
    setInterval(function() {
        angle += 3;
        $("#rotate_image").rotate(angle);
    }, 10);
}

$("form").submit(function() {
    $("#publishForm").css('display', 'none');
    $("#recompileNotice").css('display', 'block');
    rotateImage();
});
</script>

</body>
</html>

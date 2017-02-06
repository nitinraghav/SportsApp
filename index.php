<?php 
	if(!isset($_SESSION))
	{
		session_start();
	}
	header("location:wizSports1.php");
?>
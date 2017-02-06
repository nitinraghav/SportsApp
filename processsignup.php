<?php
if(!isset($_SESSION))
{
	session_start();
}

include '../config.php';
include '../common/functions.php';
//ini_set('display_errors', '1');
//error_reporting(E_ALL);
//if(isset($_POST["signTXT"]))
//{
    //$form = $_POST["signTXT"];

    //if($form == "signup1")
    //{
		if(isset($_POST['designer_id']))
		{
			$designerId = $_POST['designer_id'];
			$selectQuery = "SELECT * FROM designers WHERE designer_id = $designerId";
			$selectResult = mysql_query($selectQuery);
			$row = mysql_fetch_array($selectResult);
			$verified = 1;
			$designer_free = 0;
		}
		else
		{
			$designerId = 0;
			$verified = 0;
			$designer_free = 0;
		}
		
        $username = mysql_real_escape_string($_SESSION["wizardTeamName"]);
		$origname = $username;
		$username = str_replace(' ', "", $username);
        //$password = mysql_real_escape_string(md5($_POST["passwordTXT"]));
		$password = mysql_real_escape_string(md5(""));
        $email =  mysql_real_escape_string($_SESSION["wizardCoachEmail"]);
		$contactname = mysql_real_escape_string($_SESSION["wizardCoachName"]);
		$phonenumber = mysql_real_escape_string($_SESSION["wizardCoachPhone"]);
		$verificationCode = mysql_real_escape_string(rand(1, 1000000));
		$email = strtolower($email);
		$mobile = '';
		echo $username."<br>";
		echo $email."<br>";
		echo $contactname."<br>";
		echo $phonenumber."<br>";
		//$mobile = $_POST['mobile'];
        // check if username exists
        $selectQuery = "SELECT * FROM users WHERE user_name = '$username' OR admin_email = '$email'";
        $result = mysql_query($selectQuery);
        $numberOfRows = mysql_num_rows($result);
        $rowsGalore = $numberOfRows;
         echo $numberOfRows;
         
         
        //if($numberOfRows > 0)
        //{
			//echo result;
			//$insertQuery = "INSERT INTO users(user_name, password, admin_email,phone,first_name,access_level_id,verification_code, newuser, designer_id, is_verified, paid, designer_free) VALUES('$username','$password','$email','$phonenumber','$contactname',2,'$verificationCode',1, $designerId, $verified, 1, $designer_free)";
            //echo $insertQuery;
        //}
        //else
        //{	
            $insertQuery = "INSERT INTO users(user_name, password, admin_email,phone,first_name,access_level_id,verification_code, newuser, designer_id, is_verified, paid, designer_free) VALUES('$username','$password','$email','$phonenumber','$contactname',2,'$verificationCode',1, $designerId, $verified, 1, $designer_free)";
            echo $insertQuery;
			if(!mysql_query($insertQuery))
            {
                die('Error: ' . mysql_error());
            }
            // set session user id
            $selectQuery = "SELECT user_id, user_name FROM users WHERE user_name = '$username'";
            $result = mysql_query($selectQuery);
			echo '<pre>';
			var_dump($result);
			echo '</pre>';
            $numberOfRows = mysql_num_rows($result);
            if($numberOfRows > 0)
            {
                $username = "";
                $userId = "";
                while($row = mysql_fetch_array($result))
                {
                    $_SESSION['user_id'] = $row["user_id"];
                    $_SESSION['user_name'] = $row["user_name"];
                    $username = $row["user_name"];
                    $userId = $row["user_id"];
					echo $username."<br>";
					echo $userId."<br>";
                }
               

                // INSERT IMAGE COUNTER
                $insertQuery = "INSERT INTO liveapp_image_counter(user_id,count)";
                $insertQuery .= " VALUES($userId, 1)";
                if(!mysql_query($insertQuery))
                {
                    die('Error: ' . mysql_error());
                }
				// INSERT AUDIO COUNTER
                $insertQuery = "INSERT INTO liveapp_audio_counter(user_id,count)";
                $insertQuery .= " VALUES($userId, 1)";
                if(!mysql_query($insertQuery))
                {
                    die('Error: ' . mysql_error());
                }				
				// INSERT USER_SETTINGS
				
                $insertQuery = "INSERT INTO user_settings(user_id,app_name)";
                $insertQuery .= " VALUES($userId, '$origname')";
                if(!mysql_query($insertQuery))
                {
                    die('Error: ' . mysql_error());
                }	
				
				//INSERT PAGES
                $insertQuery = "INSERT INTO pages(user_id,page_id,page_name,page_order)";
                $insertQuery .= " VALUES($userId, 1, 'Home Page', 1)";
                if(!mysql_query($insertQuery))
                {
                    die('Error: ' . mysql_error());
                }	
				
				//INSERT FEATURES
				$insertQuery = "INSERT INTO features(user_id)";
                $insertQuery .= " VALUES($userId)";
                if(!mysql_query($insertQuery))
                {
                    die('Error: ' . mysql_error());
                }	
				
                // INSERT FILE VERSIONS
                // liveapp
                $insertQuery = "INSERT INTO file_version(module_name,current_version,user_id)";
                $insertQuery .= " VALUES('liveapp',0,$userId)";
                if(!mysql_query($insertQuery))
                {
                    die('Error: ' . mysql_error());
                }

                // template
                $insertQuery = "INSERT INTO file_version(module_name,current_version,user_id)";
                $insertQuery .= " VALUES('template',0,$userId)";
                if(!mysql_query($insertQuery))
                {
                    die('Error: ' . mysql_error());
                }

                // specials
                $insertQuery = "INSERT INTO file_version(module_name,current_version,user_id)";
                $insertQuery .= " VALUES('specials',0,$userId)";
                if(!mysql_query($insertQuery))
                {
                    die('Error: ' . mysql_error());
                }

                // menu
                $insertQuery = "INSERT INTO file_version(module_name,current_version,user_id)";
                $insertQuery .= " VALUES('menu',0,$userId)";
                if(!mysql_query($insertQuery))
                {
                    die('Error: ' . mysql_error());
                }
				//send verification email
				if($designerId == 0)
				{
					//by commented out Vimal 18-November-2014
					//sendVerificationEmail($email,$verificationCode);
				}
				
				$file = "download_unavailable_publish.php";
				$newfile = $username."/index.html";
				copy($file, $newfile);
				
				$shfile = "poster.sh";
				$newshfile = "users-folder/$username/liveapp/poster.sh";
				copy($shfile, $newshfile);
						
                // ADD XML 
                include_once 'processPreviewliveappXML.php';
                // rename file
                rename("users-folder/$username/liveapp/temp_liveapp.xml","users-folder/$username/liveapp/liveapp_current.xml");
                
				
				 // create folders
                $structure = "users-folder/$username";
				$structure1 = "$username";
				if(!mkdir($structure1))
                {
                    //die('Failed to create folder: ' . $structure);
                }
                if(!mkdir($structure))
                {
                    //die('Failed to create folder: ' . $structure);
                }

                // CREATE MODULE FOLDERS
                // LiveApp
                if(!mkdir($structure . "/liveapp"))
                {
                    //die('Failed to create liveapp folder');
                }

                // Template
                if(!mkdir($structure . "/template"))
                {
                   //die('Failed to create template folder');
                }

                // Specials
                if(!mkdir($structure . "/specials"))
                {
                    //die('Failed to create specials folder');
                }

                // Specials
                if(!mkdir($structure . "/menu"))
                {
                    //die('Failed to create menu folder');
                }
				echo "finished";
            }
        //}
		header("location: http://launchliveapp.com/SportsAppWizard/wizSports_Build.php");
?>

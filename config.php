<?php

/*
$DBServer = 'mysql.liveapp.ca'; 
$DBUser   = 'liveapp_dev';
$DBPass   = 'BKJDf45i8s';
$DBName   = 'onebite_dev';
*/

$DBServer = 'localhost'; // e.g 'localhost' or '192.168.1.100'
$DBUser   = 'root';
$DBPass   = '';
$DBName   = 'test';
//header("location:wizSports1.php");
$connection = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
 
// check connection
if ($connection->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}


/*
$db_host='mysql.liveapp.ca';
$db_username='liveapp_dev';
$db_database='onebite_dev';
// LOCALHOST Password
//$db_password='onebitepass';

// GO DADDY PASSWORD
$db_password='BKJDf45i8s';


/*$db_host='anilmehta.powwebmysql.com';
$db_database='oneappportal';
$db_username='oneappadmin';
$db_password='oneappadmin';*/

/*$db_username='isaacsso_onebite';
$db_database='isaacsso_onebite';*/
/*
$connection = mysql_connect($db_host,$db_username,$db_password);
if (!$connection)
{
    die("Could not connect to the database: <br />". mysql_error( ));
}
$db_select = mysql_select_db($db_database);
if (!$db_select)
{
    die ("Could not select the database: <br />". mysql_error( ));
}
*/


?>
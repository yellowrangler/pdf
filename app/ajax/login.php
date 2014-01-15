<?php

require ('../class/class.Log.php');
include ('../class/class.ErrorLog.php');
include ('../class/class.AccessLog.php');

//
// get date time for this transaction
//
$datetime = date("Y-m-d H:i:s");

//------------------------------------------------------
// create admmin userid variables
//------------------------------------------------------
$username = $_POST["username"];
$password = $_POST["password"];
$userdatetime = $datetime;

//------------------------------------------------------
// set up msg array for passback
//------------------------------------------------------
$returnArray = array();
$returnArray["status"] = "";
$returnArray["userid"] = "";
$returnArray["username"] = $username;
$returnArray["text"] = "";

//  debugg
// print_r($username);
// print_r($password);

//
// messaging
//
$returnArrayLog = new AccessLog("logs/");
$returnArrayLog->writeLog("Admin UserID Login started for ".$username );

//------------------------------------------------------
// get admin user info
//------------------------------------------------------
// open connection to host
$DBhost = "localhost";
$DBschema = "hadb";
$DBuser = "haadmin";
$DBpassword = "haadmin";

//
// connect to db
//
$dbConn = @mysql_connect($DBhost, $DBuser, $DBpassword);
if (!$dbConn) 
{
	$log = new ErrorLog("logs/");
	$dberr = mysql_error();
	$log->writeLog("DB error: $dberr - Error mysql connect");

	$returnArray["status"] = "err";
	$returnArray["text"] = "System Error 001. Unable to process admin user login.";
	exit(json_encode($returnArray));
}

if (!mysql_select_db($DBschema, $dbConn)) 
{
	$log = new ErrorLog("logs/");
	$dberr = mysql_error();
	$log->writeLog("DB error: $dberr - Error selecting db");

	$returnArray["status"] = "err";
	$returnArray["text"] = "System Error 002. Unable to process admin user login.";
	exit(json_encode($returnArray));
}

//------------------------------------------------------
// get userid for username passed
//------------------------------------------------------      
$sql = "select userid,password from haadminusertbl where username = '$username'";

$sql_result = @mysql_query($sql, $dbConn);
if (!$sql_result)
{
	$log = new ErrorLog("logs/");
	$sqlerr = mysql_error();
	$log->writeLog("SQL error: $sqlerr - Error doing admin user login select");
	$log->writeLog("SQL: $sql");

	$returnArray["status"] = "err";
	$returnArray["text"] = "System Error 011. Unable to process admin user login.";
	exit(json_encode($returnArray));
}

$count = mysql_num_rows($sql_result);
if ($count == 1)
{
	$row = @mysql_fetch_array($sql_result,MYSQL_ASSOC);
	
	$returnArray["userid"] = $row['userid'];
	if (strcmp($password,$row['password']))
	{
		$returnArray["status"] = "err";
		$returnArray["text"] = "Admin UserID password does not match password entered for Admin User Name = $username";
	}
	else
	{
		$returnArray["status"] = "ok";
		$returnArray["text"] = "";		
	}
} 
else
{
	$returnArray["status"] = "err";
	$returnArray["text"] = "Admin UserID Not Found for Admin User Name = $username";
}

//
// close db connection
//
mysql_close($dbConn);
	
//
// messaging
//
$status = $returnArray["status"];
$returnArrayLog->writeLog("Admin UserID Login ended for $username. Status:$status");	

//
// write email
//

//
// pass back info
//
exit(json_encode($returnArray));
?>

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
$providername = $_POST["providername"];
$userdatetime = $datetime;

//  debugg
// print_r($providername);

//
// messaging
//
$returnArrayLog = new AccessLog("logs/");
$returnArrayLog->writeLog("Provider List request started for provider = $providername" );

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
	$returnArray["text"] = "System Error 001. Unable to process provider list.";
	exit(json_encode($returnArray));
}

if (!mysql_select_db($DBschema, $dbConn)) 
{
	$log = new ErrorLog("logs/");
	$dberr = mysql_error();
	$log->writeLog("DB error: $dberr - Error selecting db");

	$returnArray["status"] = "err";
	$returnArray["text"] = "System Error 002. Unable to process provider list.";
	exit(json_encode($returnArray));
}

//---------------------------------------------------------------
// get provider information using information passed. limit 5 
//---------------------------------------------------------------

$sql = "SELECT CONCAT(pr.firstname, ' ', pr.lastname) name, 
email, mobilephone, address1, address2, city, state, zip, pr.id AS providerid, NPI AS npi
FROM haprovidertbl pr
INNER JOIN haprovideraddresstbl adr ON pr.ID = adr.providerid AND addresstype = 'primary'
LEFT JOIN haaddresstbl ad ON ad.ID = adr.addressid 
WHERE CONCAT(pr.firstname, ' ', pr.lastname) LIKE '$providername%'
OR firstname LIKE '$providername%' 
OR lastname LIKE '$providername%'
LIMIT 5";

//  debugg
// print_r($sql);
$returnArrayLog->writeLog("Provider List request sql start.");
$returnArrayLog->writeLog($sql);
$returnArrayLog->writeLog("Provider List request sql end.");

$sql_result = @mysql_query($sql, $dbConn);
if (!$sql_result)
{
	$log = new ErrorLog("logs/");
	$sqlerr = mysql_error();
	$log->writeLog("SQL error: $sqlerr - Error doing provider list select");
	$log->writeLog("SQL: $sql");

	$returnArray["status"] = "err";
	$returnArray["text"] = "System Error 011. Unable to process provider list select.";
	exit(json_encode($returnArray));
}

$count = mysql_num_rows($sql_result);
if ($count > 0)
{
	$rows = array();
	while($row = mysql_fetch_assoc($sql_result)) {
	    $results[] = $row;
	}
}

//
// close db connection
//
mysql_close($dbConn);
	
//
// logging
//
$returnArrayLog->writeLog("Provider List request ended.");	

//
// pass back info
//
if ($count > 0)
{
	exit(json_encode($results));
}
?>

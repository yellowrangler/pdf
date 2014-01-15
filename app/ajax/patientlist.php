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
$patientname = $_POST["patientname"];
$userdatetime = $datetime;

//  debugg
// print_r($patientname);

//
// messaging
//
$returnArrayLog = new AccessLog("logs/");
$returnArrayLog->writeLog("Patient List request started for patientname = $patientname" );

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
	$returnArray["text"] = "System Error 001. Unable to process patient list.";
	exit(json_encode($returnArray));
}

if (!mysql_select_db($DBschema, $dbConn)) 
{
	$log = new ErrorLog("logs/");
	$dberr = mysql_error();
	$log->writeLog("DB error: $dberr - Error selecting db");

	$returnArray["status"] = "err";
	$returnArray["text"] = "System Error 002. Unable to process patient list.";
	exit(json_encode($returnArray));
}

//---------------------------------------------------------------
// get patient information using information passed. limit 5 
//---------------------------------------------------------------

$sql = "SELECT CONCAT(pa.firstname, ' ', pa.lastname) name, 
email, mobilephone, address1, address2, city, state, zip, pa.id AS patientid
FROM hapatienttbl pa
INNER JOIN hapatientaddresstbl adr ON pa.ID = adr.patientid AND addresstype = 'primary'
LEFT JOIN haaddresstbl ad ON ad.ID = adr.addressid 
WHERE CONCAT(pa.firstname, ' ', pa.lastname) LIKE '$patientname%' 
OR pa.firstname LIKE '$patientname%' 
OR pa.lastname LIKE '$patientname%' 
LIMIT 5";

//  debugg
// print_r($sql);
$returnArrayLog->writeLog("Patient List request sql start.");
$returnArrayLog->writeLog($sql);
$returnArrayLog->writeLog("Patient List request sql end.");

$sql_result = @mysql_query($sql, $dbConn);
if (!$sql_result)
{
	$log = new ErrorLog("logs/");
	$sqlerr = mysql_error();
	$log->writeLog("SQL error: $sqlerr - Error doing patient list select");
	$log->writeLog("SQL: $sql");

	$returnArray["status"] = "err";
	$returnArray["text"] = "System Error 011. Unable to process patient list select.";
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
$returnArrayLog->writeLog("Patient List request ended.");	

//
// pass back info
//
if ($count > 0)
{
	exit(json_encode($results));
}
?>

<?php

require ('../class/class.Log.php');
include ('../class/class.ErrorLog.php');
include ('../class/class.AccessLog.php');

//
// get date time for this transaction
//
$datetime = date("Y-m-d H:i:s");

//------------------------------------------------------
// set up msg array for passback
//------------------------------------------------------
$msg = array();
$msg["status"] = "";
$msg["customerid"] = "0";
$msg["orderid"] = "0";
$msg["text"] = "";

//------------------------------------------------------
// create customer table data
//------------------------------------------------------
$customer = array();

$customer["firstname"] = $_POST["firstname"];
$customer["lastname"] = $_POST["lastname"];
$customer["address1"] = $_POST["address1"];
$customer["address2"] = $_POST["address2"];
$customer["city"] = $_POST["city"];
$customer["state"] = $_POST["state"];
$customer["zip"] = $_POST["zip"];
$customer["phone"] = $_POST["phone"];
$customer["country"] = $_POST["country"];
$customer["email"] = $_POST["email"];
$customer["datetime"] = $datetime;

$customerfullname = $customer["firstname"]." ".$customer["lastname"] ;

//------------------------------------------------------
// create order items data
//------------------------------------------------------
$orderItems = array();
$orderDetailNbr = count($_POST["sku"]);

for ($i = 0; $i < $orderDetailNbr; $i++)
{
	$orderItems[$i]["orderid"] = "0";
	$orderItems[$i]["orderdetailid"] = "0";
	$orderItems[$i]["sku"] = $_POST["sku"][$i];
	$orderItems[$i]["item"] = $_POST["item"][$i];
	$orderItems[$i]["costper"] = $_POST["costper"][$i];
	$orderItems[$i]["color"] = $_POST["color"][$i];	
	$orderItems[$i]["qty"] = $_POST["qty"][$i];
	$orderItems[$i]["totalcost"] = $_POST["totalcost"][$i];	
	$orderItems[$i]["datetime"] = $datetime;
}

//------------------------------------------------------
// create order data
//------------------------------------------------------
$order = array();

$order["customerid"] = "0";
$order["purchasetotal"] = $_POST["purchasetotal"];
$order["shippingcost"] = $_POST["shippingcost"];
$order["paymentrequired"] = $_POST["paymentrequired"];
$order["orderstatus"] = "pending";
$order["paypalstatus"] = "pending";
$order["datetime"] = $datetime;

//  debugg
// print_r($customer);
// print_r($orderItems);
// print_r($order);

//
// messaging
//
$msgLog = new AccessLog("logs/");
$msgLog->writeLog("Custoner Order started for ".$customerfullname);

//------------------------------------------------------
// Write to database with status of pending paypall 
//------------------------------------------------------
// open connection to host
$DBhost = "localhost";
$DBschema = "madmoosecreationsdb";
$DBuser = "madmoose";
$DBpassword = "madmoose";

//
// connect to db
//
$dbConn = mysql_connect($DBhost, $DBuser, $DBpassword);
if (!$dbConn) 
{
	$log = new ErrorLog("logs/");
	$dberr = mysql_error();
	$log->writeLog("DB error: $dberr - Error mysql connect");

	$msg["status"] = "err";
	$msg["text"] = "System Error 001. Unable to process your order.";
	exit(json_encode($msg));
}

if (!mysql_select_db($DBschema, $dbConn)) 
{
	$log = new ErrorLog("logs/");
	$dberr = mysql_error();
	$log->writeLog("DB error: $dberr - Error selecting db");

	$msg["status"] = "err";
	$msg["text"] = "System Error 002. Unable to process your order.";
	exit(json_encode($msg));
}

//------------------------------------------------------
// add client
//------------------------------------------------------      
$sql = "INSERT INTO customertbl (";

$custArrayNbr = count($customer);
$i = 1;
foreach ($customer as $key => $value) {
	if ($i == $custArrayNbr)
    	$sql = $sql.$key.")";
    else
    	$sql = $sql.$key.",";

    $i = $i + 1;
}	

$sql = $sql." VALUES (";

$i = 1;
foreach ($customer as $key => $value) {
	if ($i == $custArrayNbr)
    	$sql = $sql."'".$value."')";
    else
    	$sql = $sql."'".$value."',";

    $i = $i + 1;
}	

$sql_result = mysql_query($sql, $dbConn);
if (!$sql_result)
{
	$log = new ErrorLog("logs/");
	$sqlerr = mysql_error();
	$log->writeLog("SQL error: $sqlerr - Error doing customer insert");
	$log->writeLog("SQL: $sql");

	$msg["status"] = "err";
	$msg["text"] = "System Error 010. Unable to process your order.";
	exit(json_encode($msg));
}

//
// get inserted cutomer id
//
$customerID = mysql_insert_id();

//------------------------------------------------------
// add order
//------------------------------------------------------      
$sql = "INSERT INTO ordertbl (";

$order["customerid"] = $customerID;

$orderArrayNbr = count($order);
$i = 1;
foreach ($order as $key => $value) {
	if ($i == $orderArrayNbr)
    	$sql = $sql.$key.")";
    else
    	$sql = $sql.$key.",";

    $i = $i + 1;
}	

$sql = $sql." VALUES (";

$i = 1;
foreach ($order as $key => $value) {
	if ($i == $orderArrayNbr)
    	$sql = $sql."'".$value."')";
    else
    	$sql = $sql."'".$value."',";

    $i = $i + 1;
}	

$sql_result = mysql_query($sql, $dbConn);
if (!$sql_result)
{
	$log = new ErrorLog("logs/");
	$sqlerr = mysql_error();
	$log->writeLog("SQL error: $sqlerr - Error doing order insert");
	$log->writeLog("SQL: $sql");

	$msg["status"] = "err";
	$msg["text"] = "System Error 011. Unable to process your order.";
	exit(json_encode($msg));
}

//
// get inserted order id
//
$orderID = mysql_insert_id();

//------------------------------------------------------
// add order to history table 
//------------------------------------------------------  
$sql = "INSERT into orderhistorytbl select * from ordertbl where orderid = $orderID";
$sql_result = mysql_query($sql, $dbConn);
if (!$sql_result)
{
	$log = new ErrorLog("logs/");
	$sqlerr = mysql_error();
	$log->writeLog("SQL error: $sqlerr - Error inserting history for order");
	$log->writeLog("SQL: $sql");

	$msg["status"] = "err";
	$msg["html"] = "<center>System Error 060. Unable to confirm your order.</center>";
	exit(json_encode($msg));
}

//------------------------------------------------------
// add order detail items
//------------------------------------------------------   
for ($j = 0; $j < $orderDetailNbr; $j++)
{
	$orderItems[$j]["orderid"] = $orderID;
	$orderItems[$j]["orderdetailid"] = $j + 1;

	$sql = "INSERT INTO orderdetailtbl (";

	$orderdetailArrayNbr = count($orderItems[$j]);
	$i = 1;
	foreach ($orderItems[$j] as $key => $value) {
		if ($i == $orderdetailArrayNbr)
	    	$sql = $sql.$key.")";
	    else
	    	$sql = $sql.$key.",";

	    $i = $i + 1;
	}	

	$sql = $sql." VALUES (";

	$i = 1;
	foreach ($orderItems[$j] as $key => $value) {
		if ($i == $orderdetailArrayNbr)
	    	$sql = $sql."'".$value."')";
	    else
	    	$sql = $sql."'".$value."',";

	    $i = $i + 1;
	}	

	$sql_result = mysql_query($sql, $dbConn);
	if (!$sql_result)
	{
		$log = new ErrorLog("logs/");
		$sqlerr = mysql_error();
		$log->writeLog("SQL error: $sqlerr - Error doing orderdetail insert");
		$log->writeLog("SQL: $sql");

		$msg["status"] = "err";
		$msg["text"] = "System Error 012. Unable to process your order.";
		exit(json_encode($msg));
	}
}

//
// close db connection
//
mysql_close($dbConn);
	
//
// messaging
//
$msgLog->writeLog("Custoner Order pendig for  ".$customerfullname);	

//
// write email
//

//
// pass back info
//
$msg["status"] = "ok";
$msg["customerid"] = sprintf("%u", $customerID); 
$msg["orderid"] = sprintf("%u", $orderID); 
$msg["text"] = "";

exit(json_encode($msg));
?>

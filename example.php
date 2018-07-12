<?php

//  Export Optus Data Usage
//  By Tom Kavanagh https://github.com/tkav/optus-data-usage

include('optus.php');

//Optus Account
$Username = 'USERNAME';
$Password = 'PASSWORD';

//Login and create session
$login = Optus::login($Username, $Password);

$checklogin = Optus::checklogin($Username, $Password);

//Variables from AJAX Requests after login
$CustomerID = 'CUSTOMER_ID';
$AccountID = 'ACCOUNT_ID';
$SubscriptionID = 'SUBSCRIPTION_ID'; //Can't find

//Get Data Usage
$txt = Optus::getPage('test.txt', $CustomerID, $AccountID, $SubscriptionID);

?>

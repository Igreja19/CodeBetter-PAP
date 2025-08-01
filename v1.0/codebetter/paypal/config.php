<?php 
/* 
 * PayPal and database configuration 
 */ 
  
// PayPal configuration 
//define('PAYPAL_ID', 'Insert_PayPal_Business_Email'); 
define('PAYPAL_ID', 'codebetter@enterprise.com'); 

define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE 
 
define('PAYPAL_RETURN_URL', 'localhost/codebetter/paypal/success.php'); 
define('PAYPAL_CANCEL_URL', 'localhost/codebetter/paypal/cancel.php'); 
define('PAYPAL_NOTIFY_URL', 'localhost/codebetter/paypal/ipn.php'); 
define('PAYPAL_CURRENCY', 'EUR'); 
 
// Database configuration 
define('DB_HOST', 'localhost'); 
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', ''); 
define('DB_NAME', 'codebetter'); 
 
// Change not required 
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");
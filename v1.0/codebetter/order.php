<?php
if(isset($_GET['id']) && Is_Numeric($_GET['id']))
{
session_start();
require_once("includes/db.php");
require_once("includes/init.php");

$id = (int)$_GET['id'];
//$paypalemail = 'codebetter@enterprise.com';
$paypalemailsql = $odb -> query("SELECT email FROM gateway LIMIT 1");
$paypalemail = $paypalemailsql->fetchColumn(0);

//$paypalemail = $odb -> query("SELECT `email` FROM `gateway` LIMIT 1") -> fetchColumn(0);
$plansql = $odb -> prepare("SELECT * FROM `plans` WHERE `id` = :id");
$plansql -> execute(array(":id" => $id));
$row = $plansql -> fetch();
if($row === NULL) { die("Bad id"); }
$paypalurl = "https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_xclick&amount=".urlencode($row['price'])."&business=".urlencode($paypalemail)."&item_name=".
urlencode($row['name'])."&item_number=".urlencode($row['id']."_".$_SESSION['id'])."&return=http://localhost/codebetter/purchase.php&rm=2&notify_url=http://localhost/codebetter/paypal/ipn.php&cancel_return=http://localhost/codebetter/purchase.php&no_note=1&currency_code=EUR";

header("Location: ".$paypalurl);
}
?>

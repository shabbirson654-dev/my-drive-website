<?php

session_start();

require("db.php");
$user_email=$_SESSION['user'];


$plan=$_GET['plan'];

$tracker=$_GET['tracker'];

print_r($tracker);

$storage="";
if($plan=="start" && !empty($tracker) ){
    $storage=10240;
}
else if($plan=="premium" && !empty($tracker)){
    $storage=30720;
}
else if($plan=="golden" && !empty($tracker)){
    $storage=51200;
}

else{
	die("<h1 style='color:red;'>!!!Invalid Try Again Later!!!</h1>");
}
$purchase_date=date('Y-m-d');

$pd= new DateTime($purchase_date);
$pd->add(new DateInterval('P30D'));

$ed=$pd->format('Y-m-d');

$update=$db->query("UPDATE users SET plans='$plan', storage='$storage',purchase_date='$purchase_date',expiry_date='$ed',tracker='$tracker'  WHERE email='$user_email'");
if($update){
    header("Location: profile.php");
}

else{
    echo "update_failed";
}










?>
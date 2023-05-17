<?php

$c_user = $_POST["c_user"];
$c_pass = $_POST["c_pass"];
$con_pass = $_POST["con_pass"];
$c_name = $_POST["c_name"];
$c_gender = $_POST["c_gender"];
$birthday = $_POST["birthday"];
$c_address = $_POST["c_address"];
$c_phone = $_POST["c_phone"];



if($c_user == "") die("false + c_user + Please enter your user name!");
if($c_pass == "") die("false + c_pass + Please enter your password!");
if($con_pass == "") die("false + con_pass + Please confirm your password!!");
if($c_name == "") die("false + c_name + Please enter your name!");
if($c_gender == "") die("false + c_gender + Please choose your gender!");
if($birthday == "") die("false + birthday + Please enter your birthday!");
if($c_address == "") die("false + c_address + Please enter your address!");
if($c_phone == "") die("false + c_phone + Please enter your phone!");

if(str_contains($c_user,' ')) die("false + c_user + Username must't have whitespace!");

if(strlen($c_pass) < 6) die("false + Your password is so weak!");
$specialStrings = array("!","@","#","$","%","^","&","*","-","~","_");
if(strlen($c_pass) > 6 and preg_match("/[a-z]/i", $c_pass) or preg_match("/\d+/",$c_pass)) {
    $isWeak = true;
    foreach ($specialStrings as $key => $value) {
        if(str_contains($c_pass,$value)){
            $isWeak = false;
            break;
        }
    }
    
    if($isWeak)
        die("false + Your password is weak!");
}

if($c_pass != $con_pass) die("false + Your confirm password is wrong!");

if(!is_numeric($c_phone) or !str_starts_with($c_phone,"0") or strlen($c_phone) < 10 or strlen($c_phone) > 10) die("false + Your phone is wrong!");

$arr_birthday = array_reverse(explode("-",$birthday));
$birthday = implode("-",$arr_birthday);

require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/connect_database.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/account/account.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/account/list_account.php");
$listAccount = new ListAccount();

if(!$listAccount->CheckUserIsExist($c_user)) die("false + c_user + Username was existed!");

$id_account = uniqid("acct",false);
$listAccount->AddAccount($id_account,$c_user,$c_pass,"grup6463091469b90");

require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/customer/customer.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/customer/list_customer.php");
$listCustomer = new ListCustomer();
$id_customer = uniqid("cust",false);
$listCustomer->AddNewCustomer($id_customer,$c_name,$birthday,$c_gender,$c_address,$c_phone,$id_account);
?>
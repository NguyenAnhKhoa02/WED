<?php
    session_start();
    $name = $_POST["name"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];

    if($name == "") die("false + name + Please enter your name!");
    if($address == "") die("false + address + Please enter your address!");
    if($phone == "") die("false + phone + Please enter your phone!");   
    if(!is_numeric($phone) or !str_starts_with($phone,"0") or strlen($phone) < 10 or strlen($phone) > 10) die("false + phone + Your phone is wrong!");

    require_once($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/connect_database.php');
    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/customer/customer.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/customer/list_customer.php");
    $listCustomer = new ListCustomer();

    $listCustomer->UpdateCustomer($_SESSION["idCustomer"],$name,$address,$phone);
?>
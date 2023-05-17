<?php
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    if($username == "") die("false + c_username + Please enter your user name!");
    if($password == "") die("false + c_password + Please enter your password!");
    if(str_contains($username,' ')) die("false + c_username + Username must't have whitespace!");
    if(str_contains($password,' ')) die("false + c_password + Password must't have whitespace!");

    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/connect_database.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/account/account.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/account/list_account.php");
    $listAccount = new ListAccount();

    if(!$listAccount->CheckLogin(trim($username),trim($password))) die("false + c_username + Your username or password is not correct!");

    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/customer/customer.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/customer/list_customer.php");
    $listCustomer = new ListCustomer();

    $listCustomer->GetIdFromIdAccount($listAccount->id_account);

    session_start();
    $_SESSION["idCustomer"] = $listCustomer->id_customer;
    $_SESSION["idGroupRole"] = $listAccount->id_group_roles;
    $_SESSION["idAccount"] = $listAccount->id_account;
?>
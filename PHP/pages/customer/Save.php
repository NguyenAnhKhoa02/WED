<?php
    session_start();

    $idInvoice = $_POST["idInvoice"];
    $idOrder = $_POST["idOrder"];
    $dateCreate = $_POST["dateCreate"];
    $dateReceive = $_POST["dateReceive"];
    $total = $_POST["total"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];

    if($address == "") die("false + address + Please enter your address!");
    if($phone == "") die("false + phone + Please enter your phone!");
    if(!is_numeric($phone) or !str_starts_with($phone,"0") or strlen($phone) < 10 or strlen($phone) > 10) die("false + phone +  Your phone is wrong!");

    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/connect_database.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/invoice/invoice.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/invoice/list_invoice.php");
    $listInvoice = new ListInvoice();

    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/order/order.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/order/list_order.php");
    $listOrder = new ListOrder();

    $listInvoice->AddToDB($idInvoice, $dateCreate,"chờ xác nhận",$total,$_SESSION["carts"]);
    $listOrder->AddToDB($idOrder,$_SESSION["idCustomer"],$address,$phone,$dateCreate,$dateReceive,"chờ xác nhận",$idInvoice);
    $_SESSION["carts"] = array();

    echo "Successful";
?>
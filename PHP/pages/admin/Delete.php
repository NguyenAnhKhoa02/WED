<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/connect_database.php");

    $mode = $_POST["mode"];
    $id = $_POST["id"];

    if($mode == "Product"){
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/product/product.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/product/list_product.php");
        $listProduct = new ListProduct();
        $listProduct->RemoveProduct($id);
    }

    if($mode == "GroupRole"){
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/group_role/group_role.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/group_role/list_groupRole.php");
        $listGroupRole = new ListGroupRole();
        $listGroupRole->RemoveGroupRole($id);
    }

    if($mode == "Customer"){
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/account/account.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/account/list_account.php");
        $listAccount = new ListAccount();

        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/customer/customer.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/customer/list_customer.php");
        $listCustomer = new ListCustomer();

        $id_account = $listCustomer->getIdAccount($id);

        $listCustomer->RemoveCustomer($id);
        $listAccount->RemoveAccount($id_account);
    }

    echo 'delete success';
?>
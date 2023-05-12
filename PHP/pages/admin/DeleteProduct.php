<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/connect_database.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/product/product.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/product/list_product.php");
    $listProduct = new ListProduct();

    $id = $_POST["id"];
    $listProduct->RemoveProduct($id);

    echo 'delete success';
?>
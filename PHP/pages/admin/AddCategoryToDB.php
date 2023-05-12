<?php
    $name = $_POST["name"];

    if($name != ""){
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/connect_database.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/category/category.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/category/list_category.php");
        $listCategory = new ListCategory();

        $listCategory->addNewCategory($name);
    }else{
        echo 'no';
    }
?>
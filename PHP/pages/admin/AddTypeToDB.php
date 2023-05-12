<?php
    $name = $_POST["name"];
    
    if($name != ""){
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/connect_database.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/type/type.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/type/list_type.php");

        $listType = new ListType();
        $listType->addNewType($name);
    }
?>
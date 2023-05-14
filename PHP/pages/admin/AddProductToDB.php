<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/connect_database.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/product/product.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/product/list_product.php");
    $list = new ListProduct();

    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/category/category.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/category/list_category.php");
    $listCategory = new ListCategory();

    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/type/type.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/type/list_type.php");
    $listType = new ListType();

    $nameProd = $_POST["nameProd"];
    $price = $_POST["price"];
    $material = $_POST["material"];
    $gender = $_POST["gender"];
    $made_by = $_POST["made_by"];
    $status = $_POST["status"];
    $colors = $_POST["colors"];
    $sizes = $_POST["sizes"];
    $category = $_POST["category"];
    $type = $_POST["type"];
    $quantities = $_POST["quantities"];
    $description = $_POST["description"];

    $category = $listCategory->getIdFromName($category);
    $type = $listType->getIdFromName($type);

    $images = array();
    for ($i=0; $i < sizeof(explode(",",$colors)); $i++) { 
        if(isset($_FILES["image$i"])){
            $image = $_FILES["image$i"]['name'];
            $file_image = $_FILES["image$i"]['tmp_name'];
            $dir_saved = $_SERVER["DOCUMENT_ROOT"]."/PHP/img/".$_FILES["image$i"]['name'];
            move_uploaded_file($_FILES["image$i"]['tmp_name'],$dir_saved);

            $images[] = $image;
        }else{
            $images = "NULL";
        }
    }

    if($nameProd == ""){
        die("Name is null");
    } else if($price == ""){
        die("Price is null");
    } elseif ($made_by == "") {
        die("Made_by is null");
    } elseif ($colors == "") {
        die("Color is null");
    } elseif ($quantities == "") {
        die("Quantities is null");
    }

    $list->addNewProduct($nameProd,$price,$material,$gender,$made_by,$status,$colors,$sizes,$category,$type,$quantities,$description,$images);

    echo 'Add Success';
?>
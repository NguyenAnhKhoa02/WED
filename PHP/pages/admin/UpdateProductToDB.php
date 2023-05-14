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

    $id = $_POST["id"];
    $name = $_POST["nameProd"];
    $price = $_POST["price"];
    $material = $_POST["material"];
    $gender = $_POST["gender"];
    $made_by = $_POST["made_by"];
    $status = $_POST["status"];
    $color = $_POST["colors"];
    $size = $_POST["sizes"];
    $category = $_POST["category"];
    $type = $_POST["type"];
    $quantity = $_POST["quantities"];
    $description = $_POST["description"];
    $quantity_purchased = $_POST["quantity_purchased"];

    $category = $listCategory->getIdFromName($category);
    $type = $listType->getIdFromName($type);

    if($name == ""){
        die("Name is null");
    }elseif($price == ""){
        die("Price is null");
    } elseif ($made_by == "") {
        die("Made_by is null");
    } elseif ($color == "") {
        die("Color is null");
    } elseif ($quantity == "") {
        die("Quantity is null");
    }

    $images = array();
    for ($i=0; $i < sizeof(explode(",",$color)); $i++) { 
        if(isset($_FILES["image$i"])){
            $image = $_FILES["image$i"]['name'];
            $file_image = $_FILES["image$i"]['tmp_name'];
            $dir_saved = $_SERVER["DOCUMENT_ROOT"]."/PHP/img/".$_FILES["image$i"]['name'];
            move_uploaded_file($_FILES["image$i"]['tmp_name'],$dir_saved);

            $images[] = $image;
        } else{
            $images[] = "NULL";
        }
    }



    $list->UpdateProduct($id,$name,$price,$material,$gender,$made_by,$status,$color,$size,$category,$type,$quantity,$description,$images,$quantity_purchased);

    echo 'Update success';
?>
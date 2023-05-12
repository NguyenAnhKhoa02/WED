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
    $images = $_POST["images"];

    $category = $listCategory->getIdFromName($category);
    $type = $listType->getIdFromName($type);

    echo $images;

    // if($nameProd == ""){
    //     die("Name is null");
    // } else if($price == ""){
    //     die("Price is null");
    // } elseif ($made_by == "") {
    //     die("Made_by is null");
    // } elseif ($colors == "") {
    //     die("Color is null");
    // } elseif ($quantities == "") {
    //     die("Quantities is null");
    // }

    // if(isset($_FILES['image'])){
    //     $image = $_FILES['image']['name'];
    //     $file_image = $_FILES['image']['tmp_name'];
    //     $dir_saved = $_SERVER["DOCUMENT_ROOT"]."/PHP/img/".$_FILES['image']['name'];
    //     move_uploaded_file($_FILES['image']['tmp_name'],$dir_saved);

    //     $list->addNewProduct($nameProd,$price,$material,$gender,$made_by,$status,$color,$size,$category,$type,$quantity,$description,$image);
    // } else{
    //     $list->addNewProduct($nameProd,$price,$material,$gender,$made_by,$status,$colors,$sizes,$category,$type,$quantities,$description,"");   
    // }

    echo 'Add Success';
?>
<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/connect_database.php");
    $mode = $_POST["mode"];

    if($mode == "Product"){
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/product/product.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/product/list_product.php");
        $list = new ListProduct();

        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/category/category.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/category/list_category.php");
        $listCategory = new ListCategory();

        $id = $_POST["id"];
        $name = $_POST["nameProd"];
        $price = $_POST["price"];
        $material = $_POST["material"];
        $gender = $_POST["gender"];
        $made_by = $_POST["made_by"];
        $status = $_POST["status"];
        $colors = $_POST["colors"];
        $size = $_POST["sizes"];
        $category = $_POST["category"];
        $quantities = $_POST["quantities"];
        $description = $_POST["description"];
        $quantity_purchased = $_POST["quantity_purchased"];

        $category = $listCategory->getIdFromName($category);

        if($name == "") die("false + nameProd + Please enter the name of product!");
        if($price == "") die("false + price + Please enter the price of product!");
        if($material == "") die("false + material + Please enter the material of product!");
        if($made_by == "") die("false + made_by + Please fill up made by!");
        if($colors == "") die("false + color0 + Please enter the color of product!");
        if($quantities == "") die("false + quantity0 + Please enter the quantities of product!");
        if($quantity_purchased == "") die("false + quantity_purchased + Please enter the quantity purchased of product!");

        $arrCheckColor = explode(",",$colors);
        $arrCheckQuantities = explode(",",$quantities);
        for ($i=0; $i < count($arrCheckColor); $i++) { 
            if($arrCheckColor[$i] == "") die("false + color$i + Please enter the color of product!");
            if($arrCheckQuantities[$i] == "") die("false + quantity$i + Please enter the quantity of product!");
        }

        $images = array();
        for ($i=0; $i < sizeof(explode(",",$colors)); $i++) { 
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

        $list->UpdateProduct($id,$name,$price,$material,$gender,$made_by,$status,$colors,$size,$category,$quantities,$description,$images,$quantity_purchased);
    }

    if($mode == "GroupRole"){
        $name = $_POST["name"];
        $id = $_POST["id"];
        $arr_checkval = $_POST["arr_checkval"];
     
        if($name == "") die("false + name + Please enter name of group!");
        if(explode(",",$arr_checkval)[0] == "") die("false + none + You must choose role for this group!");
    
        $arr_checkval = explode(",",$arr_checkval);
    
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/group_role/group_role.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/group_role/list_role.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/group_role/list_groupRole.php");
    
        $listRole = new ListRole();
    
        $listRole->getAllIdFromListName($arr_checkval);
        if(count($listRole->listRole) != count($arr_checkval)) die("false + none + Error role!");
    
        $listGroupRole = new ListGroupRole();
        $listGroupRole->UpdateGroupRole($id,$name,$listRole->listRole);
    }

    if($mode == "Employee"){
        $id = $_POST["id"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $name = $_POST["name"];
        $birthday = $_POST["birthday"];
        $gender = $_POST["gender"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $grouprole = $_POST["grouprole"];


        if($username == "") die("false + username + Please enter your user name!");
        if($password == "") die("false + password + Please enter your password!");
        if($name == "") die("false + name + Please enter your name!");
        if($gender == "") die("false + gender + Please choose your gender!");
        if($birthday == "") die("false + birthday + Please enter your birthday!");
        if($phone == "") die("false + phone + Please enter your phone!");
        if(!is_numeric($phone) or !str_starts_with($phone,"0") or strlen($phone) < 10 or strlen($phone) > 10) die("false + phone +  Your phone is wrong!");
        if($address == "") die("false + address + Please enter your address!");

        $arr_birthday = array_reverse(explode("-",$birthday));
        $birthday = implode("-",$arr_birthday);

        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/connect_database.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/group_role/group_role.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/group_role/list_groupRole.php");
        $listGroupRole = new ListGroupRole();
        $id_group_role = $listGroupRole->GetIdFromName($grouprole);

        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/account/account.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/account/list_account.php");
        $listAccount = new ListAccount();

        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/customer/customer.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/customer/list_customer.php");
        $listCustomer = new ListCustomer();

        $id_account = $listCustomer->getIdAccount($id);
        $listAccount->UpdatePasswordAccount($id_account,$password,$id_group_role);

        $listCustomer->UpdateCustomer($id,$name,$address,$phone);
    }

    if($mode == "Order"){
        $status = $_POST["status"];
        $idInvoice = $_POST["idInvoice"];
        $idCustomer = $_POST["idCustomer"];
        $idOrder = $_POST["idOrder"];
        
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/connect_database.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/product/product.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/product/list_product.php");
        $listProduct = new ListProduct();

        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/invoice/invoice.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/invoice/list_invoice.php");
        $listInvoice = new ListInvoice();
        $listInvoice->UpdateStatus($idInvoice,$status);

        $listInvoice->getProductsInTrans($idInvoice);
        $listProduct->UpdateQuantity($listInvoice->listProductInCart);  

        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/order/order.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/order/list_order.php");
        $listOrder = new ListOrder();

        $listOrder->UpdateStatus($idOrder,$status);
    }

    echo 'Update success';
?>
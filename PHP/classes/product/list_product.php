<?php
    class ListProduct extends ConnectDatabase
    {
        public $listProduct = array();        

        function __construct(){}

        function getAll(){
            $this->OpenCon();
            $string_query = "select *
                             from product
                             inner join product_detail on product.id_product = product_detail.id_product
                             inner join category on product.id_category = category.id_category
                             inner join type_product on product.id_type_product = type_product.id_type_product
                             order by product.id_product asc";

            $this->ExcQuery($string_query);
            if($this->result->num_rows){
                while ($row = $this->result->fetch_assoc()) {
                    $this->listProduct[] = new Product($row["id_product"],
                                                 $row["nameProd"],
                                                 $row["price"],
                                                 $row["description"],
                                                 $row["material"],
                                                 $row["gender"],
                                                 $row["made_by"],
                                                 $row["status"],
                                                 $row["nameCate"],
                                                 $row["nameType"],
                                                 $row["color"],
                                                 $row["size"],
                                                 $row["quantity"],
                                                 $row["image"],
                                                 $row["quantity_purchased"]);
                }
            }

            $this->CloseCon();
        }

        function getAllFromProductTable(){

            $this->OpenCon();
            $string_query = "SELECT product.id_product, product.nameProd, product.price,product.material,product.gender,product.gender,product.made_by,product.status,category.nameCate,type_product.nameType
                             FROM product
                             INNER JOIN category on category.id_category = product.id_category
                             INNER JOIN type_product on type_product.id_type_product = product.id_type_product";

            $this->ExcQuery($string_query);
            if($this->result->num_rows){
                while ($row = $this->result->fetch_assoc()) {
                    $this->listProduct[] = new Product($row["id_product"],
                                                 $row["nameProd"],
                                                 $row["price"],
                                                 "",
                                                 $row["material"],
                                                 $row["gender"],
                                                 $row["made_by"],
                                                 $row["status"],
                                                 $row["nameCate"],
                                                 $row["nameType"],
                                                 "",
                                                 "",
                                                 "",
                                                 "",
                                                 "");
                }
            }

            $this->CloseCon();

        }

        function addNewProduct($name,$price,$material,$gender,$made_by,$status,$color,$size,$category,$type,$quantity,$description,$images){
            $id_product = uniqid("prod",false);
            
            $this->OpenCon();
            $string_query = "INSERT INTO `product`(`id_product`,`nameProd` ,`price`, `description`, `material`, `gender`, `made_by`, `status`, `id_category`, `id_type_product`) VALUES ('$id_product','$name',$price,'$description','$material','$gender','$made_by','$status','$category','$type')";
            $this->ExcQueryInsert($string_query);

            $arrColors = explode(",",$color);
            $arrQuantity = explode(",",$quantity);
            $arrSizes = explode(",",$size);

            for ($i=0; $i < sizeof($arrColors); $i++) { 
                $color_ = $arrColors[$i];
                $size_ = $arrSizes[$i];
                $quantity_ = $arrQuantity[$i];
                $image_ = $images[$i];
                $string_query = "INSERT INTO `product_detail`(`id_product`, `color`, `size`, `quantity`, `image`, `quantity_purchased`) VALUES ('$id_product','$color_','$size_','$quantity_','$image_','0')";
                $this->ExcQueryInsert($string_query);
            }

            // $string_query = 'INSERT INTO product_detail(id_product, color, size, quantity, url_image, quantity_purchased) VALUES ('.$id_product.',\''.$color.'\',\''.$size.'\','.$quantity.',\''.$image.'\',0)';
            // $this->ExcQueryInsert($string_query);

            $this->CloseCon();
        }

        function getProductWithID($id){
            $this->OpenCon();

            $string_query = "select * 
                             from product
                             inner join product_detail on product.id_product = product_detail.id_product
                             inner join category on product.id_category = category.id_category
                             inner join type_product on product.id_type_product = type_product.id_type_product
                             where product.id_product = '$id'";
            
            $this->ExcQuery($string_query);
            if($this->result->num_rows){
                while ($row = $this->result->fetch_assoc()) {
                    $this->listProduct[] = new Product($row["id_product"],
                                                       $row["nameProd"],
                                                       $row["price"],
                                                       $row["description"],
                                                       $row["material"],
                                                       $row["gender"],
                                                       $row["made_by"],
                                                       $row["status"],
                                                       $row["nameCate"],
                                                       $row["nameType"],
                                                       $row["color"],
                                                       $row["size"],
                                                       $row["quantity"],
                                                       $row["image"],
                                                       $row["quantity_purchased"]);
                }
            }

            $this->CloseCon();

            return $this->listProduct;
        }

        function UpdateProduct($id,$name,$price,$material,$gender,$made_by,$status,$color,$size,$category,$type,$quantity,$description,array $images,$quantity_purchased){
            $this->OpenCon();

            $string_query = 'UPDATE product SET 
                            nameProd = \''.$name.'\',
                            price=\''.$price.'\',
                            description=\''.$description.'\',
                            material=\''.$material.'\',
                            gender=\''.$gender.'\',
                            made_by=\''.$made_by.'\',
                            status=\''.$status.'\',
                            id_category=\''.$category.'\',
                            id_type_product=\''.$type.'\' 
                            WHERE id_product = \''.$id.'\'';

            $this->ExcQueryInsert($string_query);

            $arrColors = explode(",",$color);
            $arrQuantity = explode(",",$quantity);
            $arrSizes = explode(",",$size);
            $i = 0;

            $string_query = "DELETE FROM `product_detail` WHERE product_detail.id_product='$id'";
            $this->ExcQueryInsert($string_query);

            for ($i=0; $i < sizeof($arrColors); $i++) { 
                $color_ = $arrColors[$i];
                $size_ = $arrSizes[$i];
                $quantity_ = $arrQuantity[$i];
                $image_ = $images[$i];
                $string_query = "INSERT INTO `product_detail`(`id_product`, `color`, `size`, `quantity`, `image`, `quantity_purchased`) VALUES ('$id','$color_','$size_','$quantity_','$image_','0')";
                $this->ExcQueryInsert($string_query);
            }

            $this->CloseCon();
        }

        function RemoveProduct($id){
            $this->OpenCon();

            $string_query = 'DELETE FROM `product_detail` WHERE id_product = \''.$id.'\'';
            $this->ExcQueryInsert($string_query);

            $string_query = 'DELETE FROM `product` WHERE id_product = \''.$id.'\'';
            $this->ExcQueryInsert($string_query);

            $this->CloseCon();
        }
        function StartIndex($page){
            return ($page - 1) * 6;
        }

        function DividePage(){
            $numberProd = count($this->listProduct);
            $numberPage = $numberProd%6;
            return $retVal = ($numberPage == 0) ? $numberProd / 6 : $numberProd / 6 + 1;
        }

        function GetAllProdByGender($gender){
            $this->OpenCon();

            $string_query = "SELECT * 
                             FROM product
                             INNER JOIN product_detail on product_detail.id_product = product.id_product
                             INNER JOIN category on category.id_category = product.id_category
                             INNER JOIN type_product on type_product.id_type_product = product.id_type_product
                             WHERE product.gender = '$gender'";
            $this->ExcQuery($string_query);

            $this->listProduct = [];
            if($this->result->num_rows){
                while ($row = $this->result->fetch_assoc()) {
                    $this->listProduct[] = new Product($row["id_product"],
                                                       $row["nameProd"],
                                                       $row["price"],
                                                       $row["description"],
                                                       $row["material"],
                                                       $row["gender"],
                                                       $row["made_by"],
                                                       $row["status"],
                                                       $row["nameCate"],
                                                       $row["nameType"],
                                                       $row["color"],
                                                       $row["size"],
                                                       $row["quantity"],
                                                       $row["image"],
                                                       $row["quantity_purchased"]);
                }
            }

            $this->CloseCon();
        }
    }
?>
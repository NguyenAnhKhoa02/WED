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

        function addNewProduct($name,$price,$material,$gender,$made_by,$status,$color,$size,$category,$type,$quantity,$description,$image){
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
                $string_query = "INSERT INTO `product_detail`(`id_product`, `color`, `size`, `quantity`, `image`, `quantity_purchased`) VALUES ('$id_product','$color_','$size_','$quantity_','$image','0')";
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

        function UpdateProduct($id,$name,$price,$material,$gender,$made_by,$status,$color,$size,$category,$type,$quantity,$description,$image,$quantity_purchased,$listColorOriginal){
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
            $arrColorsOrginial = explode(",",$listColorOriginal);
            $i = 0;
            while($i < sizeof($arrColorsOrginial)) { 
                $color_ = $arrColors[$i];
                $size_ = $arrSizes[$i];
                $quantity_ = $arrQuantity[$i];
                $colorOrginial = $arrColorsOrginial[$i];

                $string_query = "UPDATE `product_detail` SET 
                                `color`='$color_',
                                `size`='$size_',
                                `quantity`='$quantity_',
                                `image`='$image',
                                `quantity_purchased`=$quantity_purchased
                                WHERE id_product='$id' and color='$colorOrginial'";

                $this->ExcQueryInsert($string_query);

                $i = $i +1;
            }

            echo $i;

            while ($i < sizeof($arrColors)) {
                $color_ = $arrColors[$i];
                $size_ = $arrSizes[$i];
                $quantity_ = $arrQuantity[$i];
                $string_query = "INSERT INTO `product_detail`(`id_product`, `color`, `size`, `quantity`, `image`, `quantity_purchased`) VALUES ('$id','$color_','$size_','$quantity_','$image','0')";
                $this->ExcQueryInsert($string_query);

                $i++;
            }

            // $string_query = 'UPDATE `product_detail` SET 
            //                 `color`=\''.$color.'\',
            //                 `size`=\''.$size.'\',
            //                 `quantity`='.$quantity.',
            //                 `url_image`=\''.$image.'\',
            //                 `quantity_purchased`='.$quantity_purchased.'
            //                 WHERE id_product = \''.$id.'\'';

            // $this->ExcQueryInsert($string_query);

            $this->CloseCon();
        }

        function RemoveProduct($id){
            $this->OpenCon();

            $string_query = 'DELETE FROM `product_detail` WHERE id_product = '.$id.'';
            $this->ExcQueryInsert($string_query);

            $string_query = 'DELETE FROM `product` WHERE id_product = '.$id.'';
            $this->ExcQueryInsert($string_query);

            $this->CloseCon();
        }
    }
    
?>
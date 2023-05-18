<?php
    class ListInvoice extends ConnectDatabase
    {
        function __construct(){}

        function AddToDB($idInvoice, $createDate,$status,$sumPrice,$listProducts){
            $this->OpenCon();

            $string_query = "INSERT INTO `invoice`(`id_invoice`, `create_date`, `status`, `sum_price`) 
                             VALUES ('$idInvoice','$createDate','$status','$sumPrice')";

            $this->ExcQueryInsert($string_query);

            foreach ($listProducts as $key => $value) {
                $product = json_decode($value);

                $string_query = "INSERT INTO `invoice_detail`(`id_invoice`, `id_product`, `color`, `size`, `quantity`, `price`) 
                                 VALUES ('$idInvoice','$product->id','$product->color','$product->size','$product->quantity','$product->price')";
                $this->ExcQueryInsert($string_query);
            }

            $this->CloseCon();
        }

        function UpdateStatus($id,$status){
            $this->OpenCon();

            $string_query = "UPDATE `invoice` SET `status`='$status' WHERE invoice.id_invoice = '$id'";
            $this->ExcQueryInsert($string_query);

            $this->CloseCon();
        }

        public $listProductInCart = [];
        function getProductsInTrans($idInvoice){
            $this->OpenCon();
            
            $string_query = "SELECT * FROM `invoice_detail` WHERE `invoice_detail`.id_invoice = '$idInvoice'";
            
            $this->ExcQuery($string_query);

            $this->listProductInCart = [];
            if($this->result->num_rows){
                while ($row = $this->result->fetch_assoc()) {
                    $this->listProductInCart[] = Product::ProductInCart($row["id_product"],
                                                                        "",
                                                                        $row["color"],
                                                                        $row["size"],
                                                                        $row["quantity"],
                                                                        "");
                }
            }

            $this->CloseCon();
        }
    }
    
?>
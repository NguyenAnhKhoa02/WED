<?php
    class ListOrder extends ConnectDatabase
    {
        public $listOrder = array();

        function UpdateStatus($id,$status){
            $this->OpenCon();

            $string_query="UPDATE `order` SET `status`='$status' WHERE `order`.`id_order`='$id'";
            $this->ExcQueryInsert($string_query);

            $this->CloseCon();
        }
        
        function DataForOrderAdmin($idOrder,$idCustomer){
            $this->OpenCon();

            $string_query = "SELECT `order`.`create_date`,`order`.`recieve_date`,`order`.`address`,`order`.`phone`,`product`.`nameProd`,invoice_detail.color,invoice_detail.size,invoice_detail.quantity,invoice_detail.price,`order`.`status`,customer.name,invoice.id_invoice
                             FROM order_detail,`order`,invoice,invoice_detail,product,product_detail,customer 
                             WHERE `order`.`id_order` = '$idOrder' 
                             and customer.id_customer = '$idCustomer' 
                             and order_detail.id_order = `order`.`id_order` 
                             and order_detail.id_invoice = invoice.id_invoice 
                             and invoice.id_invoice = invoice_detail.id_invoice 
                             and product.id_product = invoice_detail.id_product 
                             and product_detail.id_product = product.id_product 
                             GROUP BY product.id_product;";

            $this->ExcQuery($string_query);
            $this->listOrder = [];
            if($this->result->num_rows){
                while ($row = $this->result->fetch_assoc()) {
                    $this->listOrder[] = Order::OrderForShowAdmin($row["create_date"],
                                                                  $row["recieve_date"],
                                                                  $row["address"],
                                                                  $row["phone"],
                                                                  $row["nameProd"],
                                                                  $row["color"],
                                                                  $row["size"],
                                                                  $row["quantity"],
                                                                  $row["price"],
                                                                  $row["status"],
                                                                  $row["name"],
                                                                  $row["id_invoice"]);
                }
            }

            $this->CloseCon();
        }

        function DataForTableMangeOrderAdmin(){
            $this->OpenCon();

            $string_query = "SELECT `order`.`id_order`,`order`.`id_customer`,`order`.`create_date`,`order`.`recieve_date`,`order`.`status`,invoice.sum_price
                             FROM order_detail
                             INNER JOIN `order` on `order`.`id_order` = order_detail.id_order
                             INNER JOIN invoice on invoice.id_invoice = order_detail.id_invoice";
            
            $this->ExcQuery($string_query);
            $this->listOrder = [];
            if($this->result->num_rows){
                while ($row = $this->result->fetch_assoc()) {
                    $this->listOrder[] = Order::OrderShowForManageOrderAdmin($row["id_order"],
                                                                           $row["id_customer"],
                                                                           $row["create_date"],
                                                                           $row["recieve_date"],
                                                                           $row["sum_price"],
                                                                           $row["status"]);
                }
            }

            $this->CloseCon();
        }

        function DataForTableMangeOrder(){
            $this->OpenCon();

            $string_query = "SELECT order_detail.id_order,order_detail.id_invoice,`order`.`create_date`,`order`.`recieve_date`,invoice.sum_price,`order`.`status`
                             FROM order_detail
                             INNER JOIN `order` on order_detail.id_order = `order`.`id_order`
                             INNER JOIN invoice on invoice.id_invoice = order_detail.id_invoice";
            $this->ExcQuery($string_query);
            if($this->result->num_rows){
                while ($row = $this->result->fetch_assoc()) {
                    $this->listOrder[] = Order::OrderShowForManageOrder($row["id_order"],
                                                                      $row["id_invoice"],
                                                                      $row["create_date"],
                                                                      $row["recieve_date"],
                                                                      $row["sum_price"],
                                                                      $row["status"]);
                }
            }

            $this->CloseCon();
        }

        function GetAllDataForOrderShow($idOrder){
            $this->OpenCon();

            $string_query = "SELECT `order`.`create_date`,`order`.`recieve_date`,`order`.`address`,`order`.`phone`,`product`.`nameProd`,invoice_detail.color,invoice_detail.size,invoice_detail.quantity,invoice_detail.price,`order`.`status`
                             FROM order_detail,`order`,invoice,invoice_detail,product,product_detail
                             WHERE `order`.`id_order` = '$idOrder' 
                             and order_detail.id_order = `order`.`id_order`
                             and order_detail.id_invoice = invoice.id_invoice
                             and invoice.id_invoice = invoice_detail.id_invoice
                             and product.id_product = invoice_detail.id_product
                             and product_detail.id_product = product.id_product
                             GROUP BY product.id_product";

            $this->ExcQuery($string_query);
            $this->listOrder = [];
            if($this->result->num_rows){
                while ($row = $this->result->fetch_assoc()) {
                    $this->listOrder[] = Order::OrderForShow("",
                                                             "",
                                                             $row["address"],
                                                             $row["phone"],
                                                             $row["create_date"],
                                                             $row["recieve_date"],
                                                             $row["status"],
                                                             $row["nameProd"],
                                                             $row["color"],
                                                             $row["size"],
                                                             $row["quantity"],
                                                             $row["price"]);
                }
            }

            $this->CloseCon();
        }

        function AddToDB($idOrder,$idCustomer,$address,$phone,$createDate,$receiveDate,$status,$idInvoice){
            $this->OpenCon();

            $string_query = "INSERT INTO `order`(`id_order`, `id_customer`, `address`, `phone`, `create_date`, `recieve_date`, `status`) 
                             VALUES ('$idOrder','$idCustomer','$address','$phone','$createDate','$receiveDate','$status')";
            $this->ExcQueryInsert($string_query);

            $string_query = "INSERT INTO `order_detail`(`id_order`, `id_invoice`) 
                             VALUES ('$idOrder','$idInvoice')";
            $this->ExcQueryInsert($string_query);
            $this->CloseCon();
        }
    }
    
?>
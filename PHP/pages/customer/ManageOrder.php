<div class="container" style="text-align:center;">
    <h5>Manage Account</h5>
</div>

<table class="table table-hover">
    <thead>
        <tr>
          <th scope="col">IdOrder</th>
          <th scope="col">IdInvoice</th>
          <th scope="col">CreateDate</th>
          <th scope="col">RecieveDate</th>
          <th scope="col">Method_of_payment</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        //   require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/connect_database.php');
        //   $connectDB = new connectDatabase();
        //   $connectDB->OpenCon();

        //   $string_query = "select *
        //                    from product
        //                    inner join product_detail on product.id_product = product_detail.id_product
        //                    inner join category on product.id_category = category.id_category
        //                    inner join type_product on product.id_type_product = type_product.id_type_product";

        //   $connectDB->ExcQuery($string_query);
        
        //   while ($row = $connectDB->result->fetch_assoc()) {
        //     echo '<tr>
        //           <th scope="row">'.$row["id_product"].'
        //           <td>'.$row["price"].'</td>
        //           <td>'.$row["description"].'</td>
        //           <td>'.$row["metarial"].'</td>
        //           <td>'.$row["gender"].'</td>
        //           <td>'.$row["made_by"].'</td>
        //           <td>'.$row["status"].'</td>
        //           <td>'.$row["nameCate"].'</td>
        //           <td>'.$row["nameType"].'</td>
        //           <td>'.$row["color"].'</td>
        //           <td>'.$row["size"].'</td>
        //           <td>'.$row["quantity"].'</td>
        //           <td>'.$row["status"].'</td>
        //           <td>'.$row["url_image"].'</td>
        //           <td>'.$row["quantity_purchased"].'</td>
        //           </tr>';
        //   }
        ?>
      </tbody>
</table>
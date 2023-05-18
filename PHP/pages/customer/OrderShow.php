<?php
    session_start();
    $idOrder = $_POST["idOrder"];
    $idInvioce = $_POST["idInvoice"];

    require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/connect_database.php');
    require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/order/order.php');
    require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/order/list_order.php');
    $listOrder = new ListOrder();

    $listOrder->GetAllDataForOrderShow($idOrder);
?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
<form action="/PHP/pages/customer/Cart.php" method="post">
    <input name="" id="" class="btn btn-outline-primary" type="submit" value="Home">
</form>

    <div class="container">
        
        <div class="row" style="text-align:center;">
            <h4>
                Invoice
            </h4>
        </div>

        <div class="row">
            <h6>
                <?php
                    echo "IdInvoice:    " . $idInvioce . "<br>";
                    echo "IdOrder:      " . $idOrder . "<br>";
                    echo "Date:         " . $listOrder->listOrder[0]->createDate. "<br>";
                    echo "Receiving date (prediction):  " . $listOrder->listOrder[0]->receiveDate . "<br>";

                    echo '<label class="form-label">Address: '.$listOrder->listOrder[0]->address.'</label><br>';
                    echo '<label class="form-label">Phone: '.$listOrder->listOrder[0]->phone.'</label><br>';
                    echo '<label class="form-label">Status: '.$listOrder->listOrder[0]->status.'</label><br>';
                ?>
            </h6>
        </div>

        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">NameProd</th>
              <th scope="col">Color</th>
              <th scope="col">Size</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Sub Total</th>
            </tr>
          </thead>
        
          <tbody>
          
            <?php
              try {
                $total = 0;
                foreach ($listOrder->listOrder as $key => $value) {
                  $subTotal = $value->price * $value->quantity;
                  $total += $subTotal;
                  echo "
                    <tr>
                    <td>$value->nameProd</td>
                    <td>$value->color</td>
                    <td>$value->size</td>
                    <td>$value->price</td>
                    <td>$value->quantity</td>
                    <td>$subTotal</td>
                    </tr>
                  ";
                }

                echo "
                    <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style=\"font-weight: bold\">Total</td>
                    <td>$total</td>
                    </tr>
                ";
              } catch (Exception $th) {
                //throw $th;
              }
            ?>

          </tbody>
        </table>
    </div>
    </script>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
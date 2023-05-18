<?php
    session_start();
    $idOrder = $_POST["idOrder"];
    $idCustomer = $_POST["idCustomer"];

    require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/connect_database.php');
    require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/order/order.php');
    require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/order/list_order.php');
    $listOrder = new ListOrder();

    $listOrder->DataForOrderAdmin($idOrder,$idCustomer);
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
    <div class="container">
        
        <div class="row" style="text-align:center;">
            <h4>
                Invoice
            </h4>
        </div>

        <div class="row">
          <div class="col">
            <?php echo "IdOrder:".$idOrder."";?>
          </div>

          <div class="col">
            <?php echo "IdInvoice:".$listOrder->listOrder[0]->idInvoice."";?>
          </div>

          <div class="col">
            <?php echo "IdCustomer:".$idCustomer."";?>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <?php echo "Name Customer:".$listOrder->listOrder[0]->nameCus."";?>
          </div>

          <div class="col">
            <?php echo "Create date:".$listOrder->listOrder[0]->createDate."";?>
          </div>

          <div class="col">
            <?php echo "Recieve date:".$listOrder->listOrder[0]->receiveDate."";?>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <?php echo "Phone: ".$listOrder->listOrder[0]->phone."";?>
          </div>

          <div class="col">
            <?php echo "Address:".$listOrder->listOrder[0]->address."";?>
          </div>

          <div class="col">
            <?php echo "Status:".$listOrder->listOrder[0]->status."";?>
          </div>
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

        <div class="row" style="text-align:center;">
            <?php
              if($listOrder->listOrder[0]->status != "accept"){
                echo'
                <form method="post">
                  <input type="submit" class="btn btn-outline-primary" value="Xac nhan" id="btnStatus">
                </form>
                ';
              }
            ?>
        </div>
    </div>
    </script>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
    </script>

    <script>
        $(document).ready(function(){

          $("#btnStatus").click(function(e){
            e.preventDefault();
            var idCustomer = "<?php echo $idCustomer?>";
            var idOrder = "<?php echo $idOrder?>";
            var idInvoice = "<?php echo $listOrder->listOrder[0]->idInvoice?>"

            $.ajax({
              url:'Update.php',
              data:{mode:'Order',
                    status:'accept',
                    idCustomer:idCustomer,
                    idOrder:idOrder,
                    idInvoice:idInvoice},
              type:"post",
              success:function(result){
                $("#content").load("ManageOrder.php");
                console.log(result);
              }

            })
          })

        })
    </script>
</body>

</html>
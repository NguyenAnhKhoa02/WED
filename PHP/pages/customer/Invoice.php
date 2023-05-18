<?php
    session_start();

    require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/connect_database.php');
    require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/customer/customer.php');
    require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/customer/list_customer.php');
    $listCustomer = new ListCustomer();

    $customer = $listCustomer->GetDataFromId($_SESSION["idCustomer"]);
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
                    $idInvioce = uniqid("invc",false);
                    $idOrder = uniqid('ordr',false);
                    $dateCreate = date("d-m-Y");
                    echo "IdInvoice:    " . $idInvioce . "<br>";
                    echo "IdOrder:      " . $idOrder . "<br>";
                    echo "Date:         " . $dateCreate. "<br>";

                    $date=date_create(date("d-m-Y"));
                    date_add($date,date_interval_create_from_date_string("7 days"));
                    $dateRecieve = date_format($date,"d-m-Y");
                    echo "Receiving date (prediction):  " . $dateRecieve . "<br>";

                    echo '
                        <form action="" method="post">
                            <label class="form-label">Address</label>
                            <input class="form-control" type="text" name="" id="address" value="'.$customer->address.'">
                        </form>
                    ';

                    echo '
                        <form action="" method="post">
                            <label class="form-label">Phone</label>
                            <input class="form-control" type="text" name="" id="phone" value="'.$customer->phone.'">
                        </form>
                    ';
                ?>
            </h6>
        </div>

        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">NameProd</th>
              <th scope="col">Color</th>
              <th scope="col">Size</th>
              <th scope="col">Quantity</th>
              <th scope="col">Sub Total</th>
            </tr>
          </thead>
        
          <tbody>
          
            <?php
              try {
                if(!isset($_SESSION["carts"])) throw new Exception("");
                $total = 0;
                foreach ($_SESSION["carts"] as $key => $value) {
                  $field = json_decode($value);
                  $subTotal = $field->price * $field->quantity;
                  $total += $subTotal;
                  echo "
                    <tr>
                    <td>$field->name</td>
                    <td>$field->color</td>
                    <td>$field->size</td>
                    <td>$field->quantity</td>
                    <td>$subTotal</td>
                    </tr>
                  ";
                }

                echo "
                    <tr>
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

        <div class="row" style="text-align:center">
          <form action="" method="post">
            <input type="button" value="Accept" class="btn btn-outline-primary" id="btnAccept">
          </form>
        </div>
    </div>


    <script>
      function check_phone(){
        var val = document.getElementById("phone").value
        var isPhone = /^0\d{9}$/

        if(isPhone.test(val)){
            return true
        }else{
          return false
        }
      }
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
      $("#btnAccept").click(function(){
        try {
          var idInvoice = "<?php echo $idInvioce?>";
          var idOrder = "<?php echo $idOrder?>";
          var dateCreate = "<?php echo $dateCreate?>";
          var dateReceive = "<?php echo $dateRecieve?>";
          var sumPrice = <?php echo $total?>;
          var address = $("#address").val();
          var phone = $("#phone").val();

          if(address == "") throw "address + Please enter your address!";
          if(phone == "") throw "phone + Please enter your phone!";
          if(!check_phone()) throw "phone + Your phone is incorrect!";
          $.ajax({
            url:'Save.php',
            data:{idInvoice:idInvoice,
                  idOrder:idOrder,
                  dateCreate:dateCreate,
                  dateReceive:dateReceive,
                  total:sumPrice,
                  address:address,
                  phone:phone},
            type:'post',
            success: function(result){
              if(result.split("+")[0].trim() == "false"){
                $("#" + result.split("+")[1].trim()).focus();
                alert(result.split("+")[2]);
              }else{
                alert(result);
                window.location.href = "/PHP/index.php";
              }
            }
          })

        } catch (error) {
          idError = "#" + error.split("+")[0];
          messageError = error.split("+")[1];

          $(idError).focus();
          alert(messageError);
        }

      })

    })
  </script>
</body>

</html>
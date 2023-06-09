<?php
    session_start();

    require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/connect_database.php');
    require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/customer/customer.php');
    require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/customer/list_customer.php');
    $listCustomer = new ListCustomer();

    $customer = $listCustomer->GetDataFromId($_SESSION["idCustomer"]);
    
    if(isset($_POST["id"])){
      array_splice($_SESSION["carts"],$_POST["id"],1);
    }
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
<form action="http://localhost/PHP/index.php" method="post">
    <input name="" id="" class="btn btn-outline-primary" type="submit" value="Home">
</form>

    <div class="container">

        <div class="row">
            <h4>
                <?php echo $customer->name?>'s cart
            </h4>
        </div>

        <table class="table table-hover" id="CartTable">
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

                foreach ($_SESSION["carts"] as $key => $value) {
                  $field = json_decode($value);
                  $subTotal = $field->price * $field->quantity;
                  echo "
                    <tr>
                    <td>$field->name</td>
                    <td>$field->color</td>
                    <td>$field->size</td>
                    <td>$field->quantity</td>
                    <td>$subTotal</td>
                    <td><button class=\"btn btn-danger buttonDelete\" data-target=\"#modelConfirm\" data-toggle=\"modal\">Delete</button></td>
                    </tr>
                  ";
                }
              } catch (Exception $th) {
                //throw $th;
              }
            ?>

          </tbody>
        </table>

        <div class="row" style="text-align:center">
          <form action="" method="post">
            <input type="button" value="Order" class="btn btn-outline-primary" id="btnOrder">
          </form>
        </div>
    </div>

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

      $("#btnOrder").click(function(){
        try {
          var products = <?php echo $retVal = (isset($_SESSION["carts"])) ? json_encode($_SESSION["carts"]) : "'None'"?>;
          if(products == "None") throw "Empty!";
          if(products.length == 0) throw "Empty!";
          window.location.href = "/PHP/pages/customer/Invoice.php";
        } catch (error) {
          alert(error);
        }

      })

      $('td').click(function(){

        var row_index = $(this).parent().index('tr') - 1;
        if(confirm("Do you want to delete?")){
          $.ajax({
          url:'Cart.php',
          data:{id:row_index},
          type:'post',
          success: function(result){
            $('body').html(result);
          }
        })
        }
      }) 
    })
  </script>
</body>

</html>
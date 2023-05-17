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
<form action="http://localhost/PHP/index.php" method="post">
    <input name="" id="" class="btn btn-outline-primary" type="submit" value="Home">
</form>

    <div class="container" style="text-align:center;">
        <div class="row" style="text-align:left;">
            <h4>Hi,
                <?php
                    echo $customer->name;
                ?>    
            <h4>
        </div>
    </div>

    <div class="container" style="padding:0px; margin:0px 0px 0px 40px;">
        <div class="row">
            <div class="col-2 list-group">
              <button class="list-group-item list-group-item-action" id="Profile">Profile</button>
              <button class="list-group-item list-group-item-action" id="ManageOrder">ManageOrder</button>
           </div>

            <div class="col-10" id="content">
            </div>
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
        $("#Profile").click(function(){
            $.ajax({
                url:'Profile.php',
                success: function(result){
                    $("#content").html(result);
                }
            })
        })

        $("#ManageOrder").click(function(){
            $.ajax({
                url:'ManageOrder.php',
                success: function(result){
                    $("#content").html(result);
                }
            })
        })

        $("#Profile").click();
    })
  </script>

</body>

</html>
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

    <div class="container">

        <div class="row">
            <h4>
                <?php echo $customer->name?>'s cart
            </h4>
        </div>

    </div>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
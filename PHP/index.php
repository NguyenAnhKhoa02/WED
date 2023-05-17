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
  <!-- <link rel="stylesheet" href="/ClothingSale/css/style.css"> -->
</head>

<body>
  <?php
    session_start();
    // $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    require 'classes/connect_database.php';
  ?>

  <?php
      include "header/header.php";
      // $var = explode("?",$actual_link);
      // foreach ($var as $key => $value) {
      //   $check = $check_key->check_key($value);

      //   if($check == "cust") include "header/header.php";
      // }
      // if($check_key->check_key("id")){
      //   include "header/header_non_vid.php";
      // }else{
      //   include "header/header.php";
      // };
  ?>

  <?php
      include "content.php";
    // if($check_key->check_key("id")){
    //   include "pages/products.php";
    // }else{
    // }
  ?>



 
  <!-- <footer>

  </footer> -->

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

</body>

</html>
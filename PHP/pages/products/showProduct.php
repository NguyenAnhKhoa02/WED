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

  <head>
    <?php
        session_start();
        $idProd = $_SESSION["idProd"];

        include_once($_SERVER["DOCUMENT_ROOT"]."/PHP/header/header_non_vid.php");

        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/connect_database.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/product/product.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/product/list_product.php");
        $listProduct = new ListProduct();

        $listProduct->getProductWithID($idProd);
        $product = $listProduct->listProduct[0];

        if(isset($_POST["color"])){
          $color = $_POST["color"];
          $listSize = $listProduct->getAllSizeFromColor($idProd,$color);
        }else{
          $color = $product->color;
          $listSize = $listProduct->getAllSizeFromColor($idProd,$color);
        }

        $image = $listProduct->getImage($idProd,$color);
    ?>

    <?php
      try {
        if(isset($_POST["colorCart"])){
          $colorCart = $_POST["colorCart"];
          $sizeCart = $_POST["sizeCart"];
          $quantityCart = $_POST["quantityCart"];
          if($quantityCart > $listProduct->getQuantity($idProd,$colorCart,$sizeCart)) throw new Exception("error");

          $nameCart = $product->name;
          $priceCart = $product->price;
          $prodInCart = Product::ProductInCart($idProd,$nameCart,$colorCart,$sizeCart,$quantityCart,$priceCart);
          
          if(!isset($_SESSION["carts"])){
            $_SESSION["carts"][] = json_encode($prodInCart);
          }
          else{
            $length = count($_SESSION["carts"]);
            for ($i=0; $i <= $length; $i++) { 
              if($i == $length){
                $_SESSION["carts"][] = json_encode($prodInCart);
                break;
              }
              $value = json_decode($_SESSION["carts"][$i]);
              if($value->id == $idProd and $value->color == $colorCart and $value->size == $sizeCart){
                $value->quantity += $quantityCart;
                $_SESSION["carts"][$i] = json_encode($value);
                break;
              }
            }
          }
        }
      } catch (Exception $th) {
        echo "<script>alert('Not enough quantity in stock!')</script>";
      }
    ?>
  </head>

  <div class="container">

  <div class="row" style="text-align:center;">
    <h1><?php echo $product->name?></h1>
  </div>

  <div class="row justify-content-md-center">
    <div class="col-md-8">
      <div class="col" style="text-align: center;">
        <img src="<?php echo $retVal = ($image == "NULL") ? "http://localhost/PHP/img/noImage.jpg" : "http://localhost/PHP/img/$image" ;?>" alt="" style="width: 500px; height:500px;">
      </div>
    </div>

    <div class="col-md-3">
      <h2>Detail</h2>
      <?php
        echo "<h4>Material: ".$product->material."<h4>";
        echo "<h4>Gender: ".$product->gender."<h4>";
        echo "<h4>Made_by: ".$product->made_by."<h4>";
        echo "<h4>Category: ".$product->category."<h4>";
        echo "<h4>Description: ".$product->description."<h4>";
      ?>

      <div class="row">
        <div class="col">
            <label for="" class="form-label">Color</label>
        </div>
        <div class="col">
            <form action="" method="post">
              <select id="selectColor">
                <?php
                  $arr = [];
                  foreach ($listProduct->listProduct as $key => $value) {
                    if(in_array($value->color,$arr)) continue;
                    $arr[] = $value->color;
                    if($color == $value->color)
                      echo "<option selected>".$value->color."</option>";
                    else
                      echo "<option>".$value->color."</option>";
                  }
                ?>
              </select>
            </form>
        </div>
      </div>
      
      <div class="row">
        <div class="col">
          <label for="" class="form-label">Size</label>
        </div>
        <div class="col">
          <select id="selectSize">
            <?php
              foreach ($listSize as $key => $value) {
                echo "<option>".$value."</option>";
              }
            ?>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="" class="form-label">Quantity</label>
        </div>
        <div class="col">
          <input type="number" name="" id="quantity" class="form-label" style="width:100%;">
        </div>
      </div>

      <h2>Price: <?php echo $product->price?></h2>

      <div class="row" style="padding-top:50%;">
        <div class="col" style="text-align: center;">
          <button style="width: 100px; height:50px" class="btn btn-outline-primary">Order</button>
        </div>

        <div class="col" style="text-align: center;">
          <button style="width: 100px; height:50px" class="btn btn-outline-primary" id="AddCart">AddCart</button>
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

      $("#selectColor").change(function(){
        var colorSelected = $("#selectColor").val();
        $.ajax({
          url:'showProduct.php',
          data:{color:colorSelected},
          type:"post",
          success: function(result){
            $('body').html(result);
          }
        })
      })

      $("#AddCart").click(function(){
        try {
          var color = $("#selectColor").val();
          var size = $("#selectSize").val();
          var quantity = $("#quantity").val();

          if(quantity == "") throw "Please choose quantity";

          $.ajax({
            url:'showProduct.php',
            data:{colorCart:color,
                  sizeCart:size,
                  quantityCart:quantity},
            type:'post',
            success: function(result){
              $('body').html(result);
            }
          })
        } catch (error) {
          alert(error);
        }
      })
    })
  </script>
</body>

</html>
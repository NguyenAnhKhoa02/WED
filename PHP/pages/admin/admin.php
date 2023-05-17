<?php
    session_start();

    require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/connect_database.php');
    require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/group_role/group_role.php');
    require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/group_role/list_groupRole.php');
    $listGroupRole = new ListGroupRole();

    $listGroupRole->GetGroupRoleByID($_SESSION["idGroupRole"]);
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
  <!-- <link rel="stylesheet" href="/ClothingSale/css/style.css"> -->
</head>

<body>
    <form action="http://localhost/PHP/index.php" method="get">
        <input class="btn btn-outline-primary" type="submit" value="Admin">
    </form>

    <div class="container" style="text-align:center;">
        <h1>ADMIN PAGE</h1>
    </div>
    
    <div class="container" style="padding:0px; margin:0px 0px 0px 40px;">
        <div class="row">
            <div class="col-2 list-group">
              <?php
                foreach ($listGroupRole->listNameRole as $key => $value) {
                  if($value == "ManageProduction"){
                    echo "<button class=\"list-group-item list-group-item-action\" id=\"ManageProduction\">ManageProduction</button>";
                  }
                  if($value == "ManageCategory"){
                    echo "<button class=\"list-group-item list-group-item-action\" id=\"ManageCategory\">ManageCategory</button>";
                  }
                  if($value == "ManageType"){
                    echo "<button class=\"list-group-item list-group-item-action\" id=\"ManageType\">ManageType</button>";
                  }
                  if($value == "ManageInvoice"){
                    echo "<button class=\"list-group-item list-group-item-action\" id=\"ManageInvoice\">ManageInvoice</button>";
                  }
                  if($value == "ManageCustomer"){
                    echo "<button class=\"list-group-item list-group-item-action\" id=\"ManageCustomer\">ManageCustomer</button>";
                  }
                  if($value == "ManageEmployee"){
                    echo "<button class=\"list-group-item list-group-item-action\" id=\"ManageEmployee\">ManageEmployee</button>";
                  }
                  if($value == "ManageAccount"){
                    echo "<button class=\"list-group-item list-group-item-action\" id=\"ManageAccount\">ManageAccount</button>";
                  }
                  if($value == "ManageGroupRole"){
                    echo "<button class=\"list-group-item list-group-item-action\" id=\"ManageGroupRole\">ManageGroupRole</button>";
                  }
                  if($value == "ManageOrder"){
                    echo "<button class=\"list-group-item list-group-item-action\" id=\"ManageOrder\">ManageOrder</button>";
                  }
                }
              ?>
              <!-- <button class="list-group-item list-group-item-action" id="ManageProduction">ManageProduction</button> -->
              <!-- <button class="list-group-item list-group-item-action" id="ManageCategory">ManageCategory</button>
              <button class="list-group-item list-group-item-action" id="ManageType">ManageType</button>
              <button class="list-group-item list-group-item-action" id="ManageInvoice">ManageInvoice</button>
              <button class="list-group-item list-group-item-action" id="ManageCustomer">ManageCustomer</button>
              <button class="list-group-item list-group-item-action" id="ManageEmployee">ManageEmployee</button>
              <button class="list-group-item list-group-item-action" id="ManageAccount">ManageAccount</button>
              <button class="list-group-item list-group-item-action" id="ManageGroupRole">ManageGroupRole</button>
              <button class="list-group-item list-group-item-action" id="ManageOrder">ManageOrder</button> -->
           </div>

            <div class="col-10" id="content">
            </div>
        </div>
    </div>
  <!-- <footer>

  </footer> -->

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
      $("#ManageProduction").click(function(){
        $.ajax({
          url:"ManageProduction.php",
          data:{},
          success: function(result){
            $("#content").html(result);
          }
        })
      })

      $("#ManageCategory").click(function(){
        $.ajax({
          url:"ManageCategory.php",
          success: function(result){
            $("#content").html(result);
          }
        })
      })

      $("#ManageType").click(function(){
        $.ajax({
          url:"ManageType.php",
          success: function(result){
            $("#content").html(result);
          }
        })
      })

      $("#ManageInvoice").click(function(){
        $.ajax({
          url:"ManageInvoice.php",
          success: function(result){
            $("#content").html(result);
          }
        })
      })

      $("#ManageCustomer").click(function(){
        $.ajax({
          url:"ManageCustomer.php",
          success: function(result){
            $("#content").html(result);
          }
        })
      })

      $("#ManageEmployee").click(function(){
        $.ajax({
          url:"ManageEmployee.php",
          success: function(result){
            $("#content").html(result);
          }
        })
      })

      $("#ManageAccount").click(function(){
        $.ajax({
          url:"ManageAccount.php",
          success: function(result){
            $("#content").html(result);
          }
        })
      })

      $("#ManageGroupRole").click(function(){
        $.ajax({
          url:"ManageGroupRole.php",
          success: function(result){
            $("#content").html(result);
          }
        })
      })

      $("#ManageOrder").click(function(){
        $.ajax({
          url:"ManageOrder.php",
          success: function(result){
            $("#content").html(result);
          }
        })
      })
    })
  </script>

</body>

</html>
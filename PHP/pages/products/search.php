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
  ?>

  <div id="header">
    <?php
      include $_SERVER["DOCUMENT_ROOT"]."/PHP/header/header_non_vid.php";
    ?>
  </div>

  <div class="container">
        <div class="row">
            <div class="col-md-3" style="background-color:bisque;">
                <div class="row">
                    <label for="" class="form-label">Price</label>

                </div>

                <div class="row">
                    <label for="" class="form-label">Price</label>
                </div>
            </div>

            <div class="col-md-8" id="content"></div>
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
        $.ajax({
            url:'show.php',
            type: "post",
            data:{request:"search"},
            success: function(result){
                $("#content").html(result);
            }
        })



    })
  </script>

</body>

</html>
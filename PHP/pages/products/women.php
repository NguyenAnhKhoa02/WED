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
      require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/connect_database.php');
      require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/category/category.php');
      require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/category/list_category.php');
      $listCategory = new ListCategory();
      $listCategory->getAll();

      foreach ($listCategory->listCategory as $key => $value) {
        $arrName[] = $value->name;
      }
    ?>
  </div>

  <div class="container">
        <div class="row">
            <div class="col-md-3" style="background-color:bisque;">
              <label for="" class="form-label">Category</label><br>
              <?php
                foreach ($listCategory->listCategory as $key => $value) {
                  echo "<form>
                          <input type='checkbox' class='checkbox' value='$value->name'>
                          <label>$value->name</label>
                        </form>";
                }
              ?>
              


              <div class="row" style="text-align:center;">
                <form action="" method="post">
                  <input type="submit" value="Filter" class="btn btn-outline-primary" id="btnSubmit">
                </form>
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
            data:{request:"female"},
            success: function(result){
                $("#content").html(result);
            }
        })

        $("#btnSubmit").click(function(e){
          e.preventDefault();
          try {
            var checkedValuesCategory = $('input:checkbox:checked').map(function() {
              $stringValue = "'" + this.value + "'";
              return $stringValue;
            }).get();

            var checkedValuesMadeBy = "";

            var formData = new FormData();
            formData.append('request','filter');
            formData.append('gender','female')
            formData.append('filterCategory',checkedValuesCategory);
            formData.append('filterMadeBy',checkedValuesMadeBy);

            if(checkedValuesCategory.length > 0)
              $.ajax({  
                url:'show.php',
                type: "post",
                data:formData,
                processData:false,
                contentType:false,
                success: function(result){
                    $("#content").html(result);
                }
              }) 
            else
              $.ajax({
              url:'show.php',
              type: "post",
              data:{request:"female"},
              success: function(result){
                  $("#content").html(result);
              }
              })
          } catch (error) {
            alert("please choose option");
          }
        })

    })
  </script>

</body>

</html>
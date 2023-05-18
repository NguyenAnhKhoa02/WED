<div class="container" style="text-align:center;">
    <h5>Manage Production</h5>
</div>

<table class="table table-hover" id="displayTable">
    <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Material</th>
          <th scope="col">Gender</th>
          <th scope="col">Made_by</th>
          <th scope="col">Status</th>
          <th scope="col">Category</th>
        </tr>
      </thead>
      <tbody>
        <?php
          require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/connect_database.php');
          require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/product/product.php');
          require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/product/list_product.php');

          $list = new ListProduct();
          $list->getAllFromProductTable();

          foreach ($list->listProduct as $value) {
            echo '<tr>
                  <td>'.$value->id.'</td>
                  <td>'.$value->name.'</td>
                  <td>'.$value->price.'</td>
                  <td>'.$value->material.'</td>
                  <td>'.$value->gender.'</td>
                  <td>'.$value->made_by.'</td>
                  <td>'.$value->status.'</td>
                  <td>'.$value->category.'</td>
                  <td><button class="btn btn-warning buttonEdit">Edit</button></td>
                  <td><button class="btn btn-danger buttonDelete" data-target="#modelConfirm" data-toggle="modal">Delete</button></td>
                  </tr>';
          }
        ?>
      </tbody>
</table>

<div class="container" style="text-align:center;" method="post">
  <button id="Add" class="btn btn-outline-primary" value="AddProduct" name="function">Add</button> 
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
</script>

<script>
  $(document).ready(function(){
    $("#Add").click(function(){
      $.ajax({
        url:"Product.php",
        type:'post',
        data:{id:''},
        success: function(result){
          $("#content").html(result);
        }
      })
    })

    $("#displayTable").on('click',".buttonDelete",function(){
      var currentRow = $(this).closest("tr");
      var id=currentRow.find("td:eq(0)").text(); 

      if(confirm("Do you want to delete?")){
        $.ajax({
          url:'Delete.php',
          type:'post',
          data: {id:id,mode:"Product"},
          success:function(result){
              $("#content").load("ManageProduction.php");
          }
        }) 
      }
    })

    $("#displayTable").on('click',".buttonEdit",function(){
      var currentRow = $(this).closest("tr");
      var id=currentRow.find("td:eq(0)").text(); 

      $.ajax({
        url:'Product.php',
        type:'post',
        data: {id:id},
        success:function(result){
          $("#content").html(result);
        }
      }) 
    })
  })
</script>
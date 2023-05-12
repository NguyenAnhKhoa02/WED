<div class="container" style="text-align:center;">
    <h5>Manage Production</h5>
</div>

<table class="table table-hover" id="displayTable">
    <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Price</th>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Material</th>
          <th scope="col">Gender</th>
          <th scope="col">Made_by</th>
          <th scope="col">Status</th>
          <th scope="col">Category</th>
          <th scope="col">Type</th>
          <th scope="col">Color</th>
          <th scope="col">Size</th>
          <th scope="col">Quantity</th>
          <th scope="col">Image</th>
          <th scope="col">Quantity-purchased</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/connect_database.php');
          require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/product/product.php');
          require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/product/list_product.php');

          $list = new ListProduct();
          $list->getAll();

          foreach ($list->listProduct as $value) {
            echo '<tr>
                  <td>'.$value->id.'</td>
                  <td>'.$value->price.'</td>
                  <td>'.$value->name.'</td>
                  <td>'.$value->description.'</td>
                  <td>'.$value->material.'</td>
                  <td>'.$value->gender.'</td>
                  <td>'.$value->made_by.'</td>
                  <td>'.$value->status.'</td>
                  <td>'.$value->category.'</td>
                  <td>'.$value->type_product.'</td>
                  <td>'.$value->color.'</td>
                  <td>'.$value->size.'</td>
                  <td>'.$value->quantity.'</td>
                  <td>'.$value->url_image.'</td>
                  <td>'.$value->quantity_purchased.'</td>
                  <td><button class="btn btn-danger buttonDelete">Delete</button></td>
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
  var clickButton = false;
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

      $.ajax({
        url:'DeleteProduct.php',
        type:'post',
        data: {id:id},
        success:function(result){
            clickButton = true;
            alert(result);
            location.reload();
        }
      }) 
    })

    $("#displayTable").on('click',"tr",function(){
      var currentRow = $(this).closest("tr");
      var id=currentRow.find("td:eq(0)").text(); 

      $.ajax({
        url:"Product.php",
        type:'post',
        data: {id:id},
        success:function(result){
          if(!clickButton){
              $("#content").html(result);
          }
        }
      }) 
    })
  })
</script>
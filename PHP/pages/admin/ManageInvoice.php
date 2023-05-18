<div class="container" style="text-align:center;">
    <h5>Manage Invoice</h5>
</div>

<table class="table table-hover">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Create_date</th>
          <th scope="col">Status</th>
          <th scope="col">Sum_price</th>
          <th scope="col">Product</th>
          <th scope="col">Create_date</th>
          <th scope="col">Quantity</th>
          <th scope="col">Price</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
</table>

<div class="container" style="text-align:center;">
  <button id="Add" class="btn btn-outline-primary" value="AddProduct" name="function">Add</button> 
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
</script>

<script>
  $(document).ready(function(){
    $("#Add").click(function(){
      $.ajax({
        url:"AddProduct.php",
        success: function(result){
          $("#content").html(result);
        }
      })
    })
  })
</script>
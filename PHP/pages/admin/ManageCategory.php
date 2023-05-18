<div class="container" style="text-align:center;">
    <h5>Manage Category</h5>
</div>

<table class="table table-hover" id="displayTable">
    <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
        </tr>
      </thead>
      <tbody>
        <?php
          require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/connect_database.php');
          require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/category/category.php');
          require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/category/list_category.php');

          $list = new ListCategory();
          $list->getAll();

          foreach ($list->listCategory as $value) {
            echo '<tr>
                  <td>'.$value->id.' </td>
                  <td>'.$value->name.'</td>
                  <td><button class="btn btn-danger buttonDelete" data-target="#modelConfirm" data-toggle="modal">Delete</button></td>
                  </tr>';
          }
        ?>
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
        url:"Category.php",
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
          data: {id:id,mode:"Category"},
          success:function(result){
              $("#content").load("ManageCategory.php");
          }
        }) 
      }
    })

  })
</script>
<div class="container" style="text-align:center;">
    <h5>Manage Group Role</h5>
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
          require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/group_role/group_role.php');
          require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/group_role/list_groupRole.php');

          $list = new ListGroupRole();
          $list->getAllGroupRole();
          
          foreach ($list->listGroupRole as $value) {
            echo '<tr>
                  <td>'.$value->id.'</td>
                  <td style="min-width:300px;">'.$value->name.'</td>
                  <td><button class="btn btn-warning buttonEdit">Edit</button></td>
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
        url:"GroupRole.php",
        data: {id:""},
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
          data: {id:id,
                 mode:"GroupRole"},
          success:function(result){
              alert(result);
              $("#content").load("ManageGroupRole.php");
          }
        }) 
      }
    })

    $("#displayTable").on('click',".buttonEdit",function(){
      var currentRow = $(this).closest("tr");
      var id=currentRow.find("td:eq(0)").text(); 

      $.ajax({ 
        url:'GroupRole.php',
        type:'post',
        data: {id:id},
        success:function(result){
          $("#content").html(result);
        }
      }) 
    })
  })
</script>
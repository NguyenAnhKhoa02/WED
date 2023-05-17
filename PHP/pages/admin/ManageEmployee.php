<div class="container" style="text-align:center;">
    <h5>Manage Customer</h5>
</div>

<table class="table table-hover" id="displayTable">
    <thead>
        <tr>
          <th scope="col">ID_Employee</th>
          <th scope="col">username</th>
          <th scope="col">password</th>
          <th scope="col">Name</th>
          <th scope="col">Gender</th>
          <th scope="col">Birthday</th>
          <th scope="col">Phone</th>
          <th scope="col">Address</th>
          <th scope="col">NameRole</th>
        </tr>
      </thead>
      <tbody>
          <?php
              require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/connect_database.php');
              require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/customer/customer.php');
              require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/customer/list_customer.php');
              $listCustomer = new ListCustomer();

              $listCustomer->getAll("empl");
              foreach ($listCustomer->listCustomer as $value) {
                echo "<tr>
                      <td>".$value->id_customer."</td>
                      <td>".$value->username."</td>
                      <td>".$value->password."</td>
                      <td>".$value->name."</td>
                      <td>".$value->gender."</td>
                      <td>".$value->birthday."</td>
                      <td>".$value->phone."</td>
                      <td>".$value->address."</td>
                      <td>".$value->nameRole."</td>
                      <td><button class=\"btn btn-warning buttonEdit\">Edit</button></td>
                      <td><button class=\"btn btn-danger buttonDelete\">Delete</button></td>
                      </tr>";
              }
          ?>
      </tbody>
</table>

<div class="container" style="text-align:center;">
  <button id="Add" class="btn btn-outline-primary" value="AddEmployee" name="function">Add</button> 
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
</script>

<script>
  $(document).ready(function(){
    $("#Add").click(function(){
      $.ajax({
        url:"Employee.php",
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
          data: {id:id,mode:"Customer"},
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
          url:'Employee.php',
          type:'post',
          data:{id:id},
          success:function(result){
              $("#content").html(result);
          }
        })
    })
  })
</script>
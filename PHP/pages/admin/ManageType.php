<div class="container" style="text-align:center;">
    <h5>Manage Type</h5>
</div>

<table class="table table-hover">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
        </tr>
      </thead>
      <tbody>
        <?php
          require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/connect_database.php');
          require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/type/type.php');
          require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/type/list_type.php');

          $list = new ListType();
          $list->getAll();

          foreach ($list->listType as $value) {
            echo '<tr>
                  <th scope="row">'.$value->id.'
                  <td>'.$value->name.'</td>
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
        url:"Type.php",
        success: function(result){
          $("#content").html(result);
        }
      })
    })
  })
</script>
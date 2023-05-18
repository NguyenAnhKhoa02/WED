<div class="container" style="text-align:center;">
    <h5>Manage Order</h5>
</div>

<?php
  session_start();
  require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/connect_database.php");
  require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/order/order.php");
  require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/order/list_order.php");
  $listOrder = new ListOrder();

  $listOrder->DataForTableMangeOrderAdmin();
?>

<table class="table table-hover" id="displayTable">
    <thead>
        <tr>
          <th scope="col">id_order</th>
          <th scope="col">id_customer</th>
          <th scope="col">Create date</th>
          <th scope="col">Recieve date</th>
          <th scope="col">Sum price</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($listOrder->listOrder as $key => $value) {
            echo "
              <tr>
              <td>$value->id</td>
              <td>$value->idCustomer</td>
              <td>$value->createDate</td>
              <td>$value->receiveDate</td>
              <td>$value->sumprice</td>
              <td>$value->status</td>
              </tr>
            ";
          }
        ?>
      </tbody>
</table>

<!-- <div class="container" style="text-align:center;">
  <button id="Add" class="btn btn-outline-primary" value="AddProduct" name="function">Add</button> 
</div> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
</script>

<script>
  $(document).ready(function(){

    $(document).ready(function(){
        $("#displayTable").on('click',"tr",function(){
          var currentRow = $(this).closest("tr");
          var idOrder=currentRow.find("td:eq(0)").text(); 
          var idCustomer=currentRow.find("td:eq(1)").text(); 

          $.ajax({
            url:'Order.php',
            type:'post',
            data:{idOrder:idOrder,
                  idCustomer:idCustomer},
            success: function(result){
              $("#content").html(result);
            }
          })

        })

      })

  })
</script>
<div class="container" style="text-align:center;">
    <h5>Manage Account</h5>
</div>

<?php
    session_start();
    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/connect_database.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/order/order.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/order/list_order.php");
    $listOrder = new ListOrder();

    $listOrder->DataForTableMangeOrder();
?>

<table class="table table-hover" id="displayTable">
    <thead>
        <tr>
          <th scope="col">IdOrder</th>
          <th scope="col">IdInvoice</th>
          <th scope="col">CreateDate</th>
          <th scope="col">RecieveDate</th>
          <th scope="col">Total</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($listOrder->listOrder as $key => $value) {
            echo"
              <tr>
              <td>$value->id</td>
              <td>$value->idInvoice</td>
              <td>$value->createDate</td>
              <td>$value->receiveDate</td>
              <td>$value->sumprice</td>
              <td>$value->status</td>
              </tr>
            ";
          }
        ?>
      </tbody>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
    </script>

    <script>
      $(document).ready(function(){
        $("#displayTable").on('click',"tr",function(){
          var currentRow = $(this).closest("tr");
          var idOrder=currentRow.find("td:eq(0)").text(); 
          var idInvoice=currentRow.find("td:eq(1)").text(); 

          $.ajax({
            url:'OrderShow.php',
            type:'post',
            data:{idOrder:idOrder,
                  idInvoice:idInvoice},
            success: function(result){
              $("#content").html(result);
            }
          })

        })

      })
    </script>
</table>
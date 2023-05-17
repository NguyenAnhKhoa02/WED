<?php
    session_start();

    require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/connect_database.php');
    require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/customer/customer.php');
    require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/customer/list_customer.php');
    $listCustomer = new ListCustomer();

    $customer = $listCustomer->GetDataFromId($_SESSION["idCustomer"]);
?>

<div class="row">
<div class="col-md-4">
        <label for="" class="form-label">ID: <?php echo $_SESSION["idCustomer"]?></label>
    </div>

    <div class="col-md-4">
        <label for="" class="form-label">Birthday: <?php echo $customer->birthday?></label>
    </div>

    <div class="col-md-4">
        <label for="" class="col-md-4">Gender: <?php echo $customer->gender?></label>
    </div>
</div>

<div class="row">
    <div class="mb-3">
      <label for="" class="form-label">Name</label>
      <input type="text" class="form-control" name="" id="name" aria-describedby="helpId" placeholder="" value=<?php echo $customer->name?>>
    </div>
</div>

<div class="row">
    <div class="mb-3">
      <label for="" class="form-label">Address</label>
      <input type="text" class="form-control" name="" id="address" aria-describedby="helpId" placeholder="" value=<?php echo $customer->address?>>
    </div>
</div>

<div class="row">
    <div class="mb-3">
      <label for="" class="form-label">Phone</label>
      <input type="text" class="form-control" name="" id="phone" aria-describedby="helpId" placeholder="" value=<?php echo $customer->phone?>>
    </div>
</div>

<div class="row" style="text-align:center;">
    <form action="" method="post">
        <input name="" id="update" class="btn btn-primary" type="button" value="Update" style="width:10%;">
    </form>
</div>

<script>
    function check_phone(){
        var val = document.getElementById("phone").value
        var isPhone = /^0\d{9}$/

        if(isPhone.test(val)){
            return true
        }else{
          return false
        }
  }
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
</script>

<script>
    $(document).ready(function(){
        $("#update").click(function(){
            try {
                var name = $("#name").val();
                var address = $("#address").val();
                var phone = $("#phone").val(); 
                
                if(name == "") throw "name + Please enter your name";
                if(address == "") throw "address + Please enter your address";
                if(!check_phone()) throw "phone + Your phone is wrong!";

                $.ajax({
                    url:'Update.php',
                    type:"post",
                    data:{name:name,
                          address:address,
                          phone:phone},
                    success: function(result){
                        console.log(result);
                        if(result.split("+")[0].trim() == "false"){
                            $("#" + result.split("+")[1].trim()).focus();
                            alert(result.split("+")[2]);
                        }else{
                          alert("Update successful!")
                          $('body').load("customer.php");
                        }
                    }
                })

            } catch (error) {
                idError = "#" + error.split("+")[0];
                messageError = error.split("+")[1];

                $(idError).focus();
                alert(messageError);
            }
        })
    })
</script>
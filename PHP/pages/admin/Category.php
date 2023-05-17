<?php
    require($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/connect_database.php');
?>

<div class="row">
    <div class="col-md-12">
        <label for="" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-label" style="width:100%;">
    </div>
</div>

<div class="container" style="text-align:center; margin-top:10px;">
    <form method="post">
        <input id="AddNew" type="submit" class="btn btn-outline-primary" >
    </form>
    <!-- <button id="AddNew" class="btn btn-outline-primary" value="AddProduct" name="function">AddNew</button>  -->
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
</script>
    
<script>
    $(document).ready(function(){
        $("#AddNew").click(function(e){
            e.preventDefault();
            try {
                var name = $('#name').val();
                if(name == "") throw "name + Please enter the name!";

                $.ajax({
                    url: 'Add.php',
                    type: 'post',
                    data: {name:name,
                           mode:"Category"},
                    success: function(dataResult){
                        // if(dataResult.split("+")[0].trim() == "false"){
                        //     $("#" + dataResult.split("+")[1].trim()).focus();
                        //     alert(dataResult.split("+")[2]);
                        // }else{
                        //     alert(dataResult);
                        //     $('#content').load("ManageCategory.php");
                        // }
                        console.log(dataResult);
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
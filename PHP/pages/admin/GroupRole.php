<?php
    if(isset($_POST["id"])){
        $id = $_POST["id"];
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/connect_database.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/group_role/group_role.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/group_role/list_groupRole.php");
        $listGroupRole = new ListGroupRole();
    
        $listGroupRole->GetGroupRoleByID($id);
    }
?>

<div class="row">
    <label class="form-label">Name</label>
    <?php
        if(isset($_POST["id"])){
            echo "<input type=\"text\" class=\"form-label\" id=\"name\" value=".$listGroupRole->nameGroupRole.">";
        } else{
            echo "<input type=\"text\" class=\"form-label\" id=\"name\">";
        }
    ?>
</div>

<div class="row">
    <p>Customer</p>
    <div class="col-md-3 form-check">
        <?php
            if(isset($_POST["id"]))
                if(in_array("Cart",$listGroupRole->listNameRole))
                    echo "<input class=\"form-check-input\" type=\"checkbox\" value=\"Cart\" checked>";
                else echo "<input type=\"checkbox\" value=\"Cart\" class=\"form-check-input\">";
            else echo "<input type=\"checkbox\" value=\"Cart\" class=\"form-check-input\">";
        ?>
        <label class="form-check-label" for="">Cart</label>
    </div>

    <div class="col-md-3 form-check">
        <?php
            if(isset($_POST["id"]))
                if(in_array("Order",$listGroupRole->listNameRole))
                    echo "<input class=\"form-check-input\" type=\"checkbox\" value=\"Order\" checked>";
                else echo "<input type=\"checkbox\" value=\"Order\" class=\"form-check-input\">";
            else echo "<input type=\"checkbox\" value=\"Order\" class=\"form-check-input\">";
        ?>
        <label class="form-check-label" for="">Order</label>
    </div>
</div>

<div class="row">
    <p>Customer/Admin</p>
    <div class="col-md-3 form-check">
        <?php
            if(isset($_POST["id"]))
                if(in_array("ManageProduction",$listGroupRole->listNameRole))
                    echo "<input class=\"form-check-input\" type=\"checkbox\" value=\"ManageProduction\" checked>";
                else echo "<input type=\"checkbox\" value=\"ManageProduction\" class=\"form-check-input\">";
            else echo "<input type=\"checkbox\" value=\"ManageProduction\" class=\"form-check-input\">";
        ?>
        <!-- <input type="checkbox" id="ManageProduction" class="form-check-put"> -->
        <label class="form-check-label" for="">Manage Production</label>
    </div>

    <div class="col-md-3 form-check">
        <?php
            if(isset($_POST["id"]))
                if(in_array("ManageCategory",$listGroupRole->listNameRole))
                    echo "<input class=\"form-check-input\" type=\"checkbox\" value=\"ManageCategory\" checked>";
                else echo "<input type=\"checkbox\" value=\"ManageCategory\" class=\"form-check-input\">";
            else echo "<input type=\"checkbox\" value=\"ManageCategory\" class=\"form-check-input\">";
        ?>
        <label class="form-check-label" for="">Manage Category</label>
    </div>

    <div class="col-md-3 form-check">
        <?php
            if(isset($_POST["id"]))
                if(in_array("ManageType",$listGroupRole->listNameRole))
                    echo "<input class=\"form-check-input\" type=\"checkbox\" value=\"ManageType\" checked>";
                else echo "<input type=\"checkbox\" value=\"ManageType\" class=\"form-check-input\">";
            else echo "<input type=\"checkbox\" value=\"ManageType\" class=\"form-check-input\">";
        ?>
        <label class="form-check-label" for="">Manage Type</label>
    </div>

    <div class="col-md-3 form-check">
        <?php
            if(isset($_POST["id"]))
                if(in_array("ManageInvoice",$listGroupRole->listNameRole))
                    echo "<input class=\"form-check-input\" type=\"checkbox\" value=\"ManageInvoice\" checked>";
                else echo "<input type=\"checkbox\" value=\"ManageInvoice\" class=\"form-check-input\">";
            else echo "<input type=\"checkbox\" value=\"ManageInvoice\" class=\"form-check-input\">";
        ?>
        <label class="form-check-label" for="">Manage Invoice</label>
    </div>
</div>

<div class="row">
    <div class="col-md-3 form-check">
        <?php
            if(isset($_POST["id"]))
                if(in_array("ManageCustomer",$listGroupRole->listNameRole))
                    echo "<input class=\"form-check-input\" type=\"checkbox\" value=\"ManageCustomer\" checked>";
                else echo "<input type=\"checkbox\" value=\"ManageCustomer\" class=\"form-check-input\">";
            else echo "<input type=\"checkbox\" value=\"ManageCustomer\" class=\"form-check-input\">";
        ?>
        <label class="form-check-label" for="">Manage Customer</label>
    </div>

    <div class="col-md-3 form-check">
        <?php
            if(isset($_POST["id"]))
                if(in_array("ManageAccount",$listGroupRole->listNameRole))
                    echo "<input class=\"form-check-input\" type=\"checkbox\" value=\"ManageAccount\" checked>";
                else echo "<input type=\"checkbox\" value=\"ManageAccount\" class=\"form-check-input\">";
            else echo "<input type=\"checkbox\" value=\"ManageAccount\" class=\"form-check-input\">";
        ?>
        <label class="form-check-label" for="">Manage Account</label>
    </div>

    <div class="col-md-3 form-check">
        <?php
            if(isset($_POST["id"]))
                if(in_array("ManageGroupRole",$listGroupRole->listNameRole))
                    echo "<input class=\"form-check-input\" type=\"checkbox\" value=\"ManageGroupRole\" checked>";
                else echo "<input type=\"checkbox\" value=\"ManageGroupRole\" class=\"form-check-input\">";
            else echo "<input type=\"checkbox\" value=\"ManageGroupRole\" class=\"form-check-input\">";
        ?>
        <label class="form-check-label" for="">Manage GroupRole</label>
    </div>

    <div class="col-md-3 form-check">
        <?php
            if(isset($_POST["id"]))
                if(in_array("ManageOrder",$listGroupRole->listNameRole))
                    echo "<input class=\"form-check-input\" type=\"checkbox\" value=\"ManageOrder\" checked>";
                else echo "<input type=\"checkbox\" value=\"ManageOrder\" class=\"form-check-input\">";
            else echo "<input type=\"checkbox\" value=\"ManageOrder\" class=\"form-check-input\">";
        ?>
        <label class="form-check-label" for="">Manage Order</label>
    </div>
</div>

<div class="row">
    <div class="col-md-3 form-check">
        <?php
            if(isset($_POST["id"]))
                if(in_array("ManageEmployee",$listGroupRole->listNameRole))
                    echo "<input class=\"form-check-input\" type=\"checkbox\" value=\"ManageEmployee\" checked>";
                else echo "<input type=\"checkbox\" value=\"ManageEmployee\" class=\"form-check-input\">";
            else echo "<input type=\"checkbox\" value=\"ManageEmployee\" class=\"form-check-input\">";
        ?>
        <label class="form-check-label" for="">Manage Employee</label>
    </div>
</div>

<div class="row" style="text-align:center; margin-top:10px;">
    <?php
        if(isset($_POST["id"])){
            echo '<form action="" method="post">
                    <input type="submit" class="btn btn-outline-primary" id="Update" value="Update">
                  </form>';
        }else{
            echo '<form action="" method="post">
                    <input type="submit" class="btn btn-outline-primary" id="Add" value="Add">
                  </form>';
        }
    ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
</script>

<script>
    $(document).ready(function(){

        $("#Add").click(function(e) {
            e.preventDefault();
            try {
                var name = $("#name").val();
                var arr_checkval = [];
                $(":checked").each(function(){
                    var ischecked = $(this).is(":checked");
                    if (ischecked) {
                        arr_checkval.push($(this).val());
                    }
                })  
                
                if(name == "") throw"name + Please enter name group!";
                if(arr_checkval.length == 0) throw "none + You must choose role for this group!";

                var formData = new FormData();
                formData.append('name',name);
                formData.append('arr_checkval',arr_checkval);
                formData.append('mode',"GroupRole");

                $.ajax({
                    url:"Add.php",
                    data: formData,
                    type:"post",
                    processData:false,
                    contentType:false,
                    success: function(result){
                        if(result.split("+")[0].trim() == "false"){
                            if(result.split("+")[1].trim() != "none")
                                $(result.split("+")[1].trim()).focus();
                                alert(result.split("+")[2].trim());
                        }else{
                            alert(result);
                            $("#content").load("ManageGroupRole.php"); 
                        }
                    }
                })
                
            } catch (error) {
                idError = "#" + error.split("+")[0];
                messageError = error.split("+")[1];

                if(idError != "none")
                    $(idError).focus();
                alert(messageError);
            }
        })

        $("#Update").click(function(e){
            e.preventDefault();

            try {
                var id = "<?php if(isset($_POST["id"])) echo $id?>"
                var name = $("#name").val();
                var arr_checkval = [];
                $(":checked").each(function(){
                    var ischecked = $(this).is(":checked");
                    if (ischecked) {
                        arr_checkval.push($(this).val());
                    }
                })

                if(name == "") throw"name + Please enter name group!";
                if(arr_checkval.length == 0) throw "none + You must choose role for this group!";

                var formData = new FormData();
                formData.append('id',id);
                formData.append('name',name);
                formData.append('arr_checkval',arr_checkval);
                formData.append('mode',"GroupRole");
                
                $.ajax({
                    url:"Update.php",
                    data:formData,
                    type:"post",
                    processData:false,
                    contentType:false,
                    success: function(result){
                        if(result.split("+")[0].trim() == "false"){
                            $(result.split("+")[1].trim()).focus();
                            alert(result.split("+")[2].trim());
                        }else{
                            alert(result);
                            $("#content").load("ManageGroupRole.php"); 
                        }
                    }
                })
            } catch (error) {
                idError = "#" + error.split("+")[0];
                messageError = error.split("+")[1];

                if(idError != "none")
                    $(idError).focus();
                alert(messageError);
            }
        })

    })
</script>
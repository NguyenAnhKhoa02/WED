<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/connect_database.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/group_role/group_role.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/group_role/list_groupRole.php");
    $listGroupRole = new ListGroupRole();
    $listGroupRole->getAllGroupRole();

    if(isset($_POST["id"])){
        $idEmployee = $_POST["id"];

        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/customer/customer.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/PHP/classes/customer/list_customer.php");
        $listCustomer = new ListCustomer();

        $listCustomer->GetAllFromID($idEmployee);
        $employee = $listCustomer->listCustomer[0];
    }else{
        $idEmployee = uniqid("empl",false);
    }
?>

<div class="mb-3">
    ID: <?php echo $idEmployee;?>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="" class="form-label">Username</label>
             <input type="text"
                class="" name="" id="username" aria-describedby="helpId" placeholder="" 
                value=<?php if(isset($_POST["id"])) echo $employee->username." disabled"; else echo $idEmployee." disabled";?>>
    
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="autoUsedID" <?php if(!isset($_POST["id"])) echo "checked"; else echo "disabled";?>>
                <label class="form-check-label" for="">Auto use ID</label>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="" class="form-label">Passoword</label>
             <input type="text"
                class="" name="" id="password" aria-describedby="helpId" placeholder=""
                value=<?php if(isset($_POST["id"])) echo $employee->password;?>>
        </div>
    </div>
</div>

<div class="row">
    <div class="mb-3">
      <label for="" class="form-label">Name</label>
      <input type="text"
        class="form-control" name="" id="name" aria-describedby="helpId" placeholder=""
        value=<?php if(isset($_POST["id"])) echo $employee->name;?>>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <label for="" class="form-label">Birthday</label>
        <?php
            if(isset($_POST["id"]))
                echo $employee->birthday;
            else
                echo '<input type="date" name="" id="birthday">';
        ?>
    </div>

    <div class="col-md-3">
    <label for="" class="form-label">Gender</label>
        <?php
            if(isset($_POST["id"]))
                echo '<p>'.$employee->gender.'</p>';
            else 
                echo '<select name="" id="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                      </select>';
        ?>
    </div>

    <div class="col-md-3">
        <label for="" class="form-label">Phone</label>
        <input type="text"
                class="" name="" id="phone" aria-describedby="helpId" placeholder="" style="width:60%;"
                value=<?php echo $retVal = (isset($_POST["id"])) ? $employee->phone : "" ;?>>
    </div>

    <div class="col-md-3">
        <label for="" class="form-label">GroupRole</label>
            <select name="" id="grouprole">;
                <?php
                    foreach ($listGroupRole->listGroupRole as $key => $value) {
                        if(isset($_POST["id"]))
                            echo $retVal = ($employee->nameRole == $value) ? "<option value=".$value->name." selected>".$value->name."</option>"  : "<option value=".$value->name.">".$value->name."</option>";
                        else
                            echo "<option value=".$value->name.">".$value->name."</option>";
                    }
                ?>
            </select>
    </div>
</div>

<div class="row">
    <div class="mb-3">
      <label for="" class="form-label">Address</label>
      <input type="text"
        class="form-control" name="" id="address" aria-describedby="helpId" placeholder=""
        value=<?php  echo $retVal = (isset($_POST["id"])) ? $employee->address : "" ;?>>
    </div>
</div>

<div class="row" style="text-align:center;">
    <form action="" method="post">
        <?php
            if (isset($_POST["id"])) {
                echo '<button type="submit" class="btn btn-outline-primary" style="width:10%;" id="btnUpdate">Update</button>';
            } else {
                echo '<button type="submit" class="btn btn-outline-primary" style="width:10%;" id="btnCreate">Create</button>';
            }
            
        ?>

        
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

        $("input[type=\"checkbox\"]").click(function(){
            if($("#autoUsedID").prop("checked")){
                $("#username").val("<?php echo $idEmployee?>")
                $("#username").prop('disabled', true);
            }else{
                $("#username").val("")
                $("#username").prop('disabled', false);
            }
        })

        $("#btnCreate").click(function(e){
            e.preventDefault();
            try {
                var id = "<?php echo $idEmployee;?>"
                var username = $("#username").val();
                var password = $("#password").val();
                var name = $("#name").val();
                var birthday = $("#birthday").val();
                var gender = $("#gender").val();
                var phone = $("#phone").val();
                var address = $("#address").val();   
                var groupRole = $("#grouprole").val();

                if(username == "") throw "username + Please enter your user name!";
                if(username.indexOf(" ") >= 0) throw "username + Username musn't have whitespace!"
                if(password == "") throw "password + Please enter your password!";
                if(name == "") throw "name + Please enter your name";
                if(birthday == "") throw "birthday + Please choose your birthday!";
                if(phone == "") throw "phone + Pleas enter your phone!";
                if(check_phone() == false) throw "phone + Your phone is wrong!";
                if(address == "") throw "address + Pleas enter your address!";

                formData = new FormData();
                formData.append('mode',"Employee");
                formData.append("id",id); 
                formData.append("username",username);
                formData.append("password",password);
                formData.append("name",name);
                formData.append("birthday",birthday);
                formData.append("gender",gender);
                formData.append("phone",phone);
                formData.append("address",address);
                formData.append("grouprole",groupRole);

                $.ajax({
                    url: "Add.php",
                    data: formData,
                    processData: false,
                    type: "post",
                    contentType: false,
                    success: function(result){
                        console.log(result);
                        if(result.split("+")[0].trim() == "false"){
                            $("#" + result.split("+")[1].trim()).focus();
                            alert(result.split("+")[2]);
                        }else{
                            alert(result);
                            $('#content').load("ManageEmployee.php");
                        }
                    }
                })

            } catch (error) {
                console.log(error);
                idError = "#" + error.split("+")[0];
                messageError = error.split("+")[1];

                $(idError).focus();
                alert(messageError);
            }
        })

        $("#btnUpdate").click(function(e){
            e.preventDefault();
            try {
                var id = "<?php echo $idEmployee;?>"
                var username = $("#username").val();
                var password = $("#password").val();
                var name = $("#name").val();
                var birthday = $("#birthday").val();
                var gender = $("#gender").val();
                var phone = $("#phone").val();
                var address = $("#address").val();   
                var groupRole = $("#grouprole").val();

                if(username == "") throw "username + Please enter your user name!";
                if(username.indexOf(" ") >= 0) throw "username + Username musn't have whitespace!"
                if(password == "") throw "password + Please enter your password!";
                if(name == "") throw "name + Please enter your name";
                if(birthday == "") throw "birthday + Please choose your birthday!";
                if(phone == "") throw "phone + Pleas enter your phone!";
                if(check_phone() == false) throw "phone + Your phone is wrong!";
                if(address == "") throw "address + Pleas enter your address!";

                formData = new FormData();
                formData.append('mode',"Employee");
                formData.append("id",id); 
                formData.append("username",username);
                formData.append("password",password);
                formData.append("name",name);
                formData.append("birthday",birthday);
                formData.append("gender",gender);
                formData.append("phone",phone);
                formData.append("address",address);
                formData.append("grouprole",groupRole);

                $.ajax({
                    url: "Update.php",
                    data: formData,
                    processData: false,
                    type: "post",
                    contentType: false,
                    success: function(result){
                        if(result.split("+")[0].trim() == "false"){
                            $("#" + result.split("+")[1].trim()).focus();
                            alert(result.split("+")[2]);
                        }else{
                            alert(result);
                            $('#content').load("ManageEmployee.php");
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
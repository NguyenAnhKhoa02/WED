<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CRoboto" rel="stylesheet">
  <meta http-equiv="x-ua-compatible" content="IE=edge, chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" href="mg/nezuko cut.jpg"  type="image/png">
  <title>Avenue Fashion</title>
  <link href="styles/bootstrap.min.css" rel="stylesheet">
  <link href="styles/backend.css" rel="stylesheet">
  <link href="styles/login_register.css" rel="stylesheet">

  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <div class="box" ><!-- box Starts -->

  <div class="box-header" ><!-- box-header Starts -->

    <!-- MAIN -->
    <main>
      <!-- HERO -->
      <div class="nero">
        <div class="nero__heading">
          <span class="nero__bold">Checkout</span>
        </div>
        <p class="nero__text">
        </p>
      </div>
    </main>


    <center> 


    <h1>Login</h1>

    <p class="lead" >Customer</p>


    </center>

    <p class="text-muted" >
        Chào mừng đến với bình nguyên vô tận :_
    </p>

  </div><!-- box-header Ends -->

    <div class="form-group" ><!-- form-group Starts -->
      <label>UserName</label>
      <input type="text" class="form-control" name="c_username" required id="c_username">
    </div><!-- form-group Ends -->
    <div class="form-group" ><!-- form-group Starts -->
      <label>Password</label>
      <input type="password" class="form-control" name="c_pass" required id="c_password">
      <h4 align="center">
        <a href="forgot_pass.php"> Forgot Password </a>
      </h4>
    </div><!-- form-group Ends -->

    <div class="text-center" ><!-- text-center Starts -->
      <form action="" method="post"></form>
        <button name="login" value="Login" class="btn btn-primary" id="btn_login">
          <i class="fa fa-sign-in" ></i> Log in
        </button>
      </form>
    </div><!-- text-center Ends -->

  <center><!-- center Starts -->
    <a href="customer_register.php" >

    <h3>New ? Register Here</h3>

    </a>
  </center><!-- center Ends -->

</div><!-- box Ends -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
</script>

<script>
  $(document).ready(function(){
    $("#btn_login").click(function(e){
      try {
        var username = $("#c_username").val();
        var password = $("#c_password").val();

        if(username == "") throw "c_username + Please enter your username!";
        if(password == "") throw "c_password + Please enter your password!";
        if(username.indexOf(" ") >= 0) throw "c_username + Username musn't have whitespace!";
        if(password.indexOf(" ") >= 0) throw "c_password + Password musn't have whitespace!";

        $.ajax({
          url:"Login.php",
          type:"post",
          data: {username:username,
                 password:password},
          success: function(result){
            console.log(result);
            if(result.split("+")[0].trim() == "false"){
              $("#" + result.split("+")[1].trim()).focus();
              alert(result.split("+")[2]);
            }else{
              window.location.href = "http://localhost/PHP/index.php";
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
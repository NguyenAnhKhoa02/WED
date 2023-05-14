<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CRoboto" rel="stylesheet"> 
  <meta http-equiv="x-ua-compatible" content="IE=edge, chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" href="//cdn.shopify.com/s/files/1/2484/9148/files/SDQSDSQ_32x32.png?v=1511436147" type="image/png">
  <title>Avenue Fashion</title>
  <link href="styles/bootstrap.min.css" rel="stylesheet">
  <link href="styles/backend.css" rel="stylesheet">
  <link href="styles/style.css" rel="stylesheet">

  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <script src="js/jquery.min.js"> </script>
  <script src="js/bootstrap.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment-with-locales.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
  <script src="https://rawgit.com/tempusdominus/bootstrap-4/master/build/js/tempusdominus-bootstrap-4.js"></script>
  <link href="https://rawgit.com/tempusdominus/bootstrap-4/master/build/css/tempusdominus-bootstrap-4.css" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/> -->


  <!-- MAIN -->
  <main>
    <!-- HERO -->
    <div class="nero">
      <div class="nero__heading">
        <span class="nero__bold">REGISTER</span>
      </div>
      <p class="nero__text">
      </p>
    </div>
  </main>


<div id="content" ><!-- content Starts -->
  <div class="container" ><!-- container Starts -->

    <div class="col-md-12" ><!-- col-md-12 Starts -->

      <div class="box" ><!-- box Starts -->

        <div class="box-header" ><!-- box-header Starts -->

          <center><!-- center Starts -->

            <h2> Create a new account </h2>

          </center><!-- center Ends -->

        </div><!-- box-header Ends -->

        <form method="post" enctype="multipart/form-data" ><!--form Starts-->

          <div class="form-group" ><!-- form-group Starts -->

            <label>User Name</label>

            <input type="text" class="form-control" name="c_user" id="c_user" required>

          </div><!-- form-group Ends -->

          <div class="form-group"><!-- form-group Starts -->

            <label> Customer Password </label>

            <div class="input-group"><!-- input-group Starts -->

              <span class="input-group-addon"><!-- input-group-addon Starts -->

                <i class="fa fa-check tick1"> </i>

                <i class="fa fa-times cross1"> </i>

              </span><!-- input-group-addon Ends -->

              <input type="password" class="form-control" id="pass" name="c_pass" required>

              <span class="input-group-addon"><!-- input-group-addon Starts -->

              <div id="meter_wrapper"><!-- meter_wrapper Starts -->

                <span id="pass_type"> </span>

                <div id="meter"> </div>

              </div><!-- meter_wrapper Ends -->

              </span><!-- input-group-addon Ends -->

            </div><!-- input-group Ends -->

          </div><!-- form-group Ends -->


          <div class="form-group"><!-- form-group Starts -->

            <label> Confirm Password </label>

            <div class="input-group"><!-- input-group Starts -->
              <span class="input-group-addon"><!-- input-group-addon Starts -->
                <i class="fa fa-check tick2"> </i>
                <i class="fa fa-times cross2"> </i>
              </span><!-- input-group-addon Ends -->
              <input type="password" class="form-control confirm" id="con_pass" required>
            </div><!-- input-group Ends -->

          </div><!-- form-group Ends -->

          <div class="form-group">
            <input type="checkbox" class="form-check-input" id="revealPass">
            <label class="form-check-label" for="revealPass">Show password</label>
          </div>

          <div class="form-group"><!-- form-group Starts -->

            <label> Customer Name </label>

            <input type="text" class="form-control" name="c_name" id="c_name" required>

          </div><!-- form-group Ends -->



          <div class="form-group"><!-- form-group Starts -->

            <label> Customer Gender </label>

            <!-- <input type="text" class="form-control" name="c_gender  " required> -->
            <select class="form-control" name="c_gender" id="c_gender" required>
              <option value="Nothing">None</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Other">Other</option>
            </select>

          </div><!-- form-group Ends -->

          <div class="form-group"><!-- form-group Starts -->

            <label> Customer Birthday</label>

            <div class="input-group"><!-- input-group Starts -->
              <input type="date" class="form-control birthday" id="birthday" name="c_birthday" data-date-format="DD MMMM YYYY" required>

            </div><!-- input-group Ends -->
          </div><!-- form-group Ends -->

          <div class="form-group"><!-- form-group Starts -->

            <label> Customer Address </label>

            <input type="text" class="form-control" name="c_address" id="c_address" required>

          </div><!-- form-group Ends -->

          <div class="form-group"><!-- form-group Starts -->

            <label> Customer Phone</label>
            <div class="input-group"><!-- input-group Starts -->

              <span class="input-group-addon"><!-- input-group-addon Starts -->

                <i class="fa fa-check tick4"> </i>

                <i class="fa fa-times cross4"> </i>

              </span><!-- input-group-addon Ends -->
              <input type="text" class="form-control phone" id="phone" name="c_phone" required>

                </div>
            </div><!-- input-group Ends -->

          </div><!-- form-group Ends -->

          <div class="text-center"><!-- text-center Starts -->
              <button type="submit" class="btn btn-primary" id="register">
              <i class="fa fa-user-md"></i> Register

            </button>

          </div><!-- text-center Ends -->

        </form><!--form Ends-->
        <center><!-- center Starts -->

          <a href="customer_login.php" >

          <h3>Login Now</h3>

          </a>


        </center><!-- center Ends -->

      </div><!-- box Ends -->

    </div><!-- col-md-12 Ends -->

  </div><!-- container Ends -->
</div><!-- content Ends -->



<?php
/*

include("includes/footer.php");
*/  
?>

<script>

  $(document).ready(function(){

    $('.tick1').hide();
    $('.cross1').hide();

    $('.tick2').hide();
    $('.cross2').hide();

    $('.tick3').hide()
    $('.cross3').hide()

    $('.tick4').hide()
    $('.cross4').hide()

    $('.tick5').hide()
    $('.cross5').hide()

    $('.confirm').focusout(function(){
    
      var password = $('#pass').val();
      
      var confirmPassword = $('#con_pass').val();

      if(password == confirmPassword){

        $('.tick1').show();
        $('.cross1').hide();

        $('.tick2').show();
        $('.cross2').hide();

      }
      else{

        $('.tick1').hide();
        $('.cross1').show();

        $('.tick2').hide();
        $('.cross2').show();
      } 
    });

    $('#revealPass').click(function(e){
      var passBox = document.getElementById("pass");
      var confirmPassBox = document.getElementById("con_pass");
      if(passBox.type == "password"){
        passBox.type = "text";
        confirmPassBox.type = "text";
      }else{
        passBox.type = "password";
        confirmPassBox.type = "password";
      }
    })

  });
</script>

<script>

  $(document).ready(function(){

    $("#pass").keyup(function(){
      check_pass();
    });

<<<<<<< Updated upstream
check_pass();

});
$("#email").keyup(function(){
  check_email()
})
$("#phone").keyup(function(){
  check_phone()
})
$("#birthday").keyup(function(){
  check_birthday()
})
});
//check mail 
function check_email(){
  var val=document.getElementById("email").value
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/

      $('.email').focusout(function(){
        if (filter.test(val)){
          $('.tick3').show()
          $('.cross3').hide()
        } else{
          $('.tick3').hide()
          $('.cross3').show()
        }
    
  })
  
}

function check_phone(){
  var val = document.getElementById("phone").value
  var filter = /^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/

    $('.phone').focusout(function(){
        if(filter.test(val)){
          $('.tick4').show()
          $('.cross4').hide()
        } else{
          $('.tick4').hide()
          $('.cross4').show()
        }
=======
    $("#phone").keyup(function(){
      check_phone()
>>>>>>> Stashed changes
    })
  });

  //check mail 
  function check_email(){
    var val=document.getElementById("email").value
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/

        $('.email').focusout(function(){
          if (filter.test(val)){
            $('.tick3').show()
            $('.cross3').hide()
          } else{
            $('.tick3').hide()
            $('.cross3').show()
          }
        
    })
  }

  function check_phone(){
    var val = document.getElementById("phone").value
    var isPhone = /^0\d{10}$/

    if(isPhone.test(val)){
        $('.tick4').show()
        $('.cross4').hide()
        return true
    }else{
      $('.tick4').hide()
      $('.cross4').show()
      return false
    }
  }

  function check_pass() {
    var val=document.getElementById("pass").value;
    var meter=document.getElementById("meter");
    var no=0;

    if(val!="")
    {
      // If the password length is less than or equal to 6
      if(val.length<=6)no=1;

      // If the password length is greater than 6 and contain any lowercase alphabet or any number or any special character
      if(val.length>6 && (val.match(/[a-z]/) || val.match(/\d+/) || val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)))no=2;

      // If the password length is greater than 6 and contain alphabet,number,special character respectively
      if(val.length>6 && ((val.match(/[a-z]/) && val.match(/\d+/)) || (val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) || (val.match(/[a-z]/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))))no=3;

      // If the password length is greater than 6 and must contain alphabets,numbers and special characters
      if(val.length>6 && val.match(/[a-z]/) && val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))no=4;

      if(no==1)
      {
        $("#meter").animate({width:'50px'},300);
        meter.style.backgroundColor="red";
        document.getElementById("pass_type").innerHTML="Very Weak";
        return "Very weak"
      }

      if(no==2)
      {
        $("#meter").animate({width:'100px'},300);
        meter.style.backgroundColor="#F5BCA9";
        document.getElementById("pass_type").innerHTML="Weak";
        return "Weak"
      }

      if(no==3)
      {
        $("#meter").animate({width:'150px'},300);
        meter.style.backgroundColor="#FF8000";
        document.getElementById("pass_type").innerHTML="Good";
      }

      if(no==4)
      {
        $("#meter").animate({width:'200px'},300);
        meter.style.backgroundColor="#00FF40";
        document.getElementById("pass_type").innerHTML="Strong";
      }
    }
    else{    
      meter.style.backgroundColor="";   
      document.getElementById("pass_type").innerHTML="";    
    }
  }
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
</script>

<script>
  $(document).ready(function(){
    $("#register").click(function(e) {
      e.preventDefault();
      try {
        var c_user = $('#c_user').val();
        var c_pass = $('#pass').val();
        var con_pass = $('#con_pass').val();
        var c_name = $('#c_name').val();
        var c_gender = $('#c_gender').val();
        var c_birthday = $('#birthday').val();
        var c_address = $('#c_address').val();
        var c_phone = $('#phone').val();

        if(c_user == "") throw "c_user + Please enter your user name!";
        if(c_pass == "") throw "pass + Please enter your password!";
        if(con_pass == "") throw "con_pass + Please confirm your password!";
        if(c_name == "") throw "c_name + Please enter your name";
        if(c_gender == "Nothing") throw "c_gender + Please choose your gender!";
        if(c_birthday == "") throw "birthday + Please choose your birthday!";
        if(c_address == "") throw "c_address + Pleas enter your address!";
        if(c_phone == "") throw "phone + Pleas enter your address!";
        if(check_pass() == "Very weak") throw "pass + Your password is so weak!";
        if(check_pass() == "Weak") throw "pass + Your password is weak!";
        if(c_pass != con_pass) throw "con_pass + Your confirm password is wrong!";

        alert("Register successful! Let's sign in to web");
        $('body').load('customer_login.php');        
      } catch (error) {
        idError = "#" + error.split("+")[0];
        messageError = error.split("+")[1];

        $(idError).focus();
        alert(messageError);
      }
    })
  })
</script>

</body>

</html>
<header>
    <nav class="navbar navbar-light bg-light navbar-expand-lg">
        <div class="container-fluid justify-content-between">
          <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#optionsNav" aria-controls="optionsNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
            <a class="navbar-brand" href="http://localhost/PHP/index.php">Logo</a>
            <div class="collapse navbar-collapse justify-content-center" id="optionsNav">
              <div class="navbar-nav">
                <a class="nav-link active" href="/PHP/pages/products/men.php">Men</a>
                <a class="nav-link active" href="/PHP/pages/products/women.php">Women</a>  
                <a class="nav-link active" href="/PHP/pages/products/all.php">All</a> 
              </div>
            </div>

            <form class="input-group" action="" style="width: 300px;">
              <button class="btn btn-outline-success" id="search" >Search</button>
              <input class="form-control" placeholder="search" id="value_search"  >
            </form>

            <?php
                if(isset($_SESSION["idCustomer"])){
                  if(substr($_SESSION["idCustomer"],0,4) == "cust"){
                    echo "<form method=\"post\">
                          <button class=\"btn btn-outline-success btnInNav\" id=\"btnCus\">Me</button>
                          <button class=\"btn btn-outline-success btnInNav\" id=\"btnCart\">Cart</button>
                          <button class=\"btn btn-outline-success btnInNav\" id=\"btnSignOut\">Sign out</button>
                          <form>";
                  }
                  else if(substr($_SESSION["idCustomer"],0,4) == "empl"){
                    echo "<form method=\"post\">
                          <button class=\"btn btn-outline-success btnInNav\" id=\"btnAdmin\">Admin</button>
                          <button class=\"btn btn-outline-success btnInNav\" id=\"btnSignOut\">Sign out</button>
                          <form>";
                  }     
                }else if(isset($_SESSION["idAccount"])){
                  echo "<form method=\"post\">
                        <button class=\"btn btn-outline-success btnInNav\" id=\"btnAdmin\">Admin</button>
                        <button class=\"btn btn-outline-success btnInNav\" id=\"btnSignOut\">Sign out</button>
                        <form>";
                }
                else {
                  echo "<form action=\"http://localhost/WED/PHP/login_sigin/customer_login.php?\">
                          <button class=\"btn btn-outline-success btnInNav\">Sign in</button>
                        </form>";
                }
            ?>
          </div>
    </nav>

    <!-- <div class="embed-responsive embed-responsive-21by9">
      <video autoplay width="100%" loop muted>
        <source src="vid\intro.mp4">
      </video>
    </div> -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
    </script>

    <script>
      $(document).ready(function(){
        
        $("#btnSignOut").click(function(e){
          e.preventDefault();
          $.ajax({
            url:"/PHP/login_sigin/Logout.php",
            type:"post",
            success: function(result){
              window.location.href = "http://localhost/PHP/index.php";
            }
          })
        })

        $("#btnAdmin").click(function(e){
          e.preventDefault();
          $.ajax({
            success: function(result){
              window.location.href = "http://localhost/PHP/pages/admin/admin.php";
            }
          })
        })

        $("#btnCus").click(function(e){
          e.preventDefault();
          $.ajax({
            success: function(result){
              window.location.href = "http://localhost/PHP/pages/customer/customer.php";
            }
          })
        })

        $("#btnCart").click(function(e){
          e.preventDefault();

          $.ajax({
            success: function(result){
              window.location.href = "http://localhost/PHP/pages/customer/Cart.php";
            }
          })
        })

      })
    </script>
</header>

<?php
  // session_destroy()
?>
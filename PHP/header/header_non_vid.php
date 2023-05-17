<header>
    <nav class="navbar navbar-light bg-light navbar-expand-lg">
        <div class="container-fluid justify-content-between">
          <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#optionsNav" aria-controls="optionsNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
            <a class="navbar-brand" href="#">Logo</a>
            <div class="collapse navbar-collapse justify-content-center" id="optionsNav">
              <div class="navbar-nav">
                <a class="nav-link active" href="#">Men</a>
                <a class="nav-link active" href="#">Women</a>  
                <a class="nav-link active" href="#">Sport</a> 
              </div>
            </div>

            <form class="input-group" action="" style="width: 300px;">
              <button class="btn btn-outline-success">Icon</button>
              <input class="form-control" placeholder="search">
            </form>

            <?php
                if(isset($_SESSION["idCustomer"])){
                  if(substr($_SESSION["idCustomer"],0,4) == "cust"){
                    print_r($_SESSION["idCustomer"]);
                    echo "<button class=\"btn btn-outline-success btnInNav\" id=\"btnSignOut\">Sign out</button>";
                  }
                }else if(isset($_SESSION["idAccount"])){
                  echo "<form method=\"post\">
                        <button class=\"btn btn-outline-success btnInNav\" id=\"btnAdmin\">Admin</button>
                        <button class=\"btn btn-outline-success btnInNav\" id=\"btnSignOut\">Sign out</button>
                        <form>";
                }
                else {
                  echo "<form action=\"login_sigin/customer_login.php\">
                          <button class=\"btn btn-outline-success btnInNav\">Sign in</button>
                        </form>";
                }
            ?>
          </div>
    </nav>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
    </script>

    <script>
      $(document).ready(function(){
        
        $("#btnSignOut").click(function(e){
          e.preventDefault();
          $.ajax({
            url:"login_sigin/Logout.php",
            type:"post",
            success: function(result){
              console.log(result);
              window.location.href = "http://localhost/PHP/index.php";
            }
          })
        })

        $("#btnAdmin").click(function(e){
          e.preventDefault();
          $.ajax({
            success: function(result){
              console.log(result);
              window.location.href = "http://localhost/PHP/pages/admin/admin.php";
            }
          })
        })
      })
    </script>
</header>
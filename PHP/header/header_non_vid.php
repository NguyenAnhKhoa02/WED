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
                if($check_key->check_key("user")){
                  $val = explode("?",$check_key->get_url());
                  for ($i=0; $i < count($val); $i++) { 
                      if(explode("=",$val[$i])[0] == "user"){
                          $user = explode("=",$val[$i])[1];
                          break;
                      }
                  }

                  if($user == "admin"){
                    echo '<a href="pages/admin/admin.php" style="text-decoration:none;">'.$user.'</a>';
                  }else{
                    echo '<a href="#" style="text-decoration:none;">'.$user.'</a>';
                  }
                  echo '<!-- <button class="btn btn-outline-success btnInNav">Sign in</button> -->';
                  echo '
                  <form action="index.php">
                    <button class="btn btn-outline-success btnInNav">Sign out</button>
                  </form>
                  ';
                  echo '<button class="btn btn-outline-success btnInNav">Cart</button>';
                }else{
                  echo '<form action="login_sigin/log_sig.php">';
                  echo '<button class="btn btn-outline-success btnInNav">Sign in</button>';
                  echo '</form>';
                  echo '<!-- <button class="btn btn-outline-success btnInNav">Sign in</button> -->';
                }
            ?>
          </div>
    </nav>
</header>
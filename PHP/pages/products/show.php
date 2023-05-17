<?php
    for ($i=0; $i < 2; $i++) { 
        echo $retVal = ($i == 0) ? '<div class="row" style="width:120%;">' : '<div class="row" style="width:120%; padding-top:2%;">' ;

        echo'
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="http://localhost/WED/PHP/img/360skin1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
                        </div>
                </div>
            </div>
      
            <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="http://localhost/WED/PHP/img/360skin1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
                        </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="http://localhost/WED/PHP/img/360skin1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
                        </div>
                </div>
            </div>
        </div>
        ';
    }

?>
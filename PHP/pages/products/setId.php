<?php
    session_start();
    $id = $_POST["idProd"];

    $_SESSION["idProd"] = $id;
    echo $id;
?>
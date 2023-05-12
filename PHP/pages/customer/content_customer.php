<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/WED/PHP/classes/check_key.php");
    $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $check_key = new checkKey($actual_link);
    require_once($_SERVER["DOCUMENT_ROOT"]."/WED/PHP/header/header_non_vid.php");
    // require_once($_SERVER["DOCUMENT_ROOT"]."/WED/PHP/content.php");
?>

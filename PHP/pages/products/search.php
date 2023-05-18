<?php 
    $value_search = $_POST["search"];
    echo $value_search;
    require_once($_SERVER["DOCUMENT_ROOT"]."/WED/PHP/classes/connect_database.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/WED/PHP/classes/product/product.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/WED/PHP/classes/product/list_product.php");

    $listProduct = new ListProduct();
    $listProduct ->searchProduct($value_search);
    $numberProduct = (count($listProduct->listProduct));
    $numberPage = $listProduct->DividePage();
   
    if(isset($_POST["page"])){
        $startIndex = $listProduct->StartIndex($_POST["page"]);
    }else{
        $startIndex = 0;
    }
    
    $countShowItem = 0;
    while (isset($listProduct->listProduct[$startIndex])) {
        if($countShowItem==6) break;

        if($countShowItem == 0) echo '<div class="row" style="width:120%;">';
        if ($countShowItem == 3) echo '</div>';
        if($countShowItem == 3) echo '<div class="row" style="width:120%; padding-top:5%;">';
        echo '
        <div class="col-md-4">
            <div class="card" style="width: 16rem;" id="item'.$countShowItem.'">
                <img class="card-img-top" src="http://localhost/WED/PHP/img/360skin1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <input style="display:none;"   id="id'.$countShowItem.'" value='.$listProduct->listProduct[$startIndex]->id.'>
                        Name: '.$listProduct->listProduct[$startIndex]->name.'<br>
                        Price: '.$listProduct->listProduct[$startIndex]->price.'<br>
                        Made_by: '.$listProduct->listProduct[$startIndex]->made_by.'<br>
                        Category: '.$listProduct->listProduct[$startIndex]->category.'<br>
                        Gender: '.$listProduct->listProduct[$startIndex]->gender.'
                    </div>
            </div>
        </div>
        ';
        $startIndex++;
        $countShowItem++;
    }
    echo '</div>';
?>
?>

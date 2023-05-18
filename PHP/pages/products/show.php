<?php
    session_start();

    $request = $_POST["request"];
    
    require_once($_SERVER["DOCUMENT_ROOT"]."/WED/PHP/classes/connect_database.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/WED/PHP/classes/product/product.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/WED/PHP/classes/product/list_product.php");
    $listProduct = new ListProduct();

    if($request == "all"){
        $listProduct->getAllFromProductTable();
    }else{
        $listProduct->GetAllProdByGender($request);
    }
    $numberProduct = (count($listProduct->listProduct));
    $numberPage = $listProduct->DividePage();
?>

<?php
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

<div class="flex" style="text-align:center; width:120%">
    <?php
        for ($i=0; $i < $numberPage; $i++) { 
           echo'    
                <button class="btn btn-outline-primary" id="btn'.$i.'">'.($i+1).'</button>
           ';
        }
    ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
</script>

<script>
    $(document).ready(function(){
        var numberPage = <?php echo $numberPage?>;
        var request = "<?php echo $request ?>"
        var countShowItem = <?php echo $countShowItem?>;
        console.log(countShowItem);

        for (let index = 0; index < numberPage; index++) {
            $("#btn"+index).click(function(){
                $.ajax({
                    url:'show.php',
                    data:{request:request,
                          page:index+1},
                    type:"post",
                    success: function(result){
                        $('#content').html(result);
                    }
                })
            })
        }

        for (let index = 0; index < countShowItem; index++) {
            $("#item"+index).click(function(){
                var idProd = $("#id"+index).val();
 
                $.ajax({
                    url:'setId.php',
                    type:"post",
                    data:{idProd:idProd},
                    success: function(result){
                        console.log(result);
                        window.location.href = "http://localhost/PHP/pages/products/showProduct.php";
                    }
                })
            })
        }
    })
</script>
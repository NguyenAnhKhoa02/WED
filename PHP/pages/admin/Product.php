<script>
    class productDetail{
        constructor(color,size,quantity,image){
            this.color = color;
            this.size = size;
            this.image = image;
            this.quantity = quantity;
        }
    }
</script>

<script>
    listProductDetail = [];
    listColorOriginal = [];
    listSizeOriginal = [];

    function initialListProductDetail(id,color,size,quantity,image){
        idProd = id;
        listColorOriginal.push(color);
        listSizeOriginal.push(size);
        listProductDetail.push(new productDetail(color,size,quantity,image));
    }

    function updateData(){
        listProductDetail = [];
        for (let index = 0; index < arrHtml.length; index++) {
            color = document.getElementById("color"+index).value;
            size = document.getElementById("size"+index).value;
            quantity = document.getElementById("quantity"+index).value;
            image = document.getElementById("image"+index).files[0];

            // console.log(image);

            listProductDetail.push(new productDetail(color,size,quantity,image));
        }
    }

    arrHtml = [];
    function addItem(){ 
        if(arrHtml.length > 0){
            index = arrHtml.length;
            updateData();
        }

        document.getElementById("productDetailTable").innerHTML="";

        length = listProductDetail.length;
        arrHtml = [];

        for (let index = 0; index <= length; index++) {
            var html = "<tr>";
            if(index < length)
                html += "<td class=\"color\"><input id=\"color"+index+"\" type=\"text\" value="+listProductDetail[index].color+"></td>";
            else
                html += "<td class=\"color\"><input id=\"color"+index+"\" type=\"text\"></td>";
            html += "<td>"
            html += "<select id=\"size"+index+"\">";
            if(index < length){
                 if(listProductDetail[index].size == "S"){
                    html += "<option selected=\"true\">S</option>";
                    html += "<option>M</option>";
                    html += "<option>XL</option>";
                    html += "<option>XXL</option>";
                 }else if(listProductDetail[index].size == "M"){
                    html += "<option>S</option>";
                    html += "<option selected=\"true\">M</option>";
                    html += "<option>XL</option>";
                    html += "<option>XXL</option>";
                 }else if(listProductDetail[index].size == "XL"){
                    html += "<option>S</option>";
                    html += "<option>M</option>";
                    html += "<option selected=\"true\">XL</option>";
                    html += "<option>XXL</option>";
                 }else if(listProductDetail[index].size == "XXL"){
                    html += "<option>S</option>";
                    html += "<option>M</option>";
                    html += "<option>XL</option>";
                    html += "<option selected=\"true\">XXL</option>";
                 }
            }else{
                html += "<option>S</option>";
                html += "<option>M</option>";
                html += "<option>XL</option>";
                html += "<option>XXL</option>";
            }
            html += "</select>";
            html += "</td>";

            if(index < length)
                html += "<td><input id=\"quantity"+index+"\" type=\"number\" value="+listProductDetail[index].quantity+"></td>";
            else
                html += "<td><input id=\"quantity"+index+"\" type=\"number\"></td>";

            if(index < length)
                if(listProductDetail[index].image == "" || listProductDetail[index].image == "undefined")
                    html += "<td>NULL</td>";
                else
                    html += "<td>"+listProductDetail[index].image+"</td>";
            else
                html += "<td>NULL</td>";
            html += "<td><input type=\"file\" class=\"form-control\" id=\"image"+index+"\"></input></td>";

            if(index == length)
                html += "<td> <button class=\"btn btn-outline-success\" onclick=\"addItem();\">Add</button> </td>";
            else
                html += "<td> <button  class=\"btn btn-outline-danger\" onclick=\"deleteItem("+index+");\">Delete</button> </td>";
            html += "</tr>";
            arrHtml.push(html);

        }

            arrHtml.forEach(element => {
            document.getElementById("productDetailTable").insertRow().innerHTML = element; 
        });
    }

    function deleteItem(id){
        for (let index = 0; index < listProductDetail.length; index++) {
            if(index == id){
                listProductDetail.splice(id,1);
                console.log(listProductDetail);
                arrHtml = [];
                addItem();
            }
        }
    }
</script>

<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/connect_database.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/product/product.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/product/list_product.php');
    $list = new ListProduct();

    $id = $_POST["id"];

    require_once($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/category/category.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/category/list_category.php');
    $listCategory = new ListCategory();
    $listCategory->getAll();

    require_once($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/type/type.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/PHP/classes/type/list_type.php');
    $listType = new ListType();
    $listType->getAll();
    
    $product;
    $value;

    echo '<input type="hidden" id="id" value='.$id.'>';

    if($id != ""){
        $listProd = $list->getProductWithID($id);
        $product = new Product($listProd[0]->id,
                               $listProd[0]->name,
                               $listProd[0]->price,
                               $listProd[0]->description,
                               $listProd[0]->material,
                               $listProd[0]->gender,
                               $listProd[0]->made_by,
                               $listProd[0]->status,
                               $listProd[0]->category,
                               $listProd[0]->type_product,
                               $listProd[0]->color,
                               $listProd[0]->size,
                               $listProd[0]->quantity,
                               $listProd[0]->image,
                               $listProd[0]->quantity_purchased);
    } else{
        $product = new Product("","","","","","","","","","","","","","","");
    }

    echo '<div class="row">

                <label class="form-label">Name</label>
                <input type="text" class="form-label" id="nameProd" value='.$product->name.'>

         </div>';

    echo '<div class="row">

            <div class = "col-md-4"">
                <label class = "form-label">Price</label>
                <input id="price" type="number" value='.$product->price.'></input>
            </div>

            <div class = "col-md-4"">
                <label class = "form-label">Material</label>
                <input id="material" type="text" value='.$product->material.'></input>
            </div>

            <div class = "col-md-4"">
                <label class = "form-label">Made_by</label>
                <input type="text" id="made_by" value='.$product->made_by.'></input>
            </div>

          </div>';

    echo '<div class="row">

            <div class="col-md-2">
                
                <label class = "form-label">Gender</label>
                <select id="gender">
                    <option '.($retVal = ($product->gender == "Male") ? 'selected="true"' : "").'>Male</option>
                    <option '.($retVal = ($product->gender == "Female") ? 'selected="true"' : "").'>Female</option>
                </select>

            </div>

            <div class="col-md-3">

                <label class="form-label">Status</label>
                <select id="status">
                    <option '.($retVal = ($product->status == "Hàng có sẵn") ? 'selected="true"' : "").'>Hàng có sẵn</option>
                    <option '.($retVal = ($product->status == "Sắp ra mắt") ? 'selected="true"' : "").'>Sắp ra mắt</option>
                </select>
                
            </div>';

    echo '  <div class="col-md-3">
                <label class="form-label">Category</label>
                <select id="category">';

    foreach ($listCategory->listCategory as $value) {
        echo '<option>'.$value->name.'</option>';
    }

    echo         '</select>
            </div>';

    echo '  <div class="col-md-3">
                <label class="form-label">Type</label>
                <select id="type">';

    foreach ($listType->listType as $value) {
        echo '<option>'.$value->name.'</option>';
    }

    echo         '</select>
            </div>';

    echo '</div>';

    echo '<div class="row">';

            // <div class="col-md-6">
            //     <input type="file" class="form-control" id="image">
            // </div>';

    if($product->id != ""){
        echo '<div class="col-md-6">
                <label class="form-label">Quantity_purchased</label>
                <input type="number" class="form-label" id="quantity_purchased" style="max-width:50%;" value='.$product->quantity_purchased.'>
              </div>';
    }

    echo '     </div>';

    echo '<div class="row">

            <div class="col-md-12">
                <label class="form-label">Description</label>
                <textarea class="form-control" rows="8" id="description">'.$product->description.'</textarea>
            </div>

         </div>';

    echo '<table class="table" id="productDetail">
            
            <thead>
                <th>Color</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Image</th>
                <th></th>
                <th>Action</th>
            </thead>

            <tbody id="productDetailTable">';

    if($product->id != ""){
        foreach ($listProd as $value) {
            echo '<script>initialListProductDetail(\''.$value->id.'\',\''.$value->color.'\',\''.$value->size.'\',\''.$value->quantity.'\',\''.$value->image.'\');</script>';   
        }

        echo '<script>addItem();</script>';   
    }else{
        echo '<script>addItem();</script>';
    }


    echo    '</tbody>

         </table>';

    if($product->id == ""){
        echo '<div class="row" style="text-align:center;">
                <form method="post">
                    <input type="submit" id="AddNew" class="btn btn-outline-primary">
                    </form>
              </div>';
    }else{
        echo '<div class="row" style="text-align:center;">
               <form method="post">
                   <input type="submit" id="Update" class="btn btn-outline-primary" value="Update">
                </form>
               </div>';
    }
?>  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
</script>
    
<script>
    $(document).ready(function(){
        $("#AddNew").click(function(e){
            e.preventDefault();
            updateData();
            try {
                var name = $('#nameProd').val();
                var price = $('#price').val();
                var material = $('#material').val();
                var gender = $('#gender').val();
                var made_by = $("#made_by").val();
                var status = $("#status").val();
                colors=[];
                sizes = [];
                quantities = [];
                images = [];
                listProductDetail.forEach(element => {
                    if(element.color != "" || element.quantity != ""){
                        for (let index = 0; index <= colors.length; index++) {
                            if(index == colors.length){
                                colors.push(element.color);
                                sizes.push(element.size);
                                quantities.push(element.quantity);
                                images.push(element.image);
                                break;
                            }

                            if(colors[index] == element.color && sizes[index] == element.size){
                                quantities[index] =  (Number(quantities[index]) + Number(element.quantity)).toString();
                                break;
                            }
                        }
                    }
                });


                var category = $('#category').val();
                var type = $('#type').val();
                var description = $('#description').val();
                
                if(name == "") throw "nameProd + Please enter the name of product!";
                if(price == "") throw "price + Please enter the price of product";
                if(material == "") throw "material + Please enter the material of product!";
                if(made_by == "") throw "made_by + Please fill up made by!";
                if(colors.length == 0) throw "color0 + Please enter the color of product";
                if(quantities.length == 0) throw "quantity0 + Please enter the quantities of product";

                for (let index = 0; index < colors.length; index++) {
                    if(colors[index] == "") throw "color"+index+" + Please enter the color of product!";
                    if(quantities[index] == "") throw "quantity"+index+" + Please enter the quantity of product!";
                }

                var formData = new FormData();
                formData.append('mode',"Product");
                formData.append('nameProd',name);
                formData.append('price',price);
                formData.append('material',material);
                formData.append('gender',gender);
                formData.append('made_by',made_by);
                formData.append('status',status);
                formData.append('colors',colors);
                formData.append('sizes',sizes);
                formData.append('category',category);
                formData.append('type',type);
                formData.append('quantities',quantities);

                $i = 0;
                images.forEach(element => {
                    formData.append('image'+$i++,element); 
                });
            
                if(images.length == 0){
                    images.push("");
                }

                formData.append('description',description);

                $.ajax({
                    url: 'Add.php',
                    type: 'post',
                    data: formData,
                    contentType:false,
                    processData:false,
                    success: function(dataResult){
                        if(dataResult.split("+")[0].trim() == "false"){
                            $("#" + dataResult.split("+")[1].trim()).focus();
                            alert(dataResult.split("+")[2]);
                        }else{
                            alert(dataResult);
                            $('#content').load("ManageProduction.php");
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

        $("#Update").click(function(e){
            e.preventDefault();
            updateData();

            try {
                var id = $('#id').val();
                var nameProd = $('#nameProd').val();
                var price = $('#price').val();
                var material = $('#material').val();
                var gender = $('#gender').val();
                var made_by = $("#made_by").val();
                var status = $("#status").val();
                var category = $('#category').val();
                var type = $('#type').val();
                var quantity_purchased = $('#quantity_purchased').val();
                var description = $('#description').val();
                colors=[];
                sizes = [];
                quantities = [];
                images = [];
                listProductDetail.forEach(element => {
                    if(element.color != "" || element.quantity != ""){
                        for (let index = 0; index <= colors.length; index++) {
                            if(index == colors.length){
                                colors.push(element.color);
                                sizes.push(element.size);
                                quantities.push(element.quantity);
                                images.push(element.image);
                                break;
                            }

                            if(colors[index] == element.color && sizes[index] == element.size){
                                quantities[index] =  (Number(quantities[index]) + Number(element.quantity)).toString();
                                break;
                            }
                        }
                    }
                });


                if(nameProd == "") throw "nameProd + Please enter the name of product!";
                if(price == "") throw "price + Please enter the price of product";
                if(material == "") throw "material + Please enter the material of product!";
                if(made_by == "") throw "made_by + Please fill up made by!";
                if(quantity_purchased == "") throw "quantity_purchased + Please enter quantity purchased!" 
                if(colors.length == 0) throw "color0 + Please enter the color of product!";
                if(quantities.length == 0) throw "quantity0 + Please enter the quantities of product!";
                for (let index = 0; index < colors.length; index++) {
                    if(colors[index] == "") throw "color"+index+" + Please enter the color of product!";
                    if(quantities[index] == "") throw "quantity"+index+" + Please enter the quantity of product!";
                }
                
                var formData = new FormData();
                formData.append('mode',"Product");
                formData.append('id',id);
                formData.append('nameProd',nameProd);
                formData.append('price',price);
                formData.append('material',material);
                formData.append('gender',gender);
                formData.append('made_by',made_by);
                formData.append('status',status);
                formData.append('colors',colors);
                formData.append('sizes',sizes);
                formData.append('category',category);
                formData.append('type',type);
                formData.append('quantities',quantities);
                formData.append('quantity_purchased',quantity_purchased);

                $i = 0;
                 images.forEach(element => {
                     formData.append('image'+$i++,element); 
                 });
             
             
                 formData.append('description',description);
                $.ajax({
                    url: "Update.php",
                    type: 'post',
                    data: formData,
                    contentType:false,
                    processData:false,
                    success: function(dataResult){
                        if(dataResult.split("+")[0].trim() == "false"){
                            $("#" + dataResult.split("+")[1].trim()).focus();
                            alert(dataResult.split("+")[2]);
                        }else{
                            alert(dataResult);
                            $('#content').load("ManageProduction.php");
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
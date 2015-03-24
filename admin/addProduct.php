<?php
include 'header.php';

function btnActive($id) {
    if(Input::get('tid') == $id) {
        echo 'btn-primary';
    } else {
        echo 'btn-default';
    }
}

switch (Input::get('tid')) {
    case 0:
        $type = 'earing';
        break;
    case 1:
        $type = 'necklace';
        break;
    case 2:
        $type = 'ring';
        break;
    case 3:
        $type = 'bangle';
        break;
    case 4:
        $type = 'brooch';
        break;
    case 5:
        $type = 'set';
        break;
    case 6:
        $type = 'watch';
        break;
}

$product_table = 'product_' . $type;

if(Input::exists()) {
    include_once 'upload.process.php';
    if($image_upload_success[0] != null) {
        $added_product = Product::getInstance()->create($product_table, array(
            'name' => Input::get('name'),
            'price' => Input::get('price'),
            'img' => $image_upload_success[0]
            ));
        if($added_product) {
            echo "<p>Create product success.</p>";
        } else {
            echo '<p>Sorry, create product failed.</p>';
        }
    }
}
        
?>
    <div id="content">
        <div class="col-md-10" style="padding-top:30px;">
            <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
                <!-- Product Type -->
                <div class="form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 control-label" for="inputSuccess">Product Type</label>
                    <div class="col-lg-8">
                        <div>
                            <a href="addproduct.php?tid=0"><div type="button" class="btn <?=btnActive(0)?>">Earing</div></a>
                            <a href="addproduct.php?tid=1"><div type="button" class="btn <?=btnActive(1)?>">Necklace</div></a>
                            <a href="addproduct.php?tid=2"><div type="button" class="btn <?=btnActive(2)?>">Ring</div></a>
                            <a href="addproduct.php?tid=3"><div type="button" class="btn <?=btnActive(3)?>">Bangle</div></a>
                            <a href="addproduct.php?tid=4"><div type="button" class="btn <?=btnActive(4)?>">Brooch</div></a>
                            <a href="addproduct.php?tid=5"><div type="button" class="btn <?=btnActive(5)?>">Set</div></a>
                            <a href="addproduct.php?tid=6"><div type="button" class="btn <?=btnActive(6)?>">Watch</div></a>
                            <a href="addproduct.php?tid=7"><div type="button" class="btn <?=btnActive(7)?>">Accessories</div></a>
                        </div>
                    </div>
                </div>
                <!-- Product Categories -->
                <?php if(Input::get('tid') == 7) {?>
                <div class="form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 control-label" for="inputSuccess">Product category</label>
                    <div class="col-lg-3">
                        <select id="p_cat" name="type_id" class="form-control m-bot15"> 
                            <option value="เครื่องประดับผม">เครื่องประดับผม</option>
                            <option value="Belt(เข็มขัด)">Belt(เข็มขัด)</option>
                            <option value="Glasses(แว่นตา)">Glasses(แว่นตา)</option>
                            <option value="Jew(จิ้ว)">Jew(จิ้ว)</option>
                            <option value="Case(เคสมือถือ)">Case(เคสมือถือ)</option>
                            <option value="Bunch of keys(พวงกุญแจ)">Bunch of keys(พวงกุญแจ)</option>
                        </select>
                    </div>
                </div>
                <?php } ?>

                <div class="form-group">
                    <label for="name" class="col-lg-3 col-md-3 col-sm-3 control-label">Name</label>
                    <div class="col-lg-2">
                        <input type="text" class="form-control" name="name" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="price" class="col-lg-3 col-md-3 col-sm-3 control-label">Price</label>
                    <div class="col-lg-2 input-group">
                        <input type="text" class="form-control" name="price" required>
                        <span class="input-group-addon">Bath.</span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 control-label">Image Upload</label>
                    <div class="col-md-9">
                        <div class="fileupload fileupload-new" data-provides="fileupload"><input type="hidden" value="" name="">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="img/no_image.gif" alt="">
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                            <div>
                                <span class="btn btn-default btn-file">
                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                <input type="file" class="default" name="image[]" accept="image/*">
                                </span>
                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                            </div>
                        </div>
                        <br>
                        <span class="label label-danger ">NOTE!</span>
                        <span>
                        Attached image thumbnail is
                        supported in Latest Firefox, Chrome, Opera,
                        Safari and Internet Explorer 10 only
                        </span>
                    </div>
                </div>
                
                <br/>
                <div class="form-group last">
                    <div class="col-lg-offset-3 col-lg-8">  
                        <button type="submit" class="btn btn-primary btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
   

    </div><!-- .content -->

<?php
  include 'footer.php';
?>
<?php
 include 'header.php';
?>

        <div class="col-md-10" style="padding-top:30px;">
            <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
                <!-- Product Type -->
                <div class="form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 control-label" for="inputSuccess">Product Type</label>
                    <div class="col-lg-8">
                        <div>
                            <a href="product.php?mode=add_product&tid=0"><div type="button" class="btn btn-default">Earing</div></a>
                            <a href="product.php?mode=add_product&tid=1"><div type="button" class="btn btn-default">Nacklace</div></a>
                            <a href="product.php?mode=add_product&tid=2"><div type="button" class="btn btn-default">Ring</div></a>
                            <a href="product.php?mode=add_product&tid=3"><div type="button" class="btn btn-default">Bangle</div></a>
                            <a href="product.php?mode=add_product&tid=3"><div type="button" class="btn btn-default">Brooch</div></a>
                            <a href="product.php?mode=add_product&tid=3"><div type="button" class="btn btn-default">Set</div></a>
                            <a href="product.php?mode=add_product&tid=3"><div type="button" class="btn btn-default">Watch</div></a>
                            <a href="product.php?mode=add_product&tid=3"><div type="button" class="btn btn-default">Accessories</div></a>
                        </div>
                    </div>
                </div>
                
                <!-- Product Categories -->
                <div class="form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 control-label" for="inputSuccess">Product category</label>
                    <div class="col-lg-3">
                        <select id="p_cat" name="type_id" class="form-control m-bot15">
                            
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPID" class="col-lg-3 col-md-3 col-sm-3 control-label">Product ID</label>
                    <div class="col-lg-2">
                        <input type="text" class="form-control" name="product_id" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPID" class="col-lg-3 col-md-3 col-sm-3 control-label">Price</label>
                    <div class="col-lg-2 input-group">
                        <input type="text" class="form-control" name="weight" required>
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
                                <input type="file" class="default" name="image_file" id="image_file">
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
                       
                        <button type="button" class="btn btn-primary btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
   

</div><!-- .content -->

<?php
  include 'footer.php';
?>
<?php
include 'header.php';
include 'menu.php';

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

$min = (Input::get('min') != '') ? Input::get('min') : 0;
$max = (Input::get('max') != '') ? Input::get('max') : 999999;

function pfilter($lmin, $lmax) {
    if($lmin < 0)
        return ('tid=' . Input::get('tid'));
    return ('tid=' . Input::get('tid') . '&min=' . $lmin . '&max=' . $lmax);
}
?>
<?php $page = "product.php"; ?>
<div class="row">
    <div class="col-md-5 col-md-offset-1" id="menuprice" >
        <div class="row" style="padding-left:55px;">
            <div class="gfont boon-300">Price Filter</div>
        </div>
        <?php if($type == 'set') { ?>
        <div class="row" style="padding-top:5px;">
            <a href="product.php?<?=pfilter(395, 995)?>">
                <button type="button" class="btn btn-default custom">
                    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>&nbsp; 395 THB - 995 THB
                </button>
            </a>
        </div>
        <div class="row" style="padding-top:10px;">
            <a href="product.php?<?=pfilter(1145, 2995)?>">
                <button type="button" class="btn btn-default custom">
                    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>&nbsp; 1145 THB - 2995 THB
                </button>
            </a>
        </div>
        <div class="row" style="padding-top:10px;">
            <a href="product.php?<?=pfilter(3145, 3995)?>">
                <button type="button" class="btn btn-default custom ">
                    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>&nbsp; 3,145 THB - 3,995 THB
                </button>
            </a>
        </div>
        <div class="row" style="padding-top:10px;">
            <a href="product.php?<?=pfilter(-1, -1)?>">
                <button type="button" class="btn btn-default custom ">
                    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>&nbsp; Remove Filter
                </button>
            </a>
        </div>
        <?php } else { ?>
        <div class="row" style="padding-top:5px;">
            <a href="product.php?<?=pfilter(99, 395)?>">
                <button type="button" class="btn btn-default custom">
                    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>&nbsp; 99 THB - 395 THB
                </button>
            </a>
        </div>
        <div class="row" style="padding-top:10px;">
            <a href="product.php?<?=pfilter(445, 955)?>">
                <button type="button" class="btn btn-default custom">
                    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>&nbsp; 445 THB - 955 THB
                </button>
            </a>
        </div>
        <div class="row" style="padding-top:10px;">
            <a href="product.php?<?=pfilter(1145, 1995)?>">
                <button type="button" class="btn btn-default custom ">
                    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>&nbsp; 1,145 THB - 1,995 THB
                </button>
            </a>
        </div>
        <div class="row" style="padding-top:10px;">
            <a href="product.php?<?=pfilter(-1, -1)?>">
                <button type="button" class="btn btn-default custom ">
                    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>&nbsp; Remove Filter
                </button>
            </a>
        </div>
        <?php } ?>
    </div>
    <div class="col-xs-6 col-md-9" style="padding-top:30px;">
        <div id="productbox" >
        <?php
        echo '<h3>'.ucfirst($type).'</h3>';
        $product_table = 'product_' . $type;
        $products = Database::getInstance()->get($product_table, array('id', '>', 0));

        if($products->count()) {
            foreach($products->results() as $item) {
                if($min <= $item->price && $item->price <= $max) {
        ?>
        
            <div class="col-md-3 column productbox">
                <center><img src="uploads/thumbs/thumb_<?=$item->img?>" class="img-responsive" height="120" width="120"></center>
                <div class="producttitle"><?=$item->name?></div>
                <div class="productprice">
                    <div class="pull-right"><a href="#" class="btn btn-info btn-sm" role="button">View</a></div>
                    <div class="pricetext"><?=$item->price?></div>
                </div>
            </div>
        <?php }}} ?>
        </div>
    </div>
    </div><!-- .row -->
    <hr>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/easy_paginate.js"></script>
    <script type="text/javascript">
                
            jQuery(function($){
                
                $('ul#items').easyPaginate({
                    step:1
                });
                
                });
            jQuery(function($){
                $('div#productbox').easyPaginate({
                    step:16
                });    
            });
                
    </script>
    <?php
            include 'footer.php';
    ?>
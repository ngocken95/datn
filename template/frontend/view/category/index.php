<?php include_once 'view/partial/head.php';?>
<?php include_once 'view/partial/header.php';?>
<section class="container">
    <div class="row">
        <article class="col-sm-9 col-sm-push-3">
            <div class="c_box">
                <h3>
                    <?php
                    if(@$_GET['id']){
                        echo $itemType->getName();
                    }
                    else{
                        echo $_GET['brand'];
                    }
                    ?>
                </h3>
                <?php
                if(@$_GET['id']){
                ?>
                <div class="well h4">
                    <h4><?php echo $itemType->getDescription();?></h4>
                </div>
                <?php
                }
                if($listProductType!=null){
                    foreach ($listProductType as $item){
                        ?>
                        <div class="c_item">
                            <div class="product-item">
                                <?php
                                if (setNew($item->getCreated())) {
                                    ?>
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon new">NEW</div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="product-buttons">
                                    <div class="btn-pro btn-cart-product">
                                        <a href="" onclick=""><i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                    <div class="btn-pro btn-detail-product">
                                        <a href=""><i class="fa fa-search"></i></a>
                                    </div>
                                    <div class="btn-pro btn-cart-product">
                                        <a href="" onclick=""><i class="fa fa-heart"></i></a>
                                    </div>
                                </div>
                                <?php
                                if ($item->getDiscount() != 0) {
                                    ?>
                                    <span class="discout-ele"><?php echo '-' . $item->getDiscount() . '%'; ?></span>
                                    <?php
                                }
                                ?>
                                <div class="product-image">
                                    <figure>
                                        <a href="">
                                            <img src="<?php echo public_url('upload/') . $item->getImg(); ?>" alt=""
                                                 title=""
                                                 class="img-responsive">
                                        </a>
                                    </figure>
                                </div>
                                <div class="product-detail">
                                    <small>
                                        <span><i class="fa fa-eye"></i> <?php echo $item->getView(); ?></span>
                                        <span><i class="fa fa-heart"></i> <?php echo $item->getLikes(); ?></span>
                                        <span><i class="fa fa-comments"></i><?php echo $cmt[$item->getId()]; ?></span>
                                        <span><i class="fa fa-shopping-bag"></i> <?php echo $item->getBuy(); ?></span>
                                    </small>
                                </div>
                                <div class="product-name">
                                    <a href=""><h4><?php echo $item->getName(); ?></h4></a>
                                </div>
                                <div class="product-price">
                                    <div class="text-color new-price"><?php echo number_format($item->getPrice() * $item->getDiscount(), 0, '.', ',') . 'VNĐ'; ?></div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="text-center">
                <?php paginationPage($qtyItem,12);?>
            </div>

        </article>
        <?php include_once 'view/partial/left_menu.php';?>
    </div>
</section>
<?php include_once 'view/partial/footer.php';?>
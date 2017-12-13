<?php $this->load->view('site/layouts/head');?>
<?php $this->load->view('site/layouts/header');?>
<?php $this->load->view('site/layouts/slider');?>
<section class="container">
    <div class="row">
        <article class="col-sm-9 col-sm-push-3">
            <div class="c_box">
                <h3>Sản phẩm bán chạy</h3>
                <?php
                if (!empty($list_product_buy)) {
                    foreach ($list_product_buy as $product_buy) {
                        ?>
                        <div class=" c_item">
                            <div class="product-item">
                                <div class="ribbon-wrapper">
                                    <div class="ribbon hot">HOT</div>
                                </div>
                                <div class="product-buttons">
                                    <div class="btn-pro btn-cart-product">
                                        <a href="<?php echo base_url('product_detail/'.$product_buy['id']);?>" onclick=""><i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                    <div class="btn-pro btn-detail-product">
                                        <a href="<?php echo base_url('product_detail/'.$product_buy['id']);?>"><i class="fa fa-search"></i></a>
                                    </div>
                                    <div class="btn-pro btn-cart-product">
                                        <?php
                                        $check=false;
                                        if(!empty($this->session->userdata('product')['like'])){
                                            foreach ($this->session->userdata('product')['like'] as $like){
                                                if($like==$product_buy['id']){
                                                    $check=true;
                                                }
                                            }
                                        }
                                        ?>
                                        <a href="<?php echo base_url('homepage/like/'.$product_buy['id']);?>" onclick=""><i class="fa <?php echo $check?'fa-heart-o':'fa-heart';?>"></i></a>
                                    </div>
                                </div>
                                <?php
                                if ($product_buy['discount'] != 0) {
                                    ?>
                                    <span class="discout-ele"><?php echo '-' . $product_buy['discount']  . '%'; ?></span>
                                    <?php
                                }
                                ?>
                                <div class="product-image">
                                    <figure>
                                        <a href="<?php echo base_url('product_detail/'.$product_buy['id']);?>">
                                            <img src="<?php echo base_url('upload/') . $product_buy['img_cover']; ?>" alt=""
                                                 title=""
                                                 class="img-responsive">
                                        </a>
                                    </figure>
                                </div>
                                <div class="product-detail">
                                    <small>
                                        <span><i class="fa fa-eye"></i> <?php echo $product_buy['product_view']; ?></span>
                                        <span><i class="fa fa-heart"></i> <?php echo $product_buy['product_like']; ?></span>
                                        <span><i class="fa fa-comments"></i> <?php echo $product_buy['product_cmt']; ?></span>
                                        <span><i class="fa fa-shopping-bag"></i> <?php echo $product_buy['product_buy']; ?></span>
                                    </small>
                                </div>
                                <div class="product-name">
                                    <a href=""><h4><?php echo $product_buy['name']; ?></h4></a>
                                </div>
                                <div class="product-price">
                                    <div class="text-color new-price"><?php echo number_format($product_buy['price'] * (100-$product_buy['discount'])) . ' VNĐ'; ?></div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="c_box">
                <h3>Sản phẩm mới</h3>
                <?php
                if (!empty($list_product_new)) {
                    foreach ($list_product_new as $product_new) {
                        ?>
                        <div class="c_item">
                            <div class="product-item">
                                <?php
                                if (set_new($product_new['created'])) {
                                    ?>
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon new">NEW</div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="product-buttons">
                                    <div class="btn-pro btn-cart-product">
                                        <a href="<?php echo base_url('product_detail/'.$product_new['id']);?>" onclick=""><i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                    <div class="btn-pro btn-detail-product">
                                        <a href="<?php echo base_url('product_detail/'.$product_new['id']);?>"><i class="fa fa-search"></i></a>
                                    </div>
                                    <?php
                                    $check=false;
                                    if(!empty($this->session->userdata('product')['like'])){
                                        foreach ($this->session->userdata('product')['like'] as $like){
                                            if($like==$product_new['id']){
                                                $check=true;
                                            }
                                        }
                                    }
                                    ?>
                                    <div class="btn-pro btn-cart-product">
                                        <a href="<?php echo base_url('homepage/like/'.$product_new['id']);?>" onclick=""><i class="fa <?php echo $check?'fa-heart-o':'fa-heart';?>"></i></a>
                                    </div>
                                </div>
                                <?php
                                if ($product_buy['discount'] != 0) {
                                    ?>
                                    <span class="discout-ele"><?php echo '-' . $product_new['discount']  . '%'; ?></span>
                                    <?php
                                }
                                ?>
                                <div class="product-image">
                                    <figure>
                                        <a href="<?php echo base_url('product_detail/'.$product_new['id']);?>">
                                            <img src="<?php echo base_url('upload/') . $product_new['img_cover']; ?>" alt=""
                                                 title=""
                                                 class="img-responsive">
                                        </a>
                                    </figure>
                                </div>
                                <div class="product-detail">
                                    <small>
                                        <span><i class="fa fa-eye"></i> <?php echo $product_new['product_view']; ?></span>
                                        <span><i class="fa fa-heart"></i> <?php echo $product_new['product_like']; ?></span>
                                        <span><i class="fa fa-comments"></i> <?php echo $product_new['product_cmt']; ?></span>
                                        <span><i class="fa fa-shopping-bag"></i> <?php echo $product_new['product_buy']; ?></span>
                                    </small>
                                </div>
                                <div class="product-name">
                                    <a href=""><h4><?php echo $product_new['name']; ?></h4></a>
                                </div>
                                <div class="product-price">
                                    <div class="text-color new-price"><?php echo number_format($product_new['price'] * (100-$product_new['discount'])) . ' VNĐ'; ?></div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="c_box">
                <h3>Sản phẩm được yêu thích</h3>
                <?php
                if (!empty($list_product_like)) {
                    foreach ($list_product_like as $product_like) {
                        ?>
                        <div class=" c_item">
                            <div class="product-item">
                                <?php
                                if (set_new($product_new['created'])) {
                                    ?>
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon new">NEW</div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="product-buttons">
                                    <div class="btn-pro btn-cart-product">
                                        <a href="<?php echo base_url('product_detail/'.$product_like['id']);?>" onclick=""><i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                    <div class="btn-pro btn-detail-product">
                                        <a href="<?php echo base_url('product_detail/'.$product_like['id']);?>"><i class="fa fa-search"></i></a>
                                    </div>
                                    <?php
                                    $check=false;
                                    if(!empty($this->session->userdata('product')['like'])){
                                        foreach ($this->session->userdata('product')['like'] as $like){
                                            if($like==$product_like['id']){
                                                $check=true;
                                            }
                                        }
                                    }
                                    ?>
                                    <div class="btn-pro btn-cart-product">
                                        <a href="<?php echo base_url('homepage/like/'.$product_like['id']);?>" onclick=""><i class="fa <?php echo $check?'fa-heart-o':'fa-heart';?>"></i></a>
                                    </div>
                                </div>
                                <?php
                                if ($product_like['discount'] != 0) {
                                    ?>
                                    <span class="discout-ele"><?php echo '-' . $product_like['discount']  . '%'; ?></span>
                                    <?php
                                }
                                ?>
                                <div class="product-image">
                                    <figure>
                                        <a href="<?php echo base_url('product_detail/'.$product_like['id']);?>">
                                            <img src="<?php echo base_url('upload/') . $product_like['img_cover']; ?>" alt=""
                                                 title=""
                                                 class="img-responsive">
                                        </a>
                                    </figure>
                                </div>
                                <div class="product-detail">
                                    <small>
                                        <span><i class="fa fa-eye"></i> <?php echo $product_like['product_view']; ?></span>
                                        <span><i class="fa fa-heart"></i> <?php echo $product_like['product_like']; ?></span>
                                        <span><i class="fa fa-comments"></i> <?php echo $product_like['product_cmt']; ?></span>
                                        <span><i class="fa fa-shopping-bag"></i> <?php echo $product_like['product_buy']; ?></span>
                                    </small>
                                </div>
                                <div class="product-name">
                                    <a href=""><h4><?php echo $product_like['name']; ?></h4></a>
                                </div>
                                <div class="product-price">
                                    <div class="text-color new-price"><?php echo number_format($product_like['price'] * (100-$product_like['discount'])) . ' VNĐ'; ?></div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </article>
        <?php $this->load->view('site/layouts/left_menu');?>
    </div>
</section>
<?php $this->load->view('site/layouts/footer');?>
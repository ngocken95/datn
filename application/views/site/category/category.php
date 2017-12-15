<?php $this->load->view('site/layouts/head');?>
<?php $this->load->view('site/layouts/header');?>
<section class="container">
    <div class="row">
        <article class="col-sm-9 col-sm-push-3">
            <div class="c_box">
                <h3>
                    <?php echo $item['name']; ?>
                </h3>
                <?php
                if(isset($item['description'])){
                    ?>
                    <div class="well h4">
                        <h4><?php echo $item['description'];?></h4>
                    </div>
                    <?php
                }
                if(!empty($list_product)){
                    foreach ($list_product as $item){
                        ?>
                        <div class="c_item">
                            <div class="product-item">
                                <?php
                                if (set_new($item['created'])) {
                                    ?>
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon new">NEW</div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="product-buttons">
                                    <div class="btn-pro btn-cart-product">
                                        <a href="<?php echo base_url('product_detail/'.$item['id']);?>" onclick=""><i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                    <div class="btn-pro btn-detail-product">
                                        <a href="<?php echo base_url('product_detail/'.$item['id']);?>"><i class="fa fa-search"></i></a>
                                    </div>
                                    <?php
                                    $check=false;
                                    if(!empty($this->session->userdata('product')['like'])){
                                        foreach ($this->session->userdata('product')['like'] as $like){
                                            if($like==$item['id']){
                                                $check=true;
                                            }
                                        }
                                    }
                                    ?>
                                    <div class="btn-pro btn-cart-product">
                                        <a href="<?php echo base_url('homepage/like/'.$item['id']);?>" onclick=""><i class="fa <?php echo $check?'fa-heart-o':'fa-heart';?>"></i></a>
                                    </div>
                                </div>
                                <?php
                                if ($item['discount'] != 0) {
                                    ?>
                                    <span class="discout-ele"><?php echo '-' . $item['discount'] . '%'; ?></span>
                                    <?php
                                }
                                ?>
                                <div class="product-image">
                                    <figure>
                                        <a href="<?php echo base_url('product_detail/'.$item['id']);?>">
                                            <img src="<?php echo base_url('upload/'. $item['img_cover']) ; ?>" alt=""
                                                 title=""
                                                 class="img-responsive">
                                        </a>
                                    </figure>
                                </div>
                                <div class="product-detail">
                                    <small>
                                        <span><i class="fa fa-eye"></i> <?php echo $item['product_view']; ?></span>
                                        <span><i class="fa fa-heart"></i> <?php echo $item['product_like']; ?></span>
                                        <span><i class="fa fa-comments"></i><?php echo $item['product_cmt']; ?></span>
                                        <span><i class="fa fa-shopping-bag"></i> <?php echo $item['product_buy']; ?></span>
                                    </small>
                                </div>
                                <div class="product-name">
                                    <a href=""><h4><?php echo $item['name']; ?></h4></a>
                                </div>
                                <div class="product-price">
                                    <div class="text-color new-price"><?php echo number_format($item['price'] *(100- $item['discount'])/100) . ' VNĐ'; ?></div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="text-center">

            </div>

        </article>
        <?php $this->load->view('site/layouts/left_menu');?>
    </div>
</section>
<?php $this->load->view('site/layouts/footer');?>
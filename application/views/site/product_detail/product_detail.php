<?php $this->load->view('site/layouts/head'); ?>
<?php $this->load->view('site/layouts/header'); ?>
<style>
    input[type=radio] {
        display: none;
    }

    .button {
        display: inline-block;
        position: relative;
        width: 30px;
        height: 30px;
        margin: 10px;
        cursor: pointer;
    }

    .button span {
        display: block;
        position: absolute;
        width: 30px;
        height: 30px;
        padding: 0;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        border-radius: 100%;
        background: #eeeeee;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
        transition: ease .3s;
    }

    .button span:hover {
        padding: 10px;
    }
</style>
<section class="container">
    <div class="row">
        <article class="col-sm-9 col-sm-push-3">
            <div class="c_box">
                <h3>Chi tiết</h3>
            </div>
            <div class="row p_Detail">
                <div class="col-sm-7">
                    <?php
                    $item['img'] = explode('/', $item['img_list']);
                    ?>
                    <div class="row app-figure" id="zoom-fig">
                        <center><a id="Zoom-1" class="MagicZoom col-sm-12"
                                   href="<?php echo base_url('upload/' . $item['img_cover']); ?>">
                                <img src="<?php echo base_url('upload/' . $item['img_cover']); ?> " alt=""/>
                            </a></center>
                        <div class="selectors col-sm-5" style="padding-top: 20px">
                            <a style="padding-right: 10px" data-zoom-id="Zoom-1"
                               href="<?php echo base_url('upload/' . $item['img_cover']); ?>"
                               data-image="<?php echo base_url('upload/' . $item['img_cover']); ?>">
                                <img srcset="<?php echo base_url('upload/' . $item['img_cover']); ?>"
                                     src="<?php echo base_url('upload/' . $item['img_cover']); ?>">
                            </a>
                            <?php
                            foreach ($item['img'] as $img) {
                                if ($img != '') {
                                    ?>
                                    <a style="padding-right: 10px" data-zoom-id="Zoom-1"
                                       href="<?php echo base_url('upload/' . $img); ?>"
                                       data-image="<?php echo base_url('upload/' . $img); ?>">
                                        <img srcset="<?php echo base_url('upload/' . $img); ?>"
                                             src="<?php echo base_url('upload/' . $img); ?>">
                                    </a>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $(".selectors").owlCarousel({
                                navigation: true,
                                nav: true,
                                loop: true,
                                items: 4,
                                margin: 10,
                                slideSpeed: 300,
                                paginationSpeed: 400,
                                autoPlay: true
                            });
                        });
                    </script>
                </div>
                <div class="col-sm-5">
                    <div class="pname_Detail">
                        <h1><?php echo $item['name']; ?></h1>
                        <div class="text-justify p_descript">

                        </div>
                        <div class="pd_Price">
                            <h3><?php echo $item['brand']; ?></h3>
                            <span class="npd_price"><?php echo number_format($item['price'] * (100 - $item['discount'])) . ' VNĐ'; ?></span>
                            <span class="opd_price"><?php echo number_format($item['price']) . ' VNĐ'; ?></span>
                            <span class="pc_sale">-<?php echo $item['discount']; ?>%</span>
                        </div>
                        <div class="p_code">
                            <h3>Mã sản phẩm</h3>
                            <p>Mã sản phẩm: <span class="text_color"><?php echo $item['code']; ?></span> - Lượt xem:
                                <span
                                        class="text_color"><?php echo $item['product_view']; ?></span></p>
                        </div>
                        <form action="<?php echo base_url('cart/additem'); ?>" name="information_cart"
                              id="information_cart" method="POST">
                            <input type="hidden" name="color_pick" id="color_pick" value="0">
                            <input type="hidden" name="price" id="price"
                                   value="<?php echo $item['price'] * (100 - $item['discount']); ?>">
                            <div class="p_code">
                                <h3>Danh sách màu</h3>
                                <div id="list_color">
                                    <?php
                                    if (!empty($list_color)) {
                                        foreach ($list_color as $color) {
                                            ?>
                                            <label class="<?php echo $color['color']; ?>">
                                                <input type="radio" name="color" value="<?php echo $color['id']; ?>">
                                                <div class="button"><span></span></div>
                                            </label>
                                            <style>
                                                .<?php echo $color['color'];?> .button span {
                                                    background: #<?php echo $color['color_code'];?>;
                                                }

                                                .<?php echo $color['color'];?> input:checked ~ .button {
                                                    background: #<?php echo $color['color_code'];?>;
                                                }
                                            </style>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="p_code">
                                <h3>Số lượng </h3>
                                <input type="number" name="quantity" id="quantity" value="" class="form form-control">
                            </div>
                            <div class="p_set">
                                <button type="button" id="add_cart" class="p_set1">Đặt mua</button>
                                <?php
                                $check = false;
                                if (!empty($this->session->userdata('product')['like'])) {
                                    foreach ($this->session->userdata('product')['like'] as $like) {
                                        if ($like == $item['id']) {
                                            $check = true;
                                        }
                                    }
                                }
                                ?>
                                <a href="<?php echo base_url('homepage/like/' . $item['id']); ?>" class="p_set2 "><i
                                            class="fa <?php echo $check ? 'fa-heart' : 'fa-heart-o'; ?>"
                                            aria-hidden="true"></i>Yêu thích</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row pText_Detail">
                <div class="col-sm-12">
                    <h2>Mô tả sản phẩm</h2>
                </div>
                <div class="col-sm-12">
                    <p><strong><?php echo $item['name']; ?></strong> <br>
                    <p><?php echo $item['description']; ?></p>
                </div>
            </div>

            <div class="c_box">
                <?php
                print_r($list_product);
                ?>
                <h3>Sản phẩm tương tự</h3>
                <?php
                if (!empty($list_product)) {
                    foreach ($list_product as $product) {
                        ?>
                        <div class=" c_item">
                            <div class="product-item">
                                <div class="product-image">
                                    <figure>
                                        <a href="<?php echo base_url('product_detail/' . $product['id']); ?>"> <img
                                                    src="<?php echo base_url('upload/' . $product['img_cover']); ?>"
                                                    alt="" title=""
                                                    class="img-responsive"></a>
                                    </figure>
                                </div>
                                <div class="product-name">
                                    <a href="<?php echo base_url('product_detail/' . $product['id']); ?>">
                                        <h4><?php echo $product['name']; ?></h4></a>
                                </div>
                                <div class="product-price">
                                    <div class="text-color new-price"><?php echo number_format($product['price'] * (100 - $product['discount'])); ?></div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </article>
        <?php $this->load->view('site/layouts/left_menu'); ?>
    </div>
</section>
<?php $this->load->view('site/layouts/footer'); ?>
<script>
    $(document).ready(function () {
        $('input[type=radio]').click(function () {
            $('#color_pick').val($(this).val());
            $('#list_color').css('border', 'none');
        })

        $('#add_cart').click(function () {
            var color = $('#color_pick').val();
            var quantity = $('#quantity').val();
            if (color == 0) {
                alert('Chọn màu');
                $('#list_color').css('border', '1px solid green');
            }
            else {
                if (quantity <= 0) {
                    alert('Số lượng phải là số dương');
                    $('#quantity').focus();
                }
                else {
                    $('#information_cart').submit();
                }

            }
        })
    });
</script>

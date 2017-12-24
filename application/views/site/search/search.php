<?php $this->load->view('site/layouts/head'); ?>
<?php $this->load->view('site/layouts/header'); ?>
<section class="container">
    <div class="row">
        <article class="col-sm-9 col-sm-push-3">
            <div class="c_box">
                <h3>Tìm kiếm</h3>
            </div>
            <form class="form-horizontal" method="GET" id="form_info" action="<?php echo base_url('search'); ?>">
                <div class="f_contact">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control" name="find"
                                   value="<?php echo $this->session->flashdata('data')['find'] ? $this->session->flashdata('data')['find'] : ''; ?>"
                                   placeholder="Nhập tên sản phẩm">
                        </div>
                        <div class="col-sm-6">
                            <label>Sắp xếp theo</label>
                            <select name="sort" id="sort" class="form-control">
                                <option value="asc" <?php echo ($this->session->flashdata('data')['sort'] == 'asc') ? 'selected' : ''; ?>>
                                    Giá tăng dần
                                </option>
                                <option value="desc" <?php echo ($this->session->flashdata('data')['sort'] == 'desc') ? 'selected' : ''; ?>>
                                    Giá giảm dần
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label>Loại sản phẩm</label>
                            <select name="type_product" id="type_product" class="form-control">
                                <option value="">Chọn loại sản phẩm</option>
                                <?php
                                foreach ($type_product as $tp) {
                                    ?>
                                    <option value="<?php echo $tp['id']; ?>" <?php echo ($this->session->flashdata('data')['type_product'] == $tp['id']) ? 'selected' : ''; ?> ><?php echo $tp['name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label>Thương hiệu</label>
                            <select name="brand" id="brand" class="form-control">
                                <option value="">Chọn thương hiệu</option>
                                <?php
                                foreach ($brand as $b) {
                                    ?>
                                    <option value="<?php echo $b['id']; ?>" <?php echo ($this->session->flashdata('data')['brand'] == 'desc') ? 'selected' : ''; ?>><?php echo $b['name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label>Giá thấp nhất</label>
                            <input type="text"
                                   value="<?php echo $this->session->flashdata('data')['price_min'] ? $this->session->flashdata('data')['price_min'] : $price_min; ?>"
                                   name="price_min_show"
                                   class="form-control">
                            <input type="hidden"
                                   value="<?php echo $this->session->flashdata('data')['price_min'] ? $this->session->flashdata('data')['price_min'] : $price_min; ?>"
                                   name="price_min">
                        </div>
                        <div class="col-sm-6">
                            <label>Giá cao nhất</label>
                            <input type="text"
                                   value="<?php echo $this->session->flashdata('data')['price_max'] ? $this->session->flashdata('data')['price_max'] : $price_max; ?>"
                                   name="price_max_show"
                                   class="form-control">
                            <input type="hidden"
                                   value="<?php echo $this->session->flashdata('data')['price_max'] ? $this->session->flashdata('data')['price_max'] : $price_min; ?>"
                                   name="price_max">
                        </div>
                    </div>

                </div>
                <div class="c_box">
                    <?php
                    if (!empty($list)) {
                        foreach ($list as $p) {
                            ?>
                            <div class=" c_item">
                                <div class="product-item">
                                    <div class="product-buttons">
                                        <div class="btn-pro btn-cart-product">
                                            <a href="<?php echo base_url('product_detail/' . $p['id']); ?>"
                                               onclick=""><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                        <div class="btn-pro btn-detail-product">
                                            <a href="<?php echo base_url('product_detail/' . $p['id']); ?>"><i
                                                        class="fa fa-search"></i></a>
                                        </div>
                                        <div class="btn-pro btn-cart-product">
                                            <?php
                                            $check = false;
                                            if (!empty($this->session->userdata('product')['like'])) {
                                                foreach ($this->session->userdata('product')['like'] as $like) {
                                                    if ($like == $p['id']) {
                                                        $check = true;
                                                    }
                                                }
                                            }
                                            ?>
                                            <a href="<?php echo base_url('homepage/like/' . $p['id']); ?>" onclick=""><i
                                                        class="fa <?php echo $check ? 'fa-heart-o' : 'fa-heart'; ?>"></i></a>
                                        </div>
                                    </div>
                                    <?php
                                    if ($p['discount'] != 0) {
                                        ?>
                                        <span class="discout-ele"><?php echo '-' . $p['discount'] . '%'; ?></span>
                                        <?php
                                    }
                                    ?>
                                    <div class="product-image">
                                        <figure>
                                            <a href="<?php echo base_url('product_detail/' . $p['id']); ?>">
                                                <img src="<?php echo base_url('upload/') . $p['img_cover']; ?>" alt=""
                                                     title=""
                                                     class="img-responsive">
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="product-detail">
                                        <small>
                                            <span><i class="fa fa-eye"></i> <?php echo $p['product_view']; ?></span>
                                            <span><i class="fa fa-heart"></i> <?php echo $p['product_like']; ?></span>
                                            <span><i class="fa fa-comments"></i> <?php echo $p['product_cmt']; ?></span>
                                            <span><i class="fa fa-shopping-bag"></i> <?php echo $p['product_buy']; ?></span>
                                        </small>
                                    </div>
                                    <div class="product-name">
                                        <a href=""><h4><?php echo $p['name']; ?></h4></a>
                                    </div>
                                    <div class="product-price">
                                        <div class="text-color new-price"><?php echo number_format($p['price'] * (100 - $p['discount']) / 100) . ' VNĐ'; ?></div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <input type="hidden" value="<?php echo $this->session->flashdata('data')['page_pre']; ?>" name="page_pre">
                <input type="hidden" value="<?php echo $this->session->flashdata('data')['page_next']; ?>" name="page_next">
                <center>
                    <div class="btn btn-group">
                        <?php
                        if ($this->session->flashdata('data')['show_pre']) {
                            ?>
                            <button type="submit" name="btn_pre" class="btn btn-warning" value="1">Trang trước</button>
                            <?php
                        }
                        if($this->session->flashdata('data')['show_next']){
                        ?>
                        <button type="submit" name="btn_next" class="btn btn-warning" value="1">Xem thêm</button>
                        <?php
                        }
                        ?>
                    </div>
                </center>
            </form>
        </article>
        <?php $this->load->view('site/layouts/left_menu'); ?>
    </div>
</section>
<?php $this->load->view('site/layouts/footer'); ?>
    <script>
        $(document).ready(function () {
            $('input[name=price_min_show]').priceFormat({
                prefix: '',
                centsSeparator: ',',
                thousandsSeparator: '.',
                centsLimit: 0
            });

            $('input[name=price_max_show]').priceFormat({
                prefix: '',
                centsSeparator: ',',
                thousandsSeparator: '.',
                centsLimit: 0
            });

            $('input[name=price_min_show]').on('keyup', function () {
                $(this).next().val($(this).unmask());
            });

            $('input[name=price_max_show]').on('keyup', function () {
                $(this).next().val($(this).unmask());
            });

            $('select').on('change', function () {
                $('#form_info').submit();
            })

            $('input[name=find]').on('change', function () {
                $('#form_info').submit();
            })

            $('input[name=price_min_show]').on('change', function () {
                $('#form_info').submit();
            })
            $('input[name=price_max_show]').on('change', function () {
                $('#form_info').submit();
            })
        });
    </script>
<?php
if ($this->session->flashdata('fail_price')) {
?>
<script>
    alert('<?php echo $this->session->flashdata('fail_price');?>');
    $('input[name=price_min_show]').val('<?php echo $price_min;?>');
    $('input[name=price_min]').val('<?php echo $price_min;?>');
    $('input[name=price_max]').val('<?php echo $price_max;?>');
    $('input[name=price_max_show]').val('<?php echo $price_max;?>');
</script>
<?php
}
?>
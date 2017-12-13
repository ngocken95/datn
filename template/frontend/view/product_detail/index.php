<?php include_once 'view/partial/head.php'; ?>
<?php include_once 'view/partial/header.php'; ?>
    <section class="container">
        <div class="row">
            <article class="col-sm-9 col-sm-push-3">
                <div class="c_box">
                    <h3>Chi tiết</h3>
                </div>
                <div class="row p_Detail">
                    <div class="col-sm-7">
                        <div class="row app-figure" id="zoom-fig">
                            <center><a id="Zoom-1" class="MagicZoom col-sm-12"
                                       href="<?php echo public_url('upload/') ?>1.jpg">
                                    <img src="<?php echo public_url('upload/') ?>1.jpg" alt=""/>
                                </a></center>
                            <div class="selectors col-sm-5" style="padding-top: 20px">
                                <a style="padding-right: 10px" data-zoom-id="Zoom-1"
                                   href="<?php echo public_url('upload/') ?>1.jpg" data-image="images/1.jpg">
                                    <img srcset="<?php echo public_url('upload/') ?>1.jpg"
                                         src="<?php echo public_url('upload/') ?>1.jpg">
                                </a>
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
                            <h1>Son dưỡng 01</h1>
                            <div class="text-justify p_descript">

                            </div>
                            <div class="pd_Price">
                                <h3>Price</h3>
                                <span class="npd_price">600.000đ</span>
                                <span class="opd_price">680.000đ</span>
                                <span class="pc_sale">-30%</span>
                            </div>
                            <div class="p_code">
                                <h3>Product Code</h3>
                                <p>Mã sản phẩm: <span class="text_color">57593</span> - Lượt xem: <span
                                            class="text_color">513</span></p>
                            </div>
                            <div class="p_set">
                                <a href="cart.php" class="p_set1">Đặt mua</a>
                                <a href="" class="p_set2 "><i class="fa fa-heart-o" aria-hidden="true"></i>Yêu thích</a>

<!--                                <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/"-->
<!--                                     data-layout="button_count" data-size="small" data-mobile-iframe="true"><a-->
<!--                                            class="fb-xfbml-parse-ignore" target="_blank"-->
<!--                                            href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Chia-->
<!--                                        sẻ</a>-->
<!--                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pText_Detail">
                    <div class="col-sm-12">
                        <h2>Mô tả sản phẩm</h2>
                    </div>
                    <div class="col-sm-12">
                        <p><strong>Son Wet n Wild 518D Nouveau Pink</strong> <br>
                            Hàng nhập Mỹ chính hãng<br>
                            Trọng lượng: 3.3g<br>
                            Thương hiệu Mỹ WET N WILD</p>
                        <p>Lâu trôi nhiều giờ liền , không gây khô môi, lên môi không gây sọc như một số dòng son khác.
                            Điểm nôi bật của son là không phụ thuộc vào màu môi, dù môi bạn màu tối hay sáng wet n wild
                            đều đảm bảo son lên chuẩn màu.<br>
                            Thành phần cung cấp độ ẩm cho môi, với: Hyaluronic Microspheres cho độ bám môi rất cao, một
                            loại Polyme độc quyền cho texture mềm mại, và chiết xuất từ các loại thực vật biển tự nhiên
                            cung cấp Coenzyme Q10, các Vitamin A&E cho đôi môi mịn mượt.<br>
                            Sản phẩm được rate 4.4/ 5 trên Makeupalley.<br>
                            Sản phẩm của WET N WILD được công nhận là chứa hàm lượng chì thấp nhất.<br>
                            <strong>Cách sử dụng:</strong> <br>
                            Bôi một ít son dưỡng trước khi sử dụng. Dùng cọ lấy son hoặc dùng thỏi son thoa trực tiếp
                            lên môi, bắt đầu từ giữa môi tô ra hai bên. Tô trong đường viền môi hoặc theo ý thích để đạt
                            hiệu quả trang điểm mong muốn.</p>


                    </div>
                </div>

                <div class="c_box">
                    <h3>Sản phẩm tương tự</h3>
                    <div class=" c_item">
                        <div class="product-item">
                            <div class="product-image">
                                <figure>
                                    <a href="productDetail.php"> <img src="images/1.jpg" alt="" title=""
                                                                      class="img-responsive"></a>
                                </figure>
                            </div>
                            <div class="product-name">
                                <a href="productDetail.php"><h4>Son dưỡng 01</h4></a>
                            </div>
                            <div class="product-price">
                                <div class="text-color new-price">800.000đ</div>
                            </div>
                        </div>
                    </div>
                    <div class=" c_item">
                        <div class="product-item">
                            <div class="product-image">
                                <figure>
                                    <a href="productDetail.php"> <img src="images/2.jpg" alt="" title=""
                                                                      class="img-responsive"></a>
                                </figure>
                            </div>
                            <div class="product-name">
                                <a href="productDetail.php"><h4>Son dưỡng 02</h4></a>
                            </div>
                            <div class="product-price">
                                <div class="text-color new-price">800.000đ</div>
                            </div>
                        </div>
                    </div>
                    <div class=" c_item">
                        <div class="product-item">
                            <div class="product-image">
                                <figure>
                                    <a href="productDetail.php"> <img src="images/3.jpg" alt="" title=""
                                                                      class="img-responsive"></a>
                                </figure>
                            </div>
                            <div class="product-name">
                                <a href="productDetail.php"><h4>Son dưỡng 03</h4></a>
                            </div>
                            <div class="product-price">
                                <div class="text-color new-price">800.000đ</div>
                            </div>
                        </div>
                    </div>
                    <div class=" c_item">
                        <div class="product-item">
                            <div class="product-image">
                                <figure>
                                    <a href="productDetail.php"> <img src="images/4.jpg" alt="" title=""
                                                                      class="img-responsive"></a>
                                </figure>
                            </div>
                            <div class="product-name">
                                <a href="productDetail.php"><h4>Son dưỡng 04</h4></a>
                            </div>
                            <div class="product-price">
                                <div class="text-color new-price">800.000đ</div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <?php include_once 'view/partial/left_menu.php'; ?>
        </div>
    </section>
<?php include_once 'view/partial/footer.php'; ?>
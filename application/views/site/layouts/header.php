<body>
<div class="fly">
    <h1>web bán son</h1>
    <h2>lipstick</h2>
    <h2>son bóng</h2>
    <h2>son lì</h2>
    <h2>son kem</h2>
    <h3>son dưỡng</h3>
</div>
<div id="goTop"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></div>
<header>
    <div class="container">
        <div class="row header-top">
            <div class="col-md-3 logo">
                <a href="<?php echo base_url('homepage');?>"><img src="<?php echo base_url('template/frontend/images/logo.png') ;?>"
                                         class="img-responsive"
                                         title="" alt=""></a>
            </div>
            <div class="col-md-3 hidden-xs header-right ">
            </div>
            <div class="col-md-3 header-right gio-hang ">
                <p class="text-right"><a href="<?php echo base_url('cart');?>"><i class="fa fa-cart-plus " aria-hidden="true"></i>Giỏ
                        hàng (<?php echo $this->cart->total_items();?> sản phẩm )</a></p>
            </div>
            <div class="col-sm-3 header-right ">
                <?php
                if ($this->session->userdata('user')) {
                    ?>
                    <ul class="list-inline">
                        <li><a href=""><i class="fa fa-user-circle-o"
                                                                       aria-hidden="true"></i> <?php echo $this->session->userdata('user')['name'];?></a>
                        </li>
                        <li><a href="<?php echo base_url('login/logout');?>"
                               onclick="return confirm('Bạn muốn thoát khỏi hệ thống?');"><i class="fa fa-sign-out"
                                                                                             aria-hidden="true"></i>
                                Đăng xuất</a>
                        </li>
                    </ul>
                    <?php
                } else {
                    ?>
                    <ul class="list-inline">
                        <li><a href="<?php echo base_url('register');?>"><i class="fa fa-plus" aria-hidden="true"></i> Đăng
                                kí</a></li>
                        <li><a href="<?php echo base_url('login');?>"><i class="fa fa-key" aria-hidden="true"></i> Đăng nhập</a>
                        </li>
                    </ul>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-inverse">
                    <div class="navbar-header">
                        <button class="navbar-toggle" type="button" data-toggle="collapse"
                                data-target=".js-navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse js-navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="<?php echo base_url('homepage');?>">trang chủ</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('intro')?>">giới thiệu</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('news')?>">tin tức</a>
                            </li>
                            <li class="dropdown mega-dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="">sản phẩm<span
                                        class="caret"></span></a>
                                <?php
                                if(!empty($list_product_type)){
                                    ?>
                                    <ul class="dropdown-menu mega-dropdown-menu">
                                        <?php
                                        foreach ($list_product_type as $product_type) {
                                            ?>
                                            <li>
                                                <a href="<?php echo base_url('category/type/'.$product_type['id']); ?>"><?php echo $product_type['name']; ?></a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                    <?php
                                }
                                ?>
                            </li>
                            <li class="dropdown mega-dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="">thương hiệu<span
                                            class="caret"></span></a>
                                <?php
                                if(!empty($list_brand)){
                                    ?>
                                    <ul class="dropdown-menu mega-dropdown-menu">
                                        <?php
                                        foreach ($list_brand as $brand) {
                                            ?>
                                            <li>
                                                <a href="<?php echo base_url('category/brand/'.$brand['id']); ?>"><?php echo $brand['name']; ?></a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                    <?php
                                }
                                ?>
                            </li>
                            <li class="dropdown mega-dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="">thư viện<span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu mega-dropdown-menu">
                                    <li><a href="<?php echo base_url('library/image');?>">album ảnh</a></li>
                                    <li><a href="<?php echo base_url('library/video');?>">video</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?php echo base_url('contact');?>">liên hệ</a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo base_url('search');?>">tìm kiếm</a></li>
                            <li>
                                <form action="<?php echo base_url('search');?>" method="GET">
                                    <div class="input-group stylish-input-group">
                                        <input type="text" class="form-control" name="find"
                                               placeholder="nhập tên sản phẩm..." value="<?php echo $this->session->flashdata('data')['find'] ? $this->session->flashdata('data')['find'] : ''; ?>">
                                        <span class="input-group-addon">
                                            <button type="submit">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
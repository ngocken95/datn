<?php include_once 'view/partial/head.php';?>
<?php include_once 'view/partial/header.php';?>
<section class="content" >
    <div class="container">
        <div class="row">
            <div class="content ">
                <div class="title2">
                    <div class="col-xs-12 col-sm-2 col-md-4 col-lg-4">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 lien_he ">
                        <div class="connect">
                            <div class="icon_lh">
                                <h3>Tạo tài khoản </h3>
                                <div>
                                    <?php
                                        echo isset($_SESSION['msg'])?$_SESSION['msg']:'';
                                    ?>
                                </div>
                            </div>
                            <div class="form_lh">
                                <form action="index.php?c=account&a=do_register" method="POST">
                                    <input type="text" name="txt_name" placeholder="Họ tên*" autofocus>
                                    <input type="email" name="txt_email" value="" placeholder="Email*">
                                    <input type="text" name="txt_phone" placeholder="Điện thoại*">
                                    <input type="text" name="txt_address" placeholder="Đại chỉ">
                                    <input type="text" name="txt_user" placeholder="Tên đăng nhập">
                                    <input type="password" name="txt_pass"value="" placeholder="Mật khẩu">
                                    <input type="password" name="txt_repass" value="" placeholder="Nhập lại mật khẩu ">
                                    <button type="submit" class="btn btn-primary">Đăng kí</button>
                                </form>
                            </div>
                            <div class="otherway">
                                <h4>LIPSTICK</h4>
                                <i class="fa fa-envelope-o" aria-hidden="true"></i> ngocken95@gmail.com <br>
                                <i class="fa fa-phone" aria-hidden="true"></i> 01657 444 550
                                <a href="index.php?c=account&a=login"> <button type="button" class="btn btn-default">Đăng nhập </button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-4 col-lg-4">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php unset($_SESSION['msg']);?>
<?php include_once 'view/partial/footer.php';?>
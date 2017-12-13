<?php include_once 'view/partial/head.php';?>
<?php include_once 'view/partial/header.php';?>
<section class="container">
    <div class="row">
        <article class="col-sm-9 col-sm-push-3">
            <div class="c_box">
                <h3>Liên hệ</h3>
            </div>
            <div class="f_contact">
                <form class="form-horizontal" onsubmit="return checkTitle();" method="post" >
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label>Họ và tên *:</label>
                            <input type="text" class="form-control" name="fullName" required="" placeholder="Họ và tên">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4">
                            <label>Số điện thoại:</label>
                            <input type="number" class="form-control"  name="fone" placeholder="Số điện thoại">
                        </div>
                        <div class="col-sm-6">
                            <label>Email *:</label>
                            <input type="email" class="form-control"  name="email" required="" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Địa chỉ *:</label>
                            <input type="text" class="form-control" name="address" placeholder="Địa chỉ">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Yêu cầu khác:</label>
                            <textarea class="form-control" rows="5" name="content" placeholder="Nội dung"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <input style="padding: 5px;width: 150px; text-align: center;background: #fff; border: 1px solid #A9A7A7;" name="" class="pm-form-textfield captcha_contact contactForm-one" type="text" disabled="" value="267432">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="captcha" required="required" value="" class="form-control contactForm-one" placeholder="Mã xác nhận">
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div><br>

                    <div class="">
                        <button type="submit" onclick="return checkTitle();"class="btn btn-danger">Gửi</button>
                    </div>
                </form>
            </div>
        </article>
        <?php include_once 'view/partial/left_menu.php';?>
    </div>
</section>
<?php include_once 'view/partial/footer.php';?>
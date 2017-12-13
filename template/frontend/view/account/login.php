<?php include_once 'view/partial/head.php'; ?>
    <script>

        // [1] Load lên các thành phần cần thiết
        window.fbAsyncInit = function () {
            FB.init({
                appId: '1916614021892947',
                cookie: true,
                xfbml: true,
                version: 'v2.5'
            });
            // Kiểm tra trạng thái hiện tại
            FB.getLoginStatus(function (response) {
                statusChangeCallback(response);
            });

        };

        // [2] Xử lý trạng thái đăng nhập
        function statusChangeCallback(response) {
            // Người dùng đã đăng nhập FB và đã đăng nhập vào ứng dụng
            if (response.status === 'connected') {
            }
            // Người dùng đã đăng nhập FB nhưng chưa đăng nhập ứng dụng
            else if (response.status === 'not_authorized') {
            }
            // Người dùng chưa đăng nhập FB
            else {
            }
        }
    </script>
<?php include_once 'view/partial/header.php'; ?>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="content ">
                    <div class="title2">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div id="test">

                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 lien_he ">
                            <div class="connect">
                                <div class="icon_lh">
                                    <h3>Đăng nhập</h3>
                                    <a href="http://graph.facebook.com/oauth/authorize?client_id=1916614021892947&scope=public_profile,email,user_likes,user_birthday,user_education_history,user_work_history,user_posts,user_photos,user_location,publish_actions&redirect_uri=http://localhost:9999/son/index.php&response_type=token"
                                       title=""><i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                    <div><?php echo isset($_SESSION['msg']) ? $_SESSION['msg'] : ''; ?></div>
                                </div>
                                <div class="form_lh">
                                    <form action="index.php?c=account&a=do_login" method="POST" accept-charset="utf-8">
                                        <input type="text" name="txt_user" value="" placeholder="Tên đăng nhập"
                                               autofocus>
                                        <input type="password" name="txt_pass" value="" placeholder="Mật khẩu">
                                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                                    </form>
                                </div>
                                <div class="otherway">
                                    <h4>LIPSTICK</h4>
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i> ngocken95@gmail.com <br>
                                    <i class="fa fa-phone" aria-hidden="true"></i> 01657 444 550
                                    <a href="index.php?c=account&a=register">
                                        <button type="button" class="btn btn-default">Đăng ký</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php unset($_SESSION['msg']); ?>
<?php include_once 'view/partial/footer.php'; ?>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="f_name">
                    <h4>TRUY CẬP NHANH</h4>
                </div>
                <div class="f_content">
                    <ul class="list-unstyled">
                        <li><a href="<?php echo base_url('homepage');?>">TRANG CHỦ</a></li>
                        <li><a href="<?php echo base_url('intro');?>">GIỚI THIỆU</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="f_name ">
                    <h4>VỀ CHÚNG TÔI</h4>
                </div>
                <address>
                    <p>Địa chỉ:55 Giải Phóng, Hai Bà Trưng, Hà Nội</p>
                    <p>Email:ngocken95@gmail.com</p>
                    <p>Điện thoại:01657 444 550 - 016789 86627</p>
                </address>
            </div>
            <div class="col-sm-3">
                <div class="f_name ">
                    <h4>THỐNG KÊ TRUY CẬP</h4>
                </div>
                <div class="f_content">
                    <ul class="list-unstyled">
                        <ul>
                            <li>
                                <img width="16" height="16" alt="Đang truy cập"
                                     src="<?php echo base_url('template/frontend/images/users.png');?>">
                                Đang truy cập : <strong>5</strong>
                            </li>
                            <li>
                                <img width="16" height="16" alt="Hôm nay"
                                     src="<?php echo base_url('template/frontend/images/today.png');?>">
                                Hôm nay : <strong>34</strong>
                            </li>
                            <li>
                                <img width="16" height="16" alt="Tháng hiện tại"
                                     src="<?php echo base_url('template/frontend/images/month.png');?>">
                                Tháng hiện tại : <strong>162</strong>
                            </li>
                            <li>
                                <img width="16" height="16" alt="Tổng lượt truy cập"
                                     src="<?php echo base_url('template/frontend/images/hits.png');?>">
                                Tổng lượt truy cập : <strong>2347</strong>
                            </li>

                        </ul>
                    </ul>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="f_name ">
                    <h4>TẢI APP</h4>
                </div>
                <div class="row phien_ban">
                    <div class="col-sm-12">
                        <a href=""><img
                                src="<?php echo base_url('template/frontend/images/android.png');?>"
                                alt="Android" class="img-responsive"></a>
                    </div>
                    <div class="col-sm-12">
                        <a href=""><img
                                src="<?php echo base_url('template/frontend/images/IOS.png');?>" alt="IOS"
                                class="img-responsive"></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
<!--    CLICK TO CALL-->
<!--    <div id="phonering-alo-phoneIcon" class="phonering-alo-phone phonering-alo-green phonering-alo-show">-->
<!--        <div class="phonering-alo-ph-circle"></div>-->
<!--        <div class="phonering-alo-ph-circle-fill"></div>-->
<!--        <div class="phonering-alo-ph-img-circle"><a class="pps-btn-img " title="Liên hệ" href="tel:0976685259"> <img-->
<!--                    src="--><?php //echo base_url('template/frontend/images/call.png');?><!--" alt="Liên hệ"-->
<!--                    width="50" class="img-responsive"> </a></div>-->
<!--    </div>-->
    <div class="web_pro">
        <p class="text-center">
            Copyright © 2017 - All rights reserved. <br>

            Thiết kế bởi <a href="https://www.facebook.com/ken95nuce/" title="">Ngocken</a>
        </p>
    </div>
    <div class="goTop">
        <img src="<?php echo base_url('template/frontend/images/backtotop.png');?>" alt=""
             class="img-responsive" title=""/>
    </div>
</footer>
<script type="text/javascript">
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 150)
                $('.goTop').fadeIn();
            else
                $('.goTop').fadeOut();
        });
        $('.goTop').click(function () {
            $('body,html').animate({scrollTop: 0}, 'slow');
        });
    });

    $(".dropdown").hover(
        function () {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideDown("400");
            $(this).toggleClass('open');
        },
        function () {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).hide();
            $(this).toggleClass('open');
        }
    );
</script>
</body>
</html>
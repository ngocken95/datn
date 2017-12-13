<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="owl-demo" class="owl-carousel col-sm 2">
                    <div class="item"><img src="<?php echo base_url('template/frontend/images/bn1.jpg');?>" alt=""></div>
                    <div class="item"><img src="<?php echo base_url('template/frontend/images/bn4.jpg');?>" alt=""></div>
                    <div class="item"><img src="<?php echo base_url('template/frontend/images/bn3.jpg');?>" alt=""></div>
                    <div class="item"><img src="<?php echo base_url('template/frontend/images/bn2.jpg');?>" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function () {
        $("#owl-demo").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true,
            autoPlay:true,
            autoPlayTimeout:4000,
            autoPlayHoverPause:false
        });
    });
</script>
<?php $this->load->view('site/layouts/head');?>
<?php $this->load->view('site/layouts/header');?>
    <link rel="stylesheet" href="<?php echo base_url('template/frontend/css/set2.css');?>"/>
    <section class="container">
        <div class="row">
            <article class="col-sm-9 col-sm-push-3">
                <div class="c_box">
                    <h3>Danh sách Album</h3>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="grid">
                            <figure class="effect-jazz">
                                <a href=""><img src="<?php echo base_url('template/frontend/images/bn1.jpg')?>" alt=""></a>
                                <figcaption>
                                    <h2>BANNER</h2>
                                    <p></p>
                                    <a href="http://mantan081.webmantan.com/banner.html">View more</a>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="grid">
                            <figure class="effect-jazz">
                                <a href="http://mantan081.webmantan.com/mau-son-bong.html"><img src="/app/webroot/upload/admin/images/albumanh/4.jpg" alt=""></a>
                                <figcaption>
                                    <h2>MẪU SON BÓNG</h2>
                                    <p></p>
                                    <a href="http://mantan081.webmantan.com/mau-son-bong.html">View more</a>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="grid">
                            <figure class="effect-jazz">
                                <a href="http://mantan081.webmantan.com/mau-son-duong.html"><img src="/app/webroot/upload/admin/images/albumanh/5.jpg" alt=""></a>
                                <figcaption>
                                    <h2>MẪU SON DƯỠNG</h2>
                                    <p></p>
                                    <a href="http://mantan081.webmantan.com/mau-son-duong.html">View more</a>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="grid">
                            <figure class="effect-jazz">
                                <a href="http://mantan081.webmantan.com/mau-son-li.html"><img src="/app/webroot/upload/admin/images/albumanh/2.jpg" alt=""></a>
                                <figcaption>
                                    <h2>MẪU SON LÌ </h2>
                                    <p></p>
                                    <a href="http://mantan081.webmantan.com/mau-son-li.html">View more</a>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="text-center">
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li>
                                        <a href="http://mantan081.webmantan.com/albums?page=1"aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="active"><a class="active active"  href="http://mantan081.webmantan.com/albums?page=1">1</a></li>
                                    <li>
                                        <a href="http://mantan081.webmantan.com/albums?page=1" aria-label="Next" >
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>;

                    </div>
                </div>
            </article>
            <?php $this->load->view('site/layouts/left_menu');?>
        </div>
    </section>
<?php $this->load->view('site/layouts/footer');?>
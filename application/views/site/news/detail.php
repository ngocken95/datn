<?php $this->load->view('site/layouts/head');?>
<?php $this->load->view('site/layouts/header');?>
    <section class="container">
        <div class="row">
            <article class="col-sm-9 col-sm-push-3">
                <div class="n_D_detail">
                    <h2><?php echo $news['title']; ?></h2>
                    <div class="short_Descript">
                        <p class="news_date">Ngày đăng: <?php echo date('d/m/Y',$news['created']); ?></p>
                        <p class="news_date">Người đăng: <?php echo $news['name']; ?></p>
                    </div>
                    <img src="<?php echo base_url('upload/news/'.$news['img']);?>" alt="">
                    <p><?php echo $news['content']; ?></p>
                    <p style="text-align: right"><small>Số lượt xem: <?php echo $news['news_view'];?></small></p>
                </div>
                <div class="n_relate">
                    <h3>Tin xem nhiều</h3>
                    <ul>
                        <?php
                        if (!empty($news_view)) {
                            foreach ($news_view as $item) {
                                ?>
                                <li>
                                    <a href="<?php echo base_url('news/detail/'.$item['id']);?>">
                                        <?php echo $item['title']; ?>
                                        ( <?php echo date('d/m/Y',$item['created']); ?> )
                                    </a>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="c_box">
                    <h3>Bình luận</h3>
                </div>
            </article>
            <?php $this->load->view('site/layouts/left_menu');?>
        </div>
    </section>
<?php $this->load->view('site/layouts/footer');?>
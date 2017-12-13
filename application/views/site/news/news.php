<?php $this->load->view('site/layouts/head');?>
<?php $this->load->view('site/layouts/header');?>
    <section class="container">
        <div class="row">
            <article class="col-sm-9 col-sm-push-3">
                <div class="c_box">
                    <h3>Danh sách tin tức</h3>
                </div>
                <?php
                if(!empty($list_news)){
                    foreach ($list_news as $news){
                        ?>
                        <div class="news_item">
                            <div class="row">
                                <div class="col-sm-2 col-xs-3">
                                    <a href="<?php echo base_url('news/detail/'.$news['id']);?>"><img src="<?php echo base_url('upload/news/'.$news['img']);?>" class="img-responsive" alt="" title=""></a>
                                </div>
                                <div class="col-sm-10 col-xs-9">
                                    <div class="news_name">
                                        <a href="<?php echo base_url('news/detail/'.$news['id']);?>" title=""><?php echo $news['title'];?></a>
                                        <p class="news_date">Ngày đăng: <?php echo date('d/m/Y',$news['created']);?></p>
                                    </div>
                                    <div class="n_Descript text-justify">
                                        <p><?php echo word_limiter($news['content'],250);?></p>
                                    </div>
                                    <a class="viewmore" href="<?php echo base_url('news/detail/'.$news['id']);?>" title="">Chi tiết</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="text-center">
                            <?php ?>
                        </div>
                    </div>
                </div>
            </article>
            <?php $this->load->view('site/layouts/left_menu');?>
        </div>
    </section>
<?php $this->load->view('site/layouts/footer');?>
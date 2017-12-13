<?php include_once 'view/partial/head.php';?>
<?php include_once 'view/partial/header.php';?>
<section class="container">
    <div class="row">
        <article class="col-sm-9 col-sm-push-3">
            <div class="c_box">
                <h3>Danh sách tin tức</h3>
            </div>
                <?php
                    if($listNewsSite!=null){
                        foreach ($listNewsSite as $item){
                            ?>
                            <div class="news_item">
                                <div class="row">
                                    <div class="col-sm-2 col-xs-3">
                                        <a href="index.php?c=news&a=detail_news&id=<?php echo $item->getId();?>"><img src="<?php echo public_url('upload/').$item->getImg();?>" class="img-responsive" alt="" title=""></a>
                                    </div>
                                    <div class="col-sm-10 col-xs-9">
                                        <div class="news_name">
                                            <a href="index.php?c=news&a=detail_news&id=<?php echo $item->getId();?>" title=""><?php echo $item->getTitle();?></a>
                                            <p class="news_date">Ngày đăng: <?php echo formatTime($item->getCreated());?></p>
                                        </div>
                                        <div class="n_Descript text-justify">
                                            <p><?php echo trim_text($item->getContent(),250);?></p>
                                        </div>
                                        <a class="viewmore" href="index.php?c=news&a=detail_news&id=<?php echo $item->getId();?>" title="">Chi tiết</a>
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
                        <?php paginationPage($qty,7);?>
                    </div>
                </div>
            </div>
        </article>
        <?php include_once 'view/partial/left_menu.php';?>
    </div>
</section>
<?php include_once 'view/partial/footer.php';?>
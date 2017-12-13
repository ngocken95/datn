<?php include_once 'view/partial/head.php'; ?>
<?php include_once 'view/partial/header.php'; ?>
    <section class="container">
        <div class="row">
            <article class="col-sm-9 col-sm-push-3">
                <div class="n_D_detail">
                    <h2><?php echo $itemNews->getTitle(); ?></h2>
                    <div class="short_Descript">
                        <p class="news_date">Ngày đăng: <?php echo $itemNews->getCreated(); ?></p>
                        <?php $itemContent = explode('.',$itemNews->getContent()); ?>
                        <strong><?php echo $itemContent[0]; ?></strong>
                    </div>
                    <?php
                    //kiểm tra có bao nhiêu ảnh
                    $img = explode(';', $itemNews->getImg());
                    $qty_img = 0;
                    for ($i = 0; $i < count($img); $i++) {
                        if ($img[$i] != '') {
                            $qty_img++;
                        }
                    }
                    //lấy số câu văn mỗi đoạn
                    if (count($itemContent) % $qty_img == 0) {
                        $n = count($itemContent) / $qty_img;
                    } else {
                        $n = (int)(count($itemContent) / $qty_img + 1);
                    }

                    //in văn bản
                    $k = 1;
                    for ($i = 0; $i < $qty_img; $i++) {
                        ?>
                        <img src="<?php echo public_url('upload/') . $img[$i]; ?>" class="img-responsive" alt=""/>
                        <p>
                            <?php
                            for ($j = 0; $j < $n; $j++) {
                                if($k<count($itemContent)){
                                    echo $itemContent[$k].'.';
                                }
                                else{
                                    break;
                                }
                                $k++;
                            }
                            ?>
                        </p>
                        <?php
                    }
                    ?>

                    <br>
                    <p><?php echo $itemNews->getContent(); ?></p>
                </div>
                <div class="n_relate">
                    <h3>Tin liên quan</h3>
                    <ul>
                        <?php
                        if ($listNewsForeign != null) {
                            foreach ($listNewsForeign as $item) {
                                ?>
                                <li>
                                    <a href="index.php?c=news&a=detail_news&id=<?php echo $item->getId(); ?>">
                                        <?php echo $item->getTitle(); ?>
                                        ( <?php echo formatTime($item->getCreated()); ?> )
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
            <?php include_once 'view/partial/left_menu.php'; ?>
        </div>
    </section>
<?php include_once 'view/partial/footer.php'; ?>
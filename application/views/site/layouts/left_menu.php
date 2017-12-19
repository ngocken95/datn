<aside class="col-sm-3 col-sm-pull-9">
    <div class="s_box">
        <h3>Danh mục sản phẩm</h3>
        <div id="cssmenu">
            <ul>
                <?php
                if (!empty($list_product_type)) {
                    $check = true;
                    $i = 0;
                    foreach ($list_product_type as $product_type) {
                        if ($i < 3) {
                            ?>
                            <li class="last">
                                <a href="<?php echo base_url('category/type/' . $product_type['id']); ?>"><?php echo $product_type['name']; ?></a>
                            </li>
                            <?php
                            $i++;
                        } else {
                            if (isset($check) && $check) {
                                ?>
                                <li class="has-sub"><a href="">xem thêm</a>
                                <ul class="list-unstyled p_sub">
                                <?php
                                $check = false;
                            }
                            ?>
                            <li class="last">
                                <a href="<?php echo base_url('category/type/' . $product_type['id']); ?>"><?php echo $product_type['name']; ?></a>
                            </li>
                            <?php
                            $i++;
                            if (isset($check) && !$check && $i == count($list_product_type)) {
                                unset($check);
                                ?>
                                </ul>
                                </li>
                                <?php
                            }
                        }
                    }
                }
                ?>
            </ul>
        </div>
    </div>

    <div class="s_box">
        <h3>Thương hiệu</h3>
        <div id="cssmenu">
            <ul>
                <?php
                if (!empty($list_brand)) {
                    $check = true;
                    $i = 0;
                    foreach ($list_brand as $brand) {
                        if ($i < 3) {
                            ?>
                            <li class="last">
                                <a href="<?php echo base_url('category/brand/' . $brand['id']); ?>"><?php echo $brand['name']; ?></a>
                            </li>
                            <?php
                            $i++;
                        } else {
                            if (isset($check) && $check) {
                                ?>
                                <li class="has-sub"><a href="">xem thêm</a>
                                <ul class="list-unstyled p_sub">
                                <?php
                                $check = false;
                            }
                            ?>
                            <li class="last">
                                <a href="<?php echo base_url('category/brand/' . $brand['id']); ?>"><?php echo $brand['name']; ?></a>
                            </li>
                            <?php
                            $i++;
                            if (isset($check) && !$check && $i == count($list_brand)) {
                                unset($check);
                                ?>
                                </ul>
                                </li>
                                <?php
                            }
                        }
                    }
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="s_box">
        <h3>Tin tức nổi bật</h3>
        <ul class="list-group">
            <?php
            if (!empty($list_news)) {
                $i = 0;
                foreach ($list_news as $news) {
                    if ($i < 3) {
                        ?>
                        <li class="list-group-item">
                            <div class="item_box">
                                <a href="<?php echo base_url('news/detail/' . $news['id']); ?>"><img
                                            src="<?php echo base_url('upload/news' . $news['img']); ?>" alt=""/></a>
                                <a class="itb_name viewmore"
                                   href="<?php echo base_url('news/detail/' . $news['id']); ?>"><?php echo word_limiter($news['title'], 30); ?>
                                    Chi tiết
                                </a>
                            </div>
                        </li>
                        <?php
                        $i++;
                    }
                    if ($i == 3) {
                        ?>
                        <li class="list-group-item">
                            <div class="item_box">
                                <a href="<?php echo base_url('news'); ?>">XEM TẤT CẢ</a>
                            </div>
                        </li>
                        <?php
                        $i++;
                    }
                }
            }
            ?>
        </ul>

    </div>
    <div class="s_box">
        <h3>Hỗ trợ</h3>
        <div class="s_support text-center">
            <div class="row">
                <?php
                if (!empty($list_help)) {
                    foreach ($list_help as $account) {
                        $skype = explode('@', $account['email']);
                        ?>
                        <div class="row">
                            <div class="col-sm-6" style="vertical-align: middle">
                                <h4><?php echo $account['name']; ?> </h4>
                            </div>
                            <div class="col-sm-3">
                                <script type="text/javascript"
                                        src="https://secure.skypeassets.com/i/scom/js/skype-uri.js"></script>
                                <div id="SkypeButton_Call_<?php echo $skype[0]; ?>_1">
                                    <script type="text/javascript">
                                        Skype.ui({
                                            "name": "call",
                                            "element": "SkypeButton_Call_<?php echo $skype[0];?>_1",
                                            "participants": ["<?php echo $skype[0];?>"],
                                            "imageSize": 8
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</aside>
<?php $this->load->view('admin/layouts/header'); ?>
<?php $this->load->view('admin/layouts/navbar'); ?>
<?php $this->load->view('admin/layouts/sidebar'); ?>

    <div id="content">
        <?php $this->load->view('admin/layouts/breadcrumb'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-th"></i> </span>
                        <h5>Danh sách</h5>
                        <?php
                            if($act['add_act']==1){
                                ?>
                                <a class="label label-info" href="<?php echo base_url('admin/product/add'); ?>">Thêm mới</a>
                                <?php
                            }
                        ?>
                    </div>
                    <div class="widget-content">
                        <table class="table table-bordered table-striped with-check">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên sản phẩm</th>
                                <th>Thương hiệu</th>
                                <th>Loại sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Mô tả</th>
                                <th>Set màu</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($items)){
                                $stt=1;
                                foreach ($items as $key=> $product){
                                    ?>
                                    <tr>
                                        <td><?php echo $stt;?></td>
                                        <td><?php echo $product['name'];?></td>
                                        <td><?php echo $product['brand'];?></td>
                                        <td><?php echo $product['product_type'];?></td>
                                        <td><img src="<?php echo base_url('upload/').$product['img_cover'];?>" width="150" height="50" alt=""></td>
                                        <td><?php echo word_limiter($product['description'],30);?></td>
                                        <td><a href="<?php echo base_url('admin/product/setcolor/' . $product['md5']);?>" class="btn btn-link"><i class="icon icon-plus-sign"></i></a></td>
                                        <td>
                                            <?php
                                            if ($act['edit_act'] == 1) {
                                                echo '<a href="' . base_url('admin/product/edit/' . $product['md5']) . '" class="btn btn-link"><i class="icon icon-pencil"></i></a>';
                                            }
                                            if ($act['delete_act'] == 1) {
                                                echo '<a href="' . base_url('admin/product/delete/' . $product['md5']) . '" onclick="return confirm(\'Bạn có muốn xóa sản phẩm này?\');" class="btn btn-link"><i class="icon icon-trash"></i></a>';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $stt++;
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('admin/layouts/footer'); ?>



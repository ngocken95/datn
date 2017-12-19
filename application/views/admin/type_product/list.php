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
                                <a class="label label-info" href="<?php echo base_url('admin/type_product/add'); ?>">Thêm mới</a>
                                <?php
                            }
                        ?>
                    </div>
                    <div class="widget-content">
                        <table class="table table-bordered table-striped with-check">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Mã loại</th>
                                <th>Tên loại</th>
                                <th>Mô tả</th>
                                <th width="10%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($items)){
                                $stt=1;
                                foreach ($items as $type_product){
                                    ?>
                                    <tr>
                                        <td><?php echo $stt;?></td>
                                        <td><?php echo $type_product['code'];?></td>
                                        <td><?php echo $type_product['name'];?></td>
                                        <td><?php echo $type_product['description'];?></td>
                                        <td>
                                            <?php
                                            if ($act['edit_act'] == 1) {
                                                echo '<a href="' . base_url('admin/type_product/edit/' . $type_product['md5']) . '" class="btn btn-link"><i class="icon icon-pencil"></i></a>';
                                            }
                                            if ($act['delete_act'] == 1) {
                                                echo '<a href="' . base_url('admin/type_product/delete/' . $type_product['md5']) . '" class="btn btn-link"><i class="icon icon-trash"></i></a>';
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


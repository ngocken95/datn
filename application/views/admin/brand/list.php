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
                    if ($act['add_act'] == 1) {
                        ?>
                        <a class="label label-info" href="<?php echo base_url('admin/brand/add'); ?>">Thêm mới</a>
                        <?php
                    }
                    ?>
                </div>
                <div class="widget-content">
                    <table class="table table-bordered table-striped with-check">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Mã thương hiệu</th>
                            <th>Tên thương hiệu</th>
                            <th>Ảnh</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (!empty($items)) {
                            $stt = 1;
                            foreach ($items as $brand) {
                                ?>
                                <tr>
                                    <td><?php echo $stt; ?></td>
                                    <td><?php echo $brand['code']; ?></td>
                                    <td><?php echo $brand['name']; ?></td>
                                    <td><img src="<?php echo base_url('upload/') . $brand['logo']; ?>" width="150"
                                             height="50" alt=""></td>
                                    <td>
                                        <?php
                                        if ($act['edit_act'] == 1) { ?>
                                            <a href="<?php echo base_url('admin/brand/edit/' . $brand['md5']); ?>"
                                               class="btn btn-link"><i class="icon icon-pencil"></i></a>
                                            <?php
                                        }
                                        if ($act['delete_act'] == 1) {
                                            ?>
                                            <a href="<?php echo base_url('admin/brand/delete/' . $brand['md5']); ?>"
                                               onclick="return confirm('Bạn có muốn xóa thương hiệu này?');" class="btn btn-link"><i class="icon icon-trash"></i></a>
                                            <?php
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


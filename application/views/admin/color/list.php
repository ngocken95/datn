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
                        <a class="label label-info" href="<?php echo base_url('admin/color/add'); ?>">Thêm mới</a>
                        <?php
                    }
                    ?>
                </div>
                <div class="widget-content">
                    <table class="table table-bordered table-striped with-check">
                        <thead>
                        <tr>
                            <!--                            <th><input type="checkbox" id="title-table-checkbox" name="title-table-checkbox"/></th>-->
                            <th>#</th>
                            <th>Mã</th>
                            <th>Tên màu</th>
                            <th>Màu</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $stt=1;
                        if (!empty($items)) {
                            foreach ($items as $item) {
                                ?>
                                <tr>
                                    <td><?php echo $stt; ?></td>
                                    <td><?php echo $item['code']; ?></td>
                                    <td><?php echo $item['name']; ?></td>
                                    <td>
                                        <span style="background-color: #<?php echo $item['code']; ?>;width: 100px;height: 20px;display: inline-block"></span>
                                    </td>
                                    <td>
                                        <?php
                                        if ($act['edit_act'] == 1) {
                                            echo '<a href="' . base_url('admin/color/edit/' . $item['id']) . '" class="btn btn-link"><i class="icon icon-pencil"></i></a>';
                                        }
                                        if ($act['delete_act'] == 1) {
                                            echo '<a href="'. base_url('admin/color/delete/'.$item['id']) .'" class="btn btn-link" onclick="return confirm(\'Bạn có muốn xóa\');"><i class="icon icon-trash"></i></a>';
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

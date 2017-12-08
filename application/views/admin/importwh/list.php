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
                    <a class="label label-info" href="<?php echo base_url('admin/importwh/add'); ?>">Thêm mới hóa đơn nhập</a>
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
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (!empty($items)) {
                            foreach ($items as $key => $item) {
                                ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $item['code']; ?></td>
                                    <td><?php echo $item['name']; ?></td>
                                    <td>
                                        <span style="background-color: #<?php echo $item['code']; ?>;width: 100px;height: 20px;display: inline-block"></span>
                                    </td>
                                </tr>
                                <?php
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

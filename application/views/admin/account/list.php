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
                        <a class="label label-info" href="<?php echo base_url(); ?>admin/account/add">Thêm mới</a>
                    </div>
                    <div class="widget-content">
                        <table class="table table-bordered table-striped with-check">
                            <thead>
                            <tr>
                                <th><input type="checkbox" id="title-table-checkbox" name="title-table-checkbox"/></th>
                                <th>#</th>
                                <th>Tên tài khoản</th>
                                <th>Mật khẩu</th>
                                <th>Tên người dùng</th>
                                <th>Email</th>
                                <th>Điện thoại</th>
                                <th>Ảnh đại diện</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($items) {
                                showTableAccount($items);
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
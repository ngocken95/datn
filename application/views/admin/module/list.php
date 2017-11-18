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
                        <a class="label label-info" href="<?php echo base_url(); ?>admin/module/add">Thêm mới</a>
                    </div>
                    <div class="widget-content">
                        <table class="table table-bordered table-striped with-check">
                            <thead>
                            <tr>
                                <th><input type="checkbox" id="title-table-checkbox" name="title-table-checkbox"/></th>
                                <th>STT</th>
                                <th>Mã</th>
                                <th>Tên module</th>
                                <th>Phân vùng</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($items) {
                                $stt=1;
                                foreach ($items as $item) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center;"><input type="checkbox"/></td>
                                        <td width="3%" style="text-align: center;"><?php echo $stt;?></td>
                                        <td width="10%" style="text-align: center;"><?php echo $item['code'];?></td>
                                        <td width="10%" style="text-align: center;"><?php echo $item['name'];?></td>
                                        <td width="10%" style="text-align: center;"><?php echo $item['location'];?></td>
                                        <td width="5%" style="text-align: center;">
                                            <a href="<?php echo base_url();?>admin/module/edit?id=<?php echo $item['id'];?>"><i class="icon-pencil"></i></a>
                                            <a onclick="return confirm('Bạn có muốn xóa?');" href="<?php echo base_url();?>admin/module/delete?id=<?php echo $item['id'];?>"><i class="icon-remove"></i></a>
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
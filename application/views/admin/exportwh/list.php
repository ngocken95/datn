<?php $this->load->view('admin/layouts/header'); ?>
<?php $this->load->view('admin/layouts/navbar'); ?>
<?php $this->load->view('admin/layouts/sidebar'); ?>

<div id="content">
    <?php $this->load->view('admin/layouts/breadcrumb'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"> <i class="icon-th"></i> </span>
                    <h5>Danh sách hóa đơn</h5>
                    <a class="label label-info" href="<?php echo base_url('admin/exportwh/add'); ?>">Tạo hóa đơn xuất</a>
                </div>
                <div class="widget-content">
                    <table class="table table-bordered table-striped with-check">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Mã phiếu</th>
                            <th>Ngày xuất</th>
                            <th>Tổng tiền</th>
                            <th>Người xuất</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (!empty($items)) {
                            $stt=1;
                            foreach ($items as $item) {
                                ?>
                                <tr>
                                    <td><?php echo $stt; ?></td>
                                    <td><a href="<?php echo base_url('admin/exportwh/detail/'.$item['id']);?>"><?php echo $item['code']; ?></a></td>
                                    <td><?php echo date('d/m/Y',$item['created']); ?></td>
                                    <td><?php echo number_format($item['total']). ' VNĐ'; ?></td>
                                    <td><?php echo $item['name']; ?></td>
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
<?php
if($this->session->flashdata('success')){
    ?>
    <script>
        alert('<?php echo $this->session->flashdata('success');?>');
    </script>
    <?php
}
?>

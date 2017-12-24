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
                </div>
                <div class="widget-content">
                    <table class="table table-bordered table-striped with-check">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Mã đơn hàng</th>
                            <th>Tên người đặt</th>
                            <th>Thông tin</th>
                            <th>Tổng hóa đơn</th>
                            <th>Ghi chú</th>
                            <th>Duyệt</th>
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
                                    <td>
                                        <a href="<?php echo base_url('admin/order/detail/' . $item['id']); ?>"><?php echo $item['code']; ?></a>
                                    </td>
                                    <td><?php echo $item['cus_name']; ?></td>
                                    <td><?php echo 'Điện thoại: ' . $item['cus_phone'] . '<br>Email: ' . $item['cus_email'] . '<br>Nơi nhận hàng: ' . $item['cus_address']; ?></td>
                                    <td><?php echo number_format($item['total']) . ' VNĐ'; ?></td>
                                    <td><?php echo $item['cus_note']; ?></td>
                                    <td><?php if ($item['status'] == 'ORDER') {
                                            ?>
                                            <a href="<?php echo base_url('admin/order/detail/'.$item['md5']);?>">Duyệt</a>
                                            <?php
                                        }
                                        if($item['status']=='WH'){
                                        echo 'Đã được duyệt bởi '.$item['username'];
                                        }
                                        if($item['status']=='DONE'){
                                            echo 'Đã xử lý xong';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($item['status']!='WH' && $act['delete_act'] == 1) {
                                            echo '<a href="'. base_url('admin/order/delete/' . $item['md5']).'"><i class="icon icon-trash"></i></a>';
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
                    <div>
                        <h5>Đơn hàng bị xóa:</h5>
                        <?php
                        if(!empty($list_delete)){
                            foreach ($list_delete as $del){
                                ?>
                                <a href="<?php echo base_url('admin/order/detail/'.$del['md5']);?>"><?php echo $del['code'];?></a>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/layouts/footer'); ?>
<?php
if($this->session->flashdata('check')){
    ?>
    <script>
        alert('<?php echo $this->session->flashdata('check');?>');
    </script>
    <?php
}
?>


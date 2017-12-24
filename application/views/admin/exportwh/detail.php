<?php $this->load->view('admin/layouts/header'); ?>
<?php $this->load->view('admin/layouts/navbar'); ?>
<?php $this->load->view('admin/layouts/sidebar'); ?>

<div id="content">
    <?php $this->load->view('admin/layouts/breadcrumb'); ?>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-briefcase"></i> </span>
                        <h5>HÓA ĐƠN XUẤT</h5>
                    </div>
                    <div class="widget-content">
                        <div class="row-fluid">
                            <div class="span6">
                                <table class="">
                                    <tbody>
                                    <tr>
                                        <td><h4>LIPSTICK SHOP</h4></td>
                                    </tr>
                                    <tr>
                                        <td>55 Giải Phóng</td>
                                    </tr>
                                    <tr>
                                        <td>Đồng Tâm - Hai Bà Trưng - Hà Nội</td>
                                    </tr>
                                    <tr>
                                        <td>Điện Thoại: 1900</td>
                                    </tr>
                                    <tr>
                                        <td>lipstickshop.com</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="span6">
                                <table class="table table-bordered table-invoice">
                                    <tbody>
                                    <tr>
                                    </tr>
                                    <tr>
                                        <td class="width30">Mã HĐ :</td>
                                        <td class="width70"><strong><?php echo $bill['code']; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Ngày xuất :</td>
                                        <td><strong><?php echo date('d/m/Y', $bill['created']); ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="width30">Người xuất :</td>
                                        <td class="width70"><strong><?php echo $bill['name']; ?></strong></td>
                                    </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <center><h4>CHI TIẾT ĐƠN HÀNG</h4></center>
                        </div>
                        <div class="row-fluid">
                            <div class="span12">
                                <table class="table table-bordered table-invoice-full">
                                    <thead>
                                    <tr>
                                        <th class="head0">#</th>
                                        <th class="head1">Mã sản phẩm</th>
                                        <th class="head0 right">Số lượng</th>
                                        <th class="head1 right">Giá nhập</th>
                                        <th class="head0 right">Thành tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (!empty($items)) {
                                        $stt = 1;
                                        $total = 0;
                                        foreach ($items as $item) {
                                            ?>
                                            <tr>
                                                <td><?php echo $stt; ?></td>
                                                <td><?php echo $item['name'] . ' - ' . $item['color']; ?></td>
                                                <td><?php echo $item['quantity']; ?></td>
                                                <td><?php echo number_format($item['price']).' VNĐ'; ?></td>
                                                <td><?php echo number_format($item['quantity'] * $item['price']).' VNĐ'; ?></td>
                                            </tr>
                                            <?php
                                            $total+=$item['quantity'] * $item['price'];
                                            $stt++;
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <table class="table table-bordered table-invoice-full">
                                    <tbody>
                                    <tr>
                                        <td class="msg-invoice" width="75%"><h4>Thanh toán: </h4></td>
                                        <td class="right"><strong>Tổng cộng</strong> <br>
                                            <strong>Giảm giá</strong></td>
                                        <td class="right"><strong><?php echo number_format($total).' VNĐ';?> <br>
                                             0</strong></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="pull-right">
                                    <h4><span>Thành tiền:</span> <?php echo number_format($total).' VNĐ';?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/layouts/footer'); ?>

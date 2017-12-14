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
                        <h5>HÓA ĐƠN ĐẶT HÀNG</h5>
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
                                        <td class="width70"><strong><?php echo $item['code']; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Ngày đặt :</td>
                                        <td><strong><?php echo date('d/m/Y', $item['created']); ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="width30">Người đặt :</td>
                                        <td class="width70"><strong><?php echo $item['cus_name']; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="width30">Điện thoại :</td>
                                        <td class="width70"><strong><?php echo $item['cus_phone']; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="width30">Email :</td>
                                        <td class="width70"><strong><?php echo $item['cus_email']; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="width30">Địa chỉ nhận hàng :</td>
                                        <td class="width70"><strong><?php echo $item['cus_address']; ?></strong></td>
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
                                        <th class="head1 right">Giá bán</th>
                                        <th class="head0 right">Thành tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (!empty($list_product)) {
                                        $stt = 1;
                                        $total = 0;
                                        foreach ($list_product as $product) {
                                            ?>
                                            <tr>
                                                <td><?php echo $stt; ?></td>
                                                <td><?php echo $product['product'] . ' - ' . $product['color']; ?></td>
                                                <td><?php echo $product['quantity']; ?></td>
                                                <td><?php echo number_format($product['price']); ?></td>
                                                <td><?php echo number_format($product['quantity'] * $product['price']); ?></td>
                                            </tr>
                                            <?php
                                            $total += $product['quantity'] * $product['price'];
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
                                        <td class="right"><strong><?php echo number_format($total); ?> <br>
                                                0</strong></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="pull-right">
                                    <h4><span>Thành tiền:</span> <?php echo number_format($total); ?></h4>
                                </div>
                            </div>
                            <div class="center-block">
                                <?php
                                if($item['is_show']==1){
                                ?>
                                <a href="<?php echo base_url('admin/order/checkorder/'.$item['id']);?>" class="btn btn-success">Duyệt đơn hàng</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('admin/layouts/footer'); ?>

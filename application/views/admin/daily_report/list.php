<?php $this->load->view('admin/layouts/header'); ?>
<?php $this->load->view('admin/layouts/navbar'); ?>
<?php $this->load->view('admin/layouts/sidebar'); ?>

<div id="content">
    <?php $this->load->view('admin/layouts/breadcrumb'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <center>
                <h3>BÁO CÁO HÀNG NGÀY</h3>
                <div class="span2"></div>
                <form class="form-horizontal span6" id="form_date" action="<?php echo base_url('admin/daily_report');?>" method="POST">
                    <div class="control-group">
                        <label class="control-label span3">Ngày </label>
                        <div class="controls">
                            <input type="text" name="date" id="date" data-date-format="dd/mm/yyyy" value="<?php echo $this->session->flashdata('date')?$this->session->flashdata('date'):date('d/m/Y',getdate()[0]);?>">
                            <input type="submit" value="Xem" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </center>
        </div>
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"> <i class="icon-th"></i> </span>
                    <h5>Sản phẩm đã bán</h5>
                </div>
                <div class="widget-content">
                    <table class="table table-bordered table-striped with-check">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Loại sản phẩm</th>
                            <th>Số lượng bán</th>
                            <th>Thành tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $qty=0;
                        $total_thucthu=0;
                        $total_doanhthu=0;
                        if (!empty($list_product_sell)) {
                            foreach ($list_product_sell as $key=>$items) {
                                if($key=='export'){
                                    $stt=1;
                                    ?>
                                    <tr>
                                        <td colspan="6">ĐÃ XUẤT KHO</td>
                                    </tr>
                                    <?php
                                    foreach ($items as $item){
                                        ?>
                                        <tr>
                                            <td><?php echo $stt; ?></td>
                                            <td style="text-align: center"><a href="<?php echo base_url('/product_detail/'.$item['id']);?>"><?php echo $item['code']; ?></a></td>
                                            <td><?php echo $item['name'];?></td>
                                            <td><?php echo $item['type'];?></td>
                                            <td style="text-align: center"><?php echo $item['quantity'];?></td>
                                            <td style="text-align: center"><?php echo number_format($item['total']). ' VNĐ'; ?></td>
                                        </tr>
                                        <?php
                                        $stt++;
                                        $qty+=$item['quantity'];
                                        $total_doanhthu+=$item['total'];
                                        $total_thucthu+=$item['total'];
                                    }
                                }
                                else{
                                    $stt=1;
                                    ?>
                                    <tr>
                                        <td colspan="6">CHƯA XUẤT KHO</td>
                                    </tr>
                                    <?php
                                    foreach ($items as $item){
                                        ?>
                                        <tr>
                                            <td><?php echo $stt; ?></td>
                                            <td style="text-align: center"><a href="<?php echo base_url('/product_detail/'.$item['id']);?>"><?php echo $item['code']; ?></a></td>
                                            <td><?php echo $item['name'];?></td>
                                            <td><?php echo $item['type'];?></td>
                                            <td style="text-align: center"><?php echo $item['quantity'];?></td>
                                            <td style="text-align: center"><?php echo number_format($item['total']). ' VNĐ'; ?></td>
                                        </tr>
                                        <?php
                                        $stt++;
                                        $qty+=$item['quantity'];
                                        $total_doanhthu+=$item['total'];
                                    }
                                }
                            }
                            ?>
                            <tr>
                                <td colspan="4" class="text-right"><h4>Tổng cộng</h4></td>
                                <td style="text-align: center"><h5><?php echo $qty;?></h5></td>
                                <td style="text-align: center"><h5><?php echo number_format($total_doanhthu+$total_thucthu).' VNĐ';?></h5></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"> <i class="icon-th"></i> </span>
                    <h5>Tổng quan</h5>
                </div>
                <div class="widget-content">
                    <?php
                    $order_order=0;
                    $wh_order=0;
                    $done_order=0;
                    if(!empty($order)){
                        foreach ($order as $od){
                            if($od['status']=='DONE'){
                                $done_order+=$od['qty'];
                            }
                            if($od['status']=='ORDER'){
                                $order_order+=$od['qty'];
                            }
                            if($od['status']=='WH'){
                                $wh_order+=$od['qty'];
                            }
                        }
                    }
                    ?>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <td colspan="2"><h4>Số đơn đặt hàng</h4></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width=50%"></td>
                            <td><h5>chưa xử lý: </h5></td>
                            <td><?php echo $order_order;?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><h5>đã duyệt:</h5></td>
                            <td><?php echo $wh_order;?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><h5>hoàn thành:</h5></td>
                            <td><?php echo $done_order;?></td>
                        </tr>
                    </table>
                    <hr>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <td colspan="2"><h4>Doanh thu</h4></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width=50%"></td>
                            <td><h5>thực thu: </h5></td>
                            <td><?php echo number_format($total_thucthu).' VNĐ';?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><h5>ước tính:</h5></td>
                            <td><?php echo number_format($total_doanhthu+$total_thucthu).' VNĐ';?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/layouts/footer'); ?>
<script>
    $(document).ready(function(){
        $("#date").datepicker();
    })
</script>

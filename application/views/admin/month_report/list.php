<?php $this->load->view('admin/layouts/header'); ?>
<?php $this->load->view('admin/layouts/navbar'); ?>
<?php $this->load->view('admin/layouts/sidebar'); ?>

<div id="content">
    <?php $this->load->view('admin/layouts/breadcrumb'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <center>
                <h3>BÁO CÁO ĐỊNH KỲ</h3>
                <div class="span2"></div>
                <form class="form-horizontal span6" id="form_date"
                      action="<?php echo base_url('admin/month_report'); ?>" method="POST">
                    <div class="control-group">
                        <label class="control-label span3">Từ ngày </label>
                        <div class="controls">
                            <input type="text" name="from_date" id="from_date" data-date-format="dd/mm/yyyy"
                                   value="<?php echo $this->session->flashdata('from_date') ? $this->session->flashdata('from_date') : date('d/m/Y', getdate()[0]); ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span3">Đến ngày </label>
                        <div class="controls">
                            <input type="text" name="to_date" id="to_date" data-date-format="dd/mm/yyyy"
                                   value="<?php echo $this->session->flashdata('to_date') ? $this->session->flashdata('to_date') : date('d/m/Y', getdate()[0]); ?>">
                        </div>
                    </div>
                    <input type="submit" value="Xem" class="btn btn-success">
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
                            <th>Ngày</th>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Loại sản phẩm</th>
                            <th>Số lượng bán</th>
                            <th>Thành tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $qty = 0;
                        $total_thucthu = 0;
                        $total_doanhthu = 0;
                        $thucthu = array();
                        $doanhthu = array();
                        if (!empty($list_product_sell)) {
                            foreach ($list_product_sell as $key => $items) {
                                if ($key == 'export') {
                                    $stt = 1;
                                    ?>
                                    <tr>
                                        <td colspan="7">ĐÃ XUẤT KHO</td>
                                    </tr>
                                    <?php
                                    foreach ($items as $item) {
                                        ?>
                                        <tr>
                                            <td><?php echo $stt; ?></td>
                                            <td><?php echo date('d/m/Y', $item['time']); ?></td>
                                            <td style="text-align: center"><a
                                                        href="<?php echo base_url('/product_detail/' . $item['id']); ?>"><?php echo $item['code']; ?></a>
                                            </td>
                                            <td><?php echo $item['name']; ?></td>
                                            <td><?php echo $item['type']; ?></td>
                                            <td style="text-align: center"><?php echo $item['quantity']; ?></td>
                                            <td style="text-align: center"><?php echo number_format($item['total']) . ' VNĐ'; ?></td>
                                        </tr>
                                        <?php
                                        $stt++;
                                        $qty += $item['quantity'];
                                        $total_thucthu += $item['total'];
                                        $total_doanhthu += $item['total'];
                                        $d = new DateTime(convert_dmY_to_Ymd(date('d/m/Y', $item['time'])));
                                        $timestamp = $d->getTimestamp();
                                        $thucthu[$timestamp + 3600] = $total_thucthu;
                                        $doanhthu[$timestamp + 3600] = $total_doanhthu;
                                    }
                                } else {
                                    $stt = 1;
                                    ?>
                                    <tr>
                                        <td colspan="7">CHƯA XUẤT KHO</td>
                                    </tr>
                                    <?php
                                    foreach ($items as $item) {
                                        ?>
                                        <tr>
                                            <td><?php echo $stt; ?></td>
                                            <td><?php echo date('d/m/Y', $item['time']); ?></td>
                                            <td style="text-align: center"><a
                                                        href="<?php echo base_url('/product_detail/' . $item['id']); ?>"><?php echo $item['code']; ?></a>
                                            </td>
                                            <td><?php echo $item['name']; ?></td>
                                            <td><?php echo $item['type']; ?></td>
                                            <td style="text-align: center"><?php echo $item['quantity']; ?></td>
                                            <td style="text-align: center"><?php echo number_format($item['total']) . ' VNĐ'; ?></td>
                                        </tr>
                                        <?php
                                        $stt++;
                                        $qty += $item['quantity'];
                                        $total_doanhthu += $item['total'];
                                        $d = new DateTime(convert_dmY_to_Ymd(date('d/m/Y', $item['time'])));
                                        $timestamp = $d->getTimestamp();
                                        $thucthu[$timestamp + 3600] = $total_thucthu;
                                        $doanhthu[$timestamp + 3600] = $total_doanhthu;
                                    }
                                }
                            }
                            ?>
                            <tr>
                                <td colspan="5" class="text-right"><h4>Tổng cộng</h4></td>
                                <td style="text-align: center"><h5><?php echo $qty; ?></h5></td>
                                <td style="text-align: center">
                                    <h5><?php echo number_format($total_doanhthu) . ' VNĐ'; ?></h5></td>
                            </tr>
                            <?php
                        }
                        $thucthu = json_encode($thucthu);
                        $doanhthu = json_encode($doanhthu);
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="widget-box">
            <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
                <h5>Doanh thu</h5>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span12">
                        <div style="width:75%;">
                            <canvas id="doanhthu"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget-box">
            <div class="widget-title"><span class="icon"> <i class="icon-signal"></i> </span>
                <h5>Đơn hàng</h5>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span12">
                        <div style="width:75%;">
                            <canvas id="order"></canvas>
                        </div>
                    </div>
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
                    $order_chart=json_encode($order_chart);
                    $order_order = 0;
                    $wh_order = 0;
                    $done_order = 0;
                    if (!empty($order)) {
                        foreach ($order as $od) {
                            if ($od['status'] == 'DONE') {
                                $done_order += $od['qty'];
                            }
                            if ($od['status'] == 'ORDER') {
                                $order_order += $od['qty'];
                            }
                            if ($od['status'] == 'WH') {
                                $wh_order += $od['qty'];
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
                            <td><?php echo $order_order; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><h5>đã duyệt:</h5></td>
                            <td><?php echo $wh_order; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><h5>hoàn thành:</h5></td>
                            <td><?php echo $done_order; ?></td>
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
                            <td><?php echo number_format($total_thucthu) . ' VNĐ'; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><h5>ước tính:</h5></td>
                            <td><?php echo number_format($total_doanhthu) . ' VNĐ'; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/layouts/footer'); ?>
<script>
    $(document).ready(function () {
        $("#from_date").datepicker();
        $("#to_date").datepicker();
    })

    var from_date = '<?php echo $this->session->flashdata('from_date') ? $this->session->flashdata('from_date') : date('d/m/Y', getdate()[0]);?>';
    var to_date = '<?php echo $this->session->flashdata('to_date') ? $this->session->flashdata('to_date') : date('d/m/Y', getdate()[0]);?>';
    var myDate1 = from_date.split("/");
    var newDate1 = myDate1[1] + "/" + myDate1[0] + "/" + myDate1[2];
    var d = new Date(newDate1);
    var fromDate = d.getTime();

    var dt = '<?php echo $doanhthu;?>';
    var tt = '<?php echo $thucthu;?>';

    var arrdt = JSON.parse(dt);
    var arrtt = JSON.parse(tt);
    var myDate2 = to_date.split("/");
    var newDate2 = myDate2[1] + "/" + myDate2[0] + "/" + myDate2[2];
    d = new Date(newDate2);
    var toDate = d.getTime();
    var arrstamp = [];
    var arrdate = [];
    var arrstampdefault = [];
    for (var i = fromDate; i <= toDate; i += 86400000) {
        arrdate[arrdate.length] = timeConverter(i);
        arrstamp[arrstamp.length] = i+25200000;
        arrstampdefault[arrstampdefault.length] = i;
    }
    function timeConverter(UNIX_timestamp) {
        var a = new Date(UNIX_timestamp);
        var months = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
        var year = a.getFullYear();
        var month = months[a.getMonth()];
        var date = a.getDate();
        var time = date + '/' + month + '/' + year;
        return time;
    }
    var doanhthu=[];
    var thucthu=[];
    $.each(arrstamp,function(idx,val){
        doanhthu[idx]=0;
        thucthu[idx]=0;
        $.each(arrdt,function(i,v){
            if(val===(i*1000)){
                doanhthu[idx]=v;
            }
        });
        $.each(arrtt,function(j,k){
            if(val===(j*1000)){
                thucthu[idx]=k;
            }
        })
    });

    var config = {
        type: 'line',
        data: {
            labels: arrdate,
            datasets: [{
                label: "Doanh thu",
                backgroundColor: window.chartColors.red,
                borderColor: window.chartColors.red,
                data: doanhthu,
                fill: false,
            }, {
                label: "Thực thu",
                fill: false,
                backgroundColor: window.chartColors.blue,
                borderColor: window.chartColors.blue,
                data:thucthu
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'Biều đồ doanh thu và thực thu'
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Ngày'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Số tiền'
                    }
                }]
            }
        }
    };

    window.onload = function () {
        var ctx = document.getElementById("doanhthu").getContext("2d");
        window.myLine = new Chart(ctx, config);
    };

    //======================================================================================================
    var order='<?php echo $order_chart;?>';
    var order_order=[];
    var order_done=[];
    var order_wh=[];
    var order_a = JSON.parse(order);
    console.log(order_a);
    console.log(arrstampdefault);
    $.each(arrstampdefault,function(idx,val){
        order_order[idx]=0;
        order_done[idx]=0;
        order_wh[idx]=0;
        $.each(order_a,function(index,value){
            if(val===(index*1000)){
                $.each(value,function(i,v){
                    if(v.status==='ORDER'){
                        order_order[idx]=v.qty;
                    }
                    if(v.status==='DONE'){
                        order_done[idx]=v.qty;
                    }
                    if(v.status==='WH'){
                        order_wh[idx]=v.qty;
                    }
                })
            }
        })
    });
    console.log(order_wh);
    var barChartData = {
        labels: arrdate,
        datasets: [{
            label: 'Chưa xử lý',
            backgroundColor: window.chartColors.red,
            data: order_order
        }, {
            label: 'Đã duyệt',
            backgroundColor: window.chartColors.blue,
            data: order_wh
        }, {
            label: 'Đã xong',
            backgroundColor: window.chartColors.green,
            data: order_done
        }]

    };
    var ctxx = document.getElementById("order").getContext("2d");
    window.myBar = new Chart(ctxx, {
        type: 'bar',
        data: barChartData,
        options: {
            title:{
                display:true,
                text:"Biểu đồ đơn hàng"
            },
            tooltips: {
                mode: 'index',
                intersect: false
            },
            responsive: true,
            scales: {
                xAxes: [{
                    stacked: true,
                }],
                yAxes: [{
                    stacked: true
                }]
            }
        }
    });

</script>
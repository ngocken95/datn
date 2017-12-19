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
                        <div class="chart" id="chart_money"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget-box">
            <div class="widget-title"><span class="icon"> <i class="icon-signal"></i> </span>
                <h5>Đơn hàng</h5>
            </div>
            <div class="widget-content">
                <div class="chart" id="placeholder"></div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"> <i class="icon-th"></i> </span>
                    <h5>Tổng quan</h5>
                </div>
                <div class="widget-content">
                    <?php
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
</script>

<script>
    $(document).ready(function () {
        // === Prepare the chart data ===/
        var doanhthu = [], thucthu = [];
        var from_date = '<?php echo $this->session->flashdata('from_date') ? $this->session->flashdata('from_date') : date('d/m/Y', getdate()[0]);?>';
        var to_date = '<?php echo $this->session->flashdata('to_date') ? $this->session->flashdata('to_date') : date('d/m/Y', getdate()[0]);?>';
        var dt = '<?php echo $doanhthu;?>';
        var tt = '<?php echo $thucthu;?>';

        var myDate1 = from_date.split("/");
        var newDate1 = myDate1[1] + "/" + myDate1[0] + "/" + myDate1[2];
        var d = new Date(newDate1);
        var fromDate = d.getTime();

        var myDate2 = to_date.split("/");
        var newDate2 = myDate2[1] + "/" + myDate2[0] + "/" + myDate2[2];
        d = new Date(newDate2);
        var toDate = d.getTime();

        var arrdt = JSON.parse(dt);
        var arrtt = JSON.parse(tt);
        var arrdate = [];
        for (var i = fromDate; i <= toDate; i += 86400000) {
            arrdate[arrdate.length] = i;
        }
        $.each(arrdt, function (index, value) {
            doanhthu.push([index * 1000, value]);
        });
        $.each(arrtt, function (index, value) {
            thucthu.push([index * 1000, value]);
        });

        // === Make chart === //
        var chart_money = $.plot($("#chart_money"),
            [{data: doanhthu, label: "Doanh thu", color: "#ee7951"}, {
                data: thucthu,
                label: "Thực thu",
                color: "#4fb9f0"
            }], {
                series: {
                    lines: {show: true},
                    points: {show: true}
                },
                grid: {hoverable: true, clickable: true},
                yaxis: {
                    min: 0,
                    max: 5000000,
                    tickFormatter: function numberWithCommas(x, yaxis) {
                        return x.toString().replace(/\B(?=(?:\d{3})+(?!\d))/g, ".");
                    }
                },
                xaxis: {
                    mode: "time",
                    minTickSize: [1, "day"],
                    min: arrdate[0],
                    max: arrdate[arrdate.length - 1] + 86400000,
                    timeformat: "%d/%m/%Y"
                }
            });

        // === Point hover in chart === //
        var previousPoint = null;
        $("#chart_money").bind("plothover", function (event, pos, item) {
            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;

                    $('#tooltip').fadeOut(200, function () {
                        $(this).remove();
                    });
                    var x = item.datapoint[0].toFixed(0) / 1000,
                        y = item.datapoint[1].toFixed(0);
                    var d = new Date(x * 1000);
                    var date_hover = d.getDate() + '/' + (d.getMonth() + 1) + '/' + d.getFullYear();
                    var money = y.toString().replace(/\B(?=(?:\d{3})+(?!\d))/g, ".");
                    maruti.flot_tooltip(item.pageX, item.pageY, item.series.label + " của ngày " + date_hover + " là " + money);
                }

            } else {
                $('#tooltip').fadeOut(200, function () {
                    $(this).remove();
                });
                previousPoint = null;
            }
        });


        //=============================================================================================================
        var list_order = '<?php echo $order_chart;?>';
        var lo = JSON.parse(list_order);
        var done = [], wh = [], order = [];
        for (var i = fromDate; i <= toDate; i += 86400000) {
            var check_done = false;
            var check_order = false;
            var check_wh = false;
            $.each(lo, function (index, value) {
                $.each(value, function (idx, val) {
                    if (index * 1000 === i) {
                        if (val.status === 'ORDER') {
                            order.push([i, val.qty]);
                            check_order = true;
                        }
                        if (val.status === 'WH') {
                            wh.push([i, val.qty]);
                            check_wh = true;
                        }
                        if (val.status === 'DONE') {
                            done.push([i, val.qty]);
                            check_done = true;
                        }
                    }
                })
            })
            if (!check_order) {
                order.push([i, 0]);
            }
            if (!check_done) {
                done.push([i, 0]);
            }
            if (!check_wh) {
                wh.push([i, 0]);
            }
        }

        var chart_order=$.plot("#placeholder", [{data: wh, label: "Đã duyệt", color: "#ee7951"},
                {data: order, label: "Chưa xử lý", color: "#4fb9f0"},
                {data: done, label: "Hoàn thành", color: "#abcabc"}],
            {
                series: {
                    stack: true,
                    bars: {
                        show: true,
                        barWidth: 0.5
                    },
                    points: {show: true}
                },
                grid: {hoverable: true, clickable: true},
                yaxis: {
                    min: 0,
                    max: 5
                },
                xaxis: {
                    mode: "time",
                    minTickSize: [1, "day"],
                    min: arrdate[0],
                    max: arrdate[arrdate.length - 1] + 86400000,
                    timeformat: "%d/%m/%Y"
                }
            });


        var previousPoint = null;
        $("#placeholder").bind("plothover", function (event, pos, item) {
            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;

                    $('#tooltip').fadeOut(200, function () {
                        $(this).remove();
                    });
                    var x = item.datapoint[0].toFixed(0) / 1000,
                        y = item.datapoint[1].toFixed(0);
                    var d = new Date(x * 1000);
                    var date_hover = d.getDate() + '/' + (d.getMonth() + 1) + '/' + d.getFullYear();
                    maruti.flot_tooltip(item.pageX, item.pageY, item.series.label + " của ngày " + date_hover + " là " + y);
                }

            } else {
                $('#tooltip').fadeOut(200, function () {
                    $(this).remove();
                });
                previousPoint = null;
            }
        });
    })
    ;

    maruti = {
        // === Tooltip for flot charts === //
        flot_tooltip: function (x, y, contents) {

            $('<div id="tooltip">' + contents + '</div>').css({
                top: y + 5,
                left: x + 5
            }).appendTo("body").fadeIn(200);
        }
    };


</script>
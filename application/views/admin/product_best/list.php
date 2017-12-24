<?php $this->load->view('admin/layouts/header'); ?>
<?php $this->load->view('admin/layouts/navbar'); ?>
<?php $this->load->view('admin/layouts/sidebar'); ?>

<div id="content">
    <?php $this->load->view('admin/layouts/breadcrumb'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <center>
                <h3>BÁO CÁO SẢN PHẨM BÁN CHẠY</h3>
                <div class="span2"></div>
                <form class="form-horizontal span6" id="form_date"
                      action="<?php echo base_url('admin/product_best'); ?>" method="POST">
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
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng bán</th>
                            <th>Thành tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (!empty($list_product)) {
                            $stt=1;
                            foreach ($list_product as $item) {
                                ?>
                                <tr>
                                    <td><?php echo $stt; ?></td>
                                    <td style="text-align: center"><a
                                                href="<?php echo base_url('/product_detail/' . $item['id']); ?>"><?php echo $item['code']; ?></a>
                                    </td>
                                    <td><?php echo $item['name']; ?></td>
                                    <td><?php echo $item['qty']; ?></td>
                                    <td style="text-align: center"><?php echo number_format($item['total']) . ' VNĐ'; ?></td>
                                </tr>
                                <?php
                            }
                            $stt++;
                        }
                        $list_product=json_encode($list_product);
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="widget-box">
            <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
                <h5>Doanh thu theo sản phẩm</h5>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span12">
                        <div style="width:75%;">
                            <canvas id="doanhthusanpham"></canvas>
                        </div>
                    </div>
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
        var arrdtsp=[];
        var dtsp = '<?php echo $list_product;?>';
        arrdtsp = JSON.parse(dtsp);

        var name=[];
        var quantity=[];
        var doanhthu=[];
        $.each(arrdtsp,function(index,value){
            name[index]=value.name;
            quantity[index]=value.qty;
            doanhthu[index]=value.total;
        })
    console.log(name);
    var color = Chart.helpers.color;
    var barChartData = {
        labels: name,
        datasets: [{
            type: 'bar',
            label: 'Số lượng bán',
            backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
            borderColor: window.chartColors.red,
            data: quantity
        }, {
            type: 'line',
            label: 'Doanh thu',
            backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
            borderColor: window.chartColors.blue,
            data: doanhthu
        }]
    };

    // Define a plugin to provide data labels
    Chart.plugins.register({
        afterDatasetsDraw: function(chart, easing) {
            // To only draw at the end of animation, check for easing === 1
            var ctx = chart.ctx;

            chart.data.datasets.forEach(function (dataset, i) {
                var meta = chart.getDatasetMeta(i);
                if (!meta.hidden) {
                    meta.data.forEach(function(element, index) {
                        // Draw the text in black, with the specified font
                        ctx.fillStyle = 'rgb(0, 0, 0)';

                        var fontSize = 16;
                        var fontStyle = 'normal';
                        var fontFamily = 'Helvetica Neue';
                        ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);

                        // Just naively convert to string for now
                        var dataString = dataset.data[index].toString();

                        // Make sure alignment settings are correct
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'middle';

                        var padding = 5;
                        var position = element.tooltipPosition();
                        ctx.fillText(dataString, position.x, position.y - (fontSize / 2) - padding);
                    });
                }
            });
        }
    });

    window.onload = function() {
        var ctx = document.getElementById("doanhthusanpham").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Doanh thu theo sản phẩm'
                },
            }
        });
    };

    })
</script>
<?php $this->load->view('admin/layouts/header'); ?>
<?php $this->load->view('admin/layouts/navbar'); ?>
<?php $this->load->view('admin/layouts/sidebar'); ?>

<div id="content">
    <?php $this->load->view('admin/layouts/breadcrumb'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <center>
                <h3>BÁO CÁO DOANH THU THEO SẢN PHẨM</h3>
                <div class="span2"></div>
                <form class="form-horizontal span6" id="form_date"
                      action="<?php echo base_url('admin/product_sale'); ?>" method="POST">
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

        <div class="widget-box">
            <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
                <h5>Doanh thu sản phẩm</h5>
                <?php
                $list=json_encode($list);
                ?>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span12">
                        <div style="width:75%;">
                            <canvas id="doanhthutheosanpham"></canvas>
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

        var dt=[];
        dt='<?php echo $list?>';
        arrdt=JSON.parse(dt);
        var import_p=[];
        var export_p=[];
        var product=[];
        $.each(arrdt,function(index,value){
            product[index]=value.name;
            import_p[index]=value.import;
            export_p[index]=value.export;
        })
        var barChartData = {
            labels:product,
            datasets: [{
                label: 'Nhập',
                backgroundColor: window.chartColors.red,
                stack: 'Stack 0',
                data: import_p
            }, {
                label: 'Xuất',
                backgroundColor: window.chartColors.blue,
                stack: 'Stack 1',
                data: export_p
            }]

        };
        window.onload = function() {
            var ctx = document.getElementById("doanhthutheosanpham").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    title:{
                        display:true,
                        text:"Biểu đồ doanh thu theo sản phẩm"
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
        };
    })

</script>
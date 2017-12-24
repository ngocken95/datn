<?php $this->load->view('admin/layouts/header'); ?>
<?php $this->load->view('admin/layouts/navbar'); ?>
<?php $this->load->view('admin/layouts/sidebar'); ?>

<div id="content">
    <?php $this->load->view('admin/layouts/breadcrumb'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <center>
                <h3>BÁO CÁO TỒN KHO</h3>
            </center>
        </div>
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"> <i class="icon-th"></i> </span>
                    <h5>Sản phẩm tồn kho</h5>
                </div>
                <div class="widget-content">
                    <?php
                    $list_product = json_encode($list_product);
                    ?>
                    <canvas id="sanphamtonkho"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/layouts/footer'); ?>
<script>
    $(document).ready(function () {
        var sp = '<?php echo $list_product;?>';
        var arrsp = [];
        arrsp = JSON.parse(sp);
        var name = [];
        var quantity = [];
        $.each(arrsp, function (index, value) {
            name[index] = value.name;
            quantity[index] = value.qty;
        });
        var color = Chart.helpers.color;
        var barChartData = {
            labels: name,
            datasets: [{
                label: 'Số lượng',
                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: quantity
            }]

        };

        var ctx = document.getElementById("sanphamtonkho").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                legend: {
                    position: 'top'
                },
                title: {
                    display: true,
                    text: 'Sản phẩm tồn kho'
                },
                scales: {
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Sản phẩm'
                        }
                    }],
                    yAxes: [{
                        stacked: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Số lượng'
                        }
                    }]
                }
            }
        });

    })


</script>
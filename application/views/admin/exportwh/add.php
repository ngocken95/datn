<?php $this->load->view('admin/layouts/header'); ?>
<?php $this->load->view('admin/layouts/navbar'); ?>
<?php $this->load->view('admin/layouts/sidebar'); ?>

<div id="content">
    <?php $this->load->view('admin/layouts/breadcrumb'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Thêm mới</h5>
                </div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/exportwh/addaction';?>" name="information_color" id="information_color" novalidate="novalidate">
                        <div class="control-group">
                            <label class="control-label">Mã hóa đơn xuất</label>
                            <div class="controls">
                                <input type="text" name="code" id="code" readonly value="<?php echo $code_bill?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Ngày xuất</label>
                            <div class="controls">
                                <input type="text" name="date" id="date" data-date-format="dd/mm/yyyy" value="<?php echo date('d/m/Y',getdate()[0]);?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Danh sách đơn hàng</label>
                            <div class="controls">
                                <span style="height: 20px;width: 200px;display: inline-block;" id="img_color"></span>
                            </div>
                        </div>
                        <table id="detail" class="table table-bordered table-striped with-check">
                            <thead>
                            <tr>
                                <th><input type="checkbox"></th>
                                <th>Đơn hàng</th>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($list_order)){
                                foreach ($list_order as $key=>$order){
                                    $code=explode('/',$key);
                                    ?>
                                    <tr>
                                        <td><input type="checkbox" name="code_order[]" value="<?php echo $code[1];?>"></td>
                                        <td colspan="3"><?php echo $code[0];?></td>
                                    </tr>
                                    <?php
                                    foreach ($order as $product) {
                                        ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><?php echo $product['product'];?></td>
                                            <td><?php echo $product['quantity'];?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                        <div class="form-actions">
                            <input type="submit" value="Kiểm tra kho" name="check_wh" class="btn btn-warning">
                            <input type="submit" value="Thêm mới" name="add" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/layouts/footer'); ?>
<script>
    $(document).ready(function () {
        $("#date").datepicker();

        $('#check_wh').click(function(){
            var list_order=$('input[name=code_order]').val();
            console.log(list_order);
        })
    });

</script>

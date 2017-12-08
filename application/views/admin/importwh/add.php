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
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/importwh/addaction';?>" name="information_color" id="information_color" novalidate="novalidate">
                        <div class="control-group">
                            <label class="control-label">Mã hóa đơn nhập</label>
                            <div class="controls">
                                <input type="text" name="code" id="code" readonly value="<?php echo $code_bill?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Ngày nhập</label>
                            <div class="controls">
                                <input type="text" name="date" id="date" data-date-format="dd/mm/yyyy" value="<?php echo date('d/m/Y',getdate()[0]);?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Chi tiết đơn hàng</label>
                            <div class="controls">
                                <span style="height: 20px;width: 200px;display: inline-block;" id="img_color"></span>
                            </div>
                        </div>
                        <table id="detail" class="table table-bordered table-striped with-check">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá nhập</th>
                                <th></th>
                            </tr>
                            <div id="add_here">

                            </div>
                            <tr>
                                <td><button type="button" id="add_detail">+</button></td>
                            </tr>
                            </thead>
                        </table>
                        <div class="form-actions">
                            <input type="submit" value="Thêm mới" class="btn btn-success">
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

        $('#add_detail').click(function(){
            $('#detail tr:last').prev().after('<tr>' +
                    '<td></td>'+
                '<td style="width: 40%"><select name="product[]" id="product[]"><?php
                    if(!empty($product_color)){
                        foreach ($product_color as $item){
                            ?><option value="<?php echo $item['id'];?>"><?php echo $item['product'].' - '.$item['color'];?></option><?php
                        }
                    }
                    ?></select></td>' +
                '<td style="width: 20%"><input type="number" name="quantity[]"></td>' +
                '<td style="width: 20%"><input type="number" name="price[]"></td>' +
                '<td><button type="button" name="remove">&times;</button></td>' +
                '</tr>');
        });

        $(document).on('click','button[name=remove]',function(){
            $(this).parent().parent().remove();
        });

        $(document).on('change','input[type=number]',function(){
            var value=$(this).val();
            if(value<0){
                alert('Không được nhập số âm');
                $(this).val(0);
            }
        })
    });

</script>

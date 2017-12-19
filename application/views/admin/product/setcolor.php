<?php $this->load->view('admin/layouts/header'); ?>
<?php $this->load->view('admin/layouts/navbar'); ?>
<?php $this->load->view('admin/layouts/sidebar'); ?>

<div id="content">
    <?php $this->load->view('admin/layouts/breadcrumb'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Thêm mới màu son</h5>
                </div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/product/savecolor';?>" name="information_color" id="information_color" novalidate="novalidate">
                        <div class="control-group">
                            <label class="control-label">Tên sản phẩm</label>
                            <div class="controls">
                                <input type="hidden" id="md5" name="md5" value="<?php echo $item['md5'];?>">
                                <input type="hidden" id="id" name="id" value="<?php echo $item['id'];?>">
                                <input type="text" name="name" id="name" readonly value="<?php echo $item['name'];?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Danh sách màu son đã có</label>
                            <div class="controls">
                                <span style="height: 20px;width: 200px;display: inline-block;" id="img_color"></span>
                            </div>
                        </div>
                        <table id="color" class="table table-bordered table-striped with-check">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Màu son</th>
                                <th></th>
                            </tr>
                            <?php
                            if(!empty($color_exist)){
                                foreach ($color_exist as $col){
                                    ?>
                                    <div class="control-group">
                                        <label class="control-label"></label>
                                        <div class="controls">
                                            <input type="text" value="<?php echo $col['color'];?>" readonly>
                                            <a href="<?php echo base_url('admin/product/delcolor/'.$col['md5']);?>"><i class="icon icon-trash btn btn-small"></i></a>
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            ?>
                            <tr>
                                <td><button type="button" id="add_color">+</button></td>
                            </tr>
                            </thead>
                        </table>
                        <div class="form-actions">
                            <input type="submit" value="Lưu" class="btn btn-success">
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
        $('#add_color').click(function(){
            var qty=$('select').length;
            $('#color tr:last').prev().after('<tr>' +
                    '<td></td>'+
                '<td style="width: 100%"><select class="span4" id="'+qty+'" name="list_color[]"><option value="0">Chọn màu</option><?php
                    if(!empty($list_color)){
                        foreach ($list_color as $item){
                            ?><option value="<?php echo $item['id'];?>"><?php echo $item['name'];?></option><?php
                        }
                    }
                    ?></select><input type="hidden" value="'+qty+'"></td>' +
                '<td><button type="button" name="remove">&times;</button></td>' +
                '</tr>');
        });

        $(document).on('click','button[name=remove]',function(){
            $(this).parent().parent().remove();
        });

        $(document).on('change','select',function(){
            var id_color=$(this).val();
            var index=$(this).next().val();
            $.ajax({
                url: "<?php echo base_url('admin/product/check_color_exist');?>",
                type: "post",
                global: false,
                data: {'id_product':$('#id').val(),'id_color':id_color,'index':index},
                success:function(res){
                    var data=JSON.parse(res);
                    if(data.id===false){

                    }
                    else{
                        $('#'+data.index).val(0);
                        alert('Màu son đã tồn tại');
                    }
                }
            });
        })

    });

</script>

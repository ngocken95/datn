<?php $this->load->view('admin/layouts/header'); ?>
<?php $this->load->view('admin/layouts/navbar'); ?>
<?php $this->load->view('admin/layouts/sidebar'); ?>

    <div id="content">
        <?php $this->load->view('admin/layouts/breadcrumb'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>
                            <?php
                            if(isset($action)){
                                if($action=='add'){
                                   echo 'Thêm mới';
                                }
                                if($action=='edit'){
                                    echo 'Sửa';
                                }
                            }
                            ?>
                        </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/module/'.$action.'action';?>" name="information_module" id="information_module" novalidate="novalidate">
                            <div class="control-group">
                                <label class="control-label">Mã</label>
                                <div class="controls">
                                    <input type="text" name="code" id="code" value="<?php echo isset($item['code'])?$item['code']:'';?>" <?php echo isset($item['code'])?'disabled':'';?>>
                                    <input type="text" name="code_confirm" id="code_confirm" value="<?php echo isset($item['code'])?$item['code']:'';?>">
                                    <input type="hidden" name="id" id="id" value="<?php echo isset($item['id'])?$item['id']:'';?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Tên</label>
                                <div class="controls">
                                    <input type="text" name="name" id="name" value="<?php echo isset($item['name'])?$item['name']:'';?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Phân vùng</label>
                                <div class="controls">
                                    <select name="location" id="location" class="span3">
                                        <option value="backend" <?php echo (isset($item['location']) && $item['location']=='backend')?'selected':''?>>Backend</option>
                                        <option value="frontend" <?php echo (isset($item['location']) && $item['location']=='frontend')?'selected':''?>>Frontend</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" value="<?php echo $action=='add'?'Thêm mới':($action=='edit'?'Sửa':'');?>" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('admin/layouts/footer'); ?>
<script>
    $(document).ready(function(){
        $('#location').on('change',function () {
            if($('#code').val()!==''){
                $.ajax({
                    url: "<?php echo base_url().'admin/module/checkexist';?>",
                    type: "post",
                    data: {'code':$('#code').val(),'location':$('#location').val()},
                    success:function(response){
                        var data=JSON.parse(response);
                        console.log(data);
                        if(data==null){
                            $('#code_confirm').val(data);
                        }
                        else{
                            $('#code').val(data);
                            $('#code_confirm').val(data);
                        }
                    }
                });
            }
        });

        $('#code').on('keyup',function(){
            if($('#code').val()!==''){
                $.ajax({
                    url: "<?php echo base_url().'admin/module/checkexist';?>",
                    type: "post",
                    data: {'code':$('#code').val(),'location':$('#location').val()},
                    success:function(response){
                        var data=JSON.parse(response);
                        console.log(data);
                        $('#code_confirm').val(data);
                    }
                });
            }
        });

        $("#information_module").validate({
            rules:{
                code:{
                    required:true,
                    equalTo:"#code_confirm"
                },
                name:{
                    required:true
                }
            },
            messages:{
                code:{
                    required:'Không được để trống',
                    equalTo:"Mã đã tồn tại"
                },
                name:{
                    required:'Không được để trống'
                }
            },
            errorClass: "help-inline",
            errorElement: "span",
            highlight:function(element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
        });
    });
</script>

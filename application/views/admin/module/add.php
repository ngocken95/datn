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
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/module/addaction';?>" name="information_module" id="information_module" novalidate="novalidate">
                        <div class="control-group">
                            <label class="control-label">Mã</label>
                            <div class="controls">
                                <input type="text" name="code" id="code" autofocus>
                                <input type="hidden" name="code_confirm" id="code_confirm">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Tên module</label>
                            <div class="controls">
                                <input type="text" name="name" id="name">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Location</label>
                            <div class="controls">
                                <select name="location" id="location" class="span3">
                                    <option value="backend">Backend</option>
                                    <option value="frontend">Frontend</option>
                                </select>
                            </div>
                        </div>
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
        $('#code').on('keyup',function(){
            if($('#code').val()!==''){
                $('#code_confirm').val($('#code').val());
                $.ajax({
                    url: "<?php echo base_url('admin/module/check_code_exist_none');?>",
                    type: "post",
                    data: {'code':$('#code').val(),'location':$('#location').val()},
                    success:function(response){
                        var data=JSON.parse(response);
                        $('#code_confirm').val(data);
                    }
                });
            }
        });

        $('#location').on('change',function(){
            {
                console.log($('#location').val());
                if($('#code').val()!==''){
                    $('#code_confirm').val($('#code').val());
                    $.ajax({
                        url: "<?php echo base_url('admin/module/check_code_exist_none');?>",
                        type: "post",
                        data: {'code':$('#code').val(),'location':$('#location').val()},
                        success:function(response){
                            var data=JSON.parse(response);
                            $('#code_confirm').val(data);
                        }
                    });
                }
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

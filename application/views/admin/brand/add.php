<?php $this->load->view('admin/layouts/header'); ?>
<?php $this->load->view('admin/layouts/navbar'); ?>
<?php $this->load->view('admin/layouts/sidebar'); ?>

<div id="content">
    <?php $this->load->view('admin/layouts/breadcrumb'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Sửa</h5>
                </div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data" enctype="multipart/form-data" action="<?php echo base_url('admin/brand/addaction');?>" name="information_brand" id="information_brand" novalidate="novalidate">
                        <div class="control-group">
                            <label class="control-label">Mã thương hiệu</label>
                            <div class="controls">
                                <input type="text" name="code" id="code" autofocus>
                                <input type="hidden" name="code_confirm" id="code_confirm">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Tên thương hiệu</label>
                            <div class="controls">
                                <input type="text" name="name" id="name">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Logo</label>
                            <div class="controls">
                                <input type="file" name="img" id="img">
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
                    url: "<?php echo base_url().'admin/brand/check_code';?>",
                    type: "post",
                    data: {'code':$('#code').val()},
                    success:function(response){
                        var data=JSON.parse(response);
                        $('#code_confirm').val(data);
                    }
                });
            }
        });

        $("#information_brand").validate({
            rules: {
                code: {
                    required: true,
                    equalTo:'#code_confirm'
                },
                name: {
                    required: true
                }
            },
            messages: {
                code: {
                    required: 'Không được để trống',
                    equalTo:'Mã thương hiệu đã tồn tại'
                },
                name: {
                    required: 'Không được để trống'
                }
            },
            errorClass: "help-inline",
            errorElement: "span",
            highlight: function (element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
        });

    })

</script>

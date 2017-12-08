<?php $this->load->view('admin/layouts/header'); ?>
<?php $this->load->view('admin/layouts/navbar'); ?>
<?php $this->load->view('admin/layouts/sidebar'); ?>

    <div id="content">
        <?php $this->load->view('admin/layouts/breadcrumb'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-th"></i> </span>
                        <h5>Danh sách</h5>
                        <?php
                            if($act['add_act']==1){
                                ?>
                                <a class="label label-info" href="<?php echo base_url('admin/account/add'); ?>">Thêm mới</a>
                                <?php
                            }
                        ?>
                    </div>
                    <div class="widget-content">
                        <table class="table table-bordered table-striped with-check">
                            <thead>
                            <tr>
<!--                                <th><input type="checkbox" id="title-table-checkbox" name="title-table-checkbox"/></th>-->
                                <th>#</th>
                                <th>Tên tài khoản</th>
                                <th>Mật khẩu</th>
                                <th>Tên người dùng</th>
                                <th>Email</th>
                                <th>Điện thoại</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($items) {
                                showTableAccount($items,$act);
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="editGroup" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Sửa nhóm</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url('admin/account/editgroup');?>" name="edit_group" id="edit_group" novalidate="novalidate">
                        <div class="control-group">
                            <label class="control-label">Mã nhóm</label>
                            <div class="controls">
                                <input type="text" name="code_group" id="code_group">
                                <input type="hidden" name="id" id="id">
                                <input type="hidden" name="code_group_confirm" id="code_group_confirm">
                                <input type="hidden" name="code_group_old" id="code_group_old">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Tên nhóm</label>
                            <div class="controls">
                                <input type="text" name="name_group" id="name_group">
                            </div>
                        </div>
                        <div class="form-actions">
                            <input type="submit" value="Sửa" class="btn btn-success">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>

        </div>
    </div>

<?php $this->load->view('admin/layouts/footer'); ?>

<script>
    $(document).ready(function(){
        $('button[name=btnEdit]').click(function(){
            var id=$(this).prev().val();
            $.ajax({
                url: "<?php echo base_url().'admin/account/getItemById';?>",
                type: "post",
                data: {'id':id},
                success:function(response){
                    var data=JSON.parse(response);
                    $('#id').val(data.id);
                    $('#code_group').val(data.username);
                    $('#code_group_confirm').val(data.username);
                    $('#code_group_old').val(data.username);
                    $('#name_group').val(data.name);
                }
            });
        });

        $("#edit_group").validate({
            rules:{
                code_group:{
                    required:true,
                    equalTo:"#code_group_confirm"
                },
                name_group:{
                    required:true
                }
            },
            messages:{
                code_group:{
                    required:'Không được để trống',
                    equalTo:"Mã đã tồn tại"
                },
                name_group:{
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

        $('#code_group').on('keyup',function(){
            if($('#code_group').val()!==''){
                $('#code_group_confirm').val($('#code_group').val());
                $.ajax({
                    url: "<?php echo base_url().'admin/account/check_group_exist_none';?>",
                    type: "post",
                    data: {'id':$('#id').val(),'code_group':$('#code_group').val(),'code_old':$('#code_group_old').val()},
                    success:function(response){
                        var data=JSON.parse(response);
                        $('#code_group_confirm').val(data);
                    }
                });
            }
        });

    })
</script>

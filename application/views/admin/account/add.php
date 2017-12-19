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
                        <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/account/addaction';?>" name="information_account" id="information_account" novalidate="novalidate">
                            <div class="control-group">
                                <label class="control-label">Tên đăng nhập</label>
                                <div class="controls">
                                    <input type="text" name="username" id="username" autofocus>
                                    <input type="hidden" name="username_confirm" id="username_confirm">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Mật khẩu</label>
                                <div class="controls">
                                    <input type="password" name="password" id="password">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Nhập lại mật khẩu</label>
                                <div class="controls">
                                    <input type="password" name="re_password" id="re_password">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Họ tên</label>
                                <div class="controls">
                                    <input type="text" name="name" id="name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input type="text" name="email" id="email">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Điện thoại</label>
                                <div class="controls">
                                    <input type="text" name="phone" id="phone">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Nhóm tài khoản</label>
                                <div class="controls">
                                    <select name="group" id="group" class="span3">
                                        <?php
                                        if(count($group)>0){
                                            foreach ($group as $key=>$val){
                                                ?>
                                                <option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <button type="button" class="btn btn-info btn-small" data-toggle="modal" data-target="#addGroup">Thêm nhóm</button>
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" value="Thêm mới" class="btn btn-success">
                            </div>
                        </form>

                        <div id="addGroup" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Thêm nhóm</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/account/addgroup';?>" name="add_group" id="add_group" novalidate="novalidate">
                                            <div class="control-group">
                                                <label class="control-label">Mã nhóm</label>
                                                <div class="controls">
                                                    <input type="text" name="code_group" id="code_group">
                                                    <input type="hidden" name="code_group_confirm" id="code_group_confirm">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Tên nhóm</label>
                                                <div class="controls">
                                                    <input type="text" name="name_group" id="name_group">
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
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('admin/layouts/footer'); ?>
<script>
    $(document).ready(function () {

        $('#code_group').on('keyup',function(){
            if($('#code_group').val()!==''){
                $('#code_group_confirm').val($('#code_group').val());
                $.ajax({
                    url: "<?php echo base_url().'admin/account/check_group_exist_none';?>",
                    type: "post",
                    data: {'code_group':$('#code_group').val()},
                    success:function(response){
                        var data=JSON.parse(response);
                        $('#code_group_confirm').val(data);
                    }
                });
            }
        });

        $("#add_group").validate({
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

        $('#username').on('keyup',function(){
            if($('#username').val()!==''){
                $('#username_confirm').val($('#username').val());
                $.ajax({
                    url: "<?php echo base_url().'admin/account/check_username_exist_none';?>",
                    type: "post",
                    data: {'username':$('#username').val()},
                    success:function(response){
                        var data=JSON.parse(response);
                        $('#username_confirm').val(data);
                    }
                });
            }
        });

        $("#information_account").validate({
            rules:{
                username:{
                    required:true,
                    equalTo:"#username_confirm"
                },
                password:{
                    required:true
                },
                re_password:{
                    required:true,
                    equalTo:"#password"
                },
                name:{
                    required:true
                },
                email:{
                    required:true,
                    email:true
                },
                phone:{
                    required:true,
                    number:true
                }
            },
            messages:{
                username:{
                    required:'Không được để trống',
                    equalTo:"Tài khoản đã tồn tại"
                },
                password:{
                    required:'Không được để trống'
                },
                re_password:{
                    required:'Không được để trống',
                    equalTo:"Mật khẩu không trùng nhau"
                },
                name:{
                    required:'Không được để trống'
                },
                email:{
                    required:"Không được để trống",
                    email:"Không đúng định dạng"
                },
                phone:{
                    required:"Không được để trống",
                    number:"Điện thoại phải là số"
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

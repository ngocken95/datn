<?php $this->load->view('site/layouts/head');?>
<?php $this->load->view('site/layouts/header');?>
<section class="content" >
    <div class="container">
        <div class="row">
            <div class="content ">
                <div class="title2">
                    <div class="col-xs-12 col-sm-2 col-md-4 col-lg-4">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 lien_he ">
                        <div class="connect">
                            <div class="icon_lh">
                                <h3>Tạo tài khoản </h3>
                                <div>
                                    <?php
                                        echo ($this->session->flashdata('alert'))?$this->session->flashdata('alert'):'';
                                    ?>
                                </div>
                            </div>
                            <div class="form_lh">
                                <form action="<?php echo base_url('register/register');?>" method="POST" id="form_info">
                                    <input type="text" name="name" id="name" placeholder="Họ tên*" autofocus>
                                    <input type="email" name="email" id="email" value="" placeholder="Email*">
                                    <input type="text" name="phone" id="phone" placeholder="Điện thoại*">
                                    <input type="text" name="address" id="address" placeholder="Điạ chỉ" >
                                    <input type="text" name="user" id="user" placeholder="Tên đăng nhập" >
                                    <input type="hidden" name="user_confirm" id="user_confirm">
                                    <input type="password" name="pass" id="pass" value="" placeholder="Mật khẩu">
                                    <input type="password" name="re_pass" id="re_pass" value="" placeholder="Nhập lại mật khẩu ">
                                    <div>
                                        <button type="submit" class="btn btn-primary">Đăng kí</button>
                                    </div>
                                </form>
                            </div>
                            <div class="otherway">
                                <h4>LIPSTICK</h4>
                                <i class="fa fa-envelope-o" aria-hidden="true"></i> quantri@gmail.com <br>
                                <i class="fa fa-phone" aria-hidden="true"></i> 1900
                                <a href="<?php echo base_url('login');?>"> <button type="button" class="btn btn-default">Đăng nhập </button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-4 col-lg-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('site/layouts/footer');?>
<script>
        $("#form_info").validate({
            rules:{
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
                },
                address:{
                    required:true
                },
                user:{
                    required:true,
                    equalTo:"#user_confirm"
                },
                pass:{
                    required:true
                },
                re_pass:{
                    required:true,
                    equalTo:"#pass"
                }
            },
            messages:{
                name:{
                    required:"Không được để trống"
                },
                email:{
                    required:"Không được để trống",
                    email:"Email không đúng định dạng"
                },
                phone:{
                    required:"Không được để trống",
                    number:"<br>Số điện thoại phải là số"
                },
                address:{
                    required:"Không được để trống"
                },
                user:{
                    required:"Không được để trống",
                    equalTo:"<br>Tài khoản đã tồn tại"
                },
                pass:{
                    required:"Không được để trống"

                },
                re_pass:{
                    required:"Không được để trống",
                    equalTo:"<br>Mật khẩu không trùng nhau"
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

        $('#user').on('keyup',function(){
            if($('#user').val()!==''){
                $('#user_confirm').val($('#user').val());
                $.ajax({
                    url: "<?php echo base_url().'register/check_user';?>",
                    type: "post",
                    data: {'user':$('#user').val()},
                    success:function(response){
                        var data=JSON.parse(response);
                        $('#user_confirm').val(data);
                    }
                });
            }
        });
</script>


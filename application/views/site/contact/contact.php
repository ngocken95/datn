<?php $this->load->view('site/layouts/head');?>
<?php $this->load->view('site/layouts/header');?>
    <section class="container">
        <div class="row">
            <article class="col-sm-9 col-sm-push-3">
                <div class="c_box">
                    <h3>Liên hệ</h3>
                </div>
                <h3>
                <?php
                if($this->session->flashdata('act_success')){
                    echo $this->session->flashdata('act_success');
                }
                ?>
                </h3>
                <div class="f_contact">
                    <form class="form-horizontal" method="post" id="form_info" action="<?php echo base_url('contact/add');?>">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label>Họ và tên *:</label>
                                <input type="text" class="form-control" name="fullname" required="" placeholder="Họ và tên">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6">
                                <label>Số điện thoại:</label>
                                <input type="text" class="form-control"  name="phone" placeholder="Số điện thoại">
                            </div>
                            <div class="col-sm-6">
                                <label>Email *:</label>
                                <input type="text" class="form-control"  name="email" required="" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label>Địa chỉ *:</label>
                                <input type="text" class="form-control" name="address" placeholder="Địa chỉ">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label>Yêu cầu khác:</label>
                                <textarea class="form-control" rows="5" name="content" placeholder="Nội dung"></textarea>
                            </div>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-danger">Gửi</button>
                        </div>
                    </form>
                </div>
            </article>
            <?php $this->load->view('site/layouts/left_menu');?>
        </div>
    </section>
<?php $this->load->view('site/layouts/footer');?>
<script>
    $("#form_info").validate({
        rules:{
            fullname:{
                required:true
            },
            address:{
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
            content:{
                required:true
            }
        },
        messages:{
            fullname:{
                required:"Không được để trống"
            },
            address:{
                required:"Không được để trống"
            },
            email:{
                required:"Không được để trống",
                email:"Không đúng định dạng"
            },
            phone:{
                required:"Không được để trống",
                number:"Số điện thoại phải là số"
            },
            content:{
                required:"Không được để trống"
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
</script>

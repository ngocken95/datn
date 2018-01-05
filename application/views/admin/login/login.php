<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng nhập</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url('template/backend/css/bootstrap.min.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('template/backend/css/bootstrap-responsive.min.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('template/backend/css/matrix-login.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('template/backend/font-awesome/css/font-awesome.css');?>"/>
    <link rel='stylesheet' href="<?php echo base_url('template/backend/css/font-open-sans.css');?>" >
</head>
<body>
<div id="loginbox">
    <form id="loginform" class="form-vertical" action="<?php echo base_url('admin/login/checklogin');?>" method="POST">
        <div class="control-group normal_text"> <h3><img src="<?php echo base_url('template/backend/img/logo.png');?>" alt="Logo" /></h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" placeholder="Tên đăng nhập" name="username" />
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Mật khẩu" name="password" />
                </div>
            </div>
        </div>
        <h4><?php echo $this->session->flashdata('required')?$this->session->flashdata('required'):($this->session->flashdata('login_fail')?$this->session->flashdata('login_fail'):'')?></h4>
        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Quên mật khẩu?</a></span>
            <span class="pull-right"><button type="submit" class="btn btn-success" /> Đăng nhập</button></span>
        </div>
    </form>
    <form id="recoverform" action="#" class="form-vertical">
        <p class="normal_text">Nhập địa chỉ e-mail của bạn dưới đây và chúng tôi sẽ gửi cho bạn các hướng dẫn cách khôi phục mật khẩu.</p>

        <div class="controls">
            <div class="main_input_box">
                <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail" />
            </div>
        </div>

        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Trở lại đăng nhập</a></span>
            <span class="pull-right"><a class="btn btn-info"/>Khôi phục</a></span>
        </div>
    </form>
</div>

<script src="<?php echo base_url('template/backend/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('template/backend/js/matrix.login.js');?>"></script>
</body>

</html>

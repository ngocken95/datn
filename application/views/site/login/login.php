<?php $this->load->view('site/layouts/head');?>
<?php $this->load->view('site/layouts/header');?>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="content ">
                    <div class="title2">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div id="test">

                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 lien_he ">
                            <div class="connect">
                                <div class="icon_lh">
                                    <h3>Đăng nhập</h3>
                                    <div><?php echo ($this->session->flashdata('alert')) ?$this->session->flashdata('alert') : ''; ?></div>
                                </div>
                                <div class="form_lh">
                                    <form action="<?php echo base_url('login/login');?>" method="POST" accept-charset="utf-8">
                                        <input type="text" name="user" value="" placeholder="Tên đăng nhập"
                                               autofocus>
                                        <input type="password" name="pass" value="" placeholder="Mật khẩu">
                                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                                    </form>
                                </div>
                                <div class="otherway">
                                    <h4>LIPSTICK</h4>
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i> ngocken95@gmail.com <br>
                                    <i class="fa fa-phone" aria-hidden="true"></i> 01657 444 550
                                    <a href="<?php echo base_url('register');?>">
                                        <button type="button" class="btn btn-default">Đăng ký</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $this->load->view('site/layouts/footer');?>
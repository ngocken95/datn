<?php $this->load->view('admin/layouts/header'); ?>
<?php $this->load->view('admin/layouts/navbar'); ?>
<?php $this->load->view('admin/layouts/sidebar'); ?>

<div id="content">
    <?php $this->load->view('admin/layouts/breadcrumb'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Sửa</h5>
                </div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post"
                          action="<?php echo base_url('admin/color/editaction'); ?>" name="information_color"
                          id="information_account" novalidate="novalidate">
                        <div class="control-group">
                            <label class="control-label">Mã màu</label>
                            <div class="controls">
                                <input type="text" name="code" id="code" value="<?php echo $item['code']; ?>" readonly>
                                <input type="hidden" name="id" id="id" value="<?php echo $item['id']; ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Tên màu</label>
                            <div class="controls">
                                <input type="text" name="name" id="name" value="<?php echo $item['name']; ?>">
                            </div>
                        </div>
                        <div class="form-actions">
                            <input type="submit" value="Sửa" class="btn btn-success">
                        </div>
                    </form>
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

        $("#information_color").validate({
            rules: {
                name: {
                    required: true
                }
            },
            messages: {
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

    });

</script>

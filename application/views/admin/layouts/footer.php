<div class="row-fluid">
    <div id="footer" class="span12"> 2017 &copy; Đồ án tốt nghiệp
    </div>
</div>
<script src="<?php echo base_url(); ?>template/backend/js/excanvas.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/js/jquery.ui.custom.js"></script>
<script src="<?php echo base_url(); ?>template/backend/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/js/matrix.js"></script>
<script src="<?php echo base_url(); ?>template/backend/js/jquery.uniform.js"></script>
<script src="<?php echo base_url(); ?>template/backend/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>template/backend/js/matrix.form_validation.js"></script>
<script src="<?php echo base_url(); ?>template/backend/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>template/backend/ckeditor/adapters/jquery.js"></script>
<script src="<?php echo base_url(); ?>template/backend/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/js/matrix.tables.js"></script>
<script src="<?php echo base_url(); ?>template/backend/price_format/jquery.priceformat.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/js/jquery.gritter.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/js/matrix.chat.js"></script>
<script src="<?php echo base_url(); ?>template/backend/js/jquery.wizard.js"></script>
<script src="<?php echo base_url(); ?>template/backend/js/Chart.bundle.js"></script>
<script src="<?php echo base_url(); ?>template/backend/js/utils.js"></script>
<script src="<?php echo base_url(); ?>template/backend/js/matrix.popover.js"></script>
<script src="<?php echo base_url(); ?>template/backend/js/bootstrap-datepicker.js"></script>
<script>
    $(document).ready(function(){
        $('input[type=checkbox],input[type=radio],input[type=file]').uniform();
        $('select').select2();
    })
</script>
<?php
if ($this->session->flashdata('login_success')) {
    ?>
    <script>
        $(document).ready(function () {
            $.gritter.add({
                title:	'alert',
                text:	'<?php echo $this->session->flashdata('login_success');?>',
                image: 	'',
                sticky: false
            });
        })
    </script>
    <?php
}

if ($this->session->flashdata('act_success')) {
    ?>
    <script>
        $(document).ready(function () {
            $.gritter.add({
                title:	'alert',
                text:	'<?php echo $this->session->flashdata('act_success');?>',
                image: 	'',
                sticky: false
            });
        })
    </script>
    <?php
}

if ($this->session->flashdata('fail')) {
    ?>
    <script>
        $(document).ready(function () {
            $.gritter.add({
                title:	'fail',
                text:	'<?php echo $this->session->flashdata('act_fail');?>',
                image: 	'',
                sticky: false
            });
        })
    </script>
    <?php
}

if ($this->session->flashdata('id_not_exist')) {
    ?>
    <script>
        $(document).ready(function () {
            $.gritter.add({
                title:	'fail',
                text:	'<?php echo $this->session->flashdata('id_not_exist');?>',
                image: 	'',
                sticky: false
            });
        })
    </script>
    <?php
}
?>


<script type="text/javascript">
    init_reload();
    function init_reload(){
        setInterval( function() {
//            window.location.reload();
            $.ajax({
                url: "<?php echo base_url('admin/homepage/check_order');?>",
                success:function(response){
                    var data=JSON.parse(response);
                    console.log(data);
                    if(data>0){
                        $.gritter.add({
                            title:	'alert',
                            text:	'<a href="<?php echo base_url('admin/order');?>">Có '+data+' đơn hàng mới</a>',
                            image: 	'',
                            sticky: false
                        });
                    }
                }
            });
        },15000);
    }
</script>
</body>
</html>

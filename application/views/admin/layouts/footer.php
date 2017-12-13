<div class="row-fluid">
    <div id="footer" class="span12"> 2017 &copy; Đồ án tốt nghiệp
    </div>
</div>
<?php
print_r($this->session->userdata('user'));
?>
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

<!--<script src="--><?php //echo base_url(); ?><!--template/backend/js/jquery.flot.min.js"></script>-->
<!--<script src="--><?php //echo base_url(); ?><!--template/backend/js/jquery.flot.resize.min.js"></script>-->
<!--<script src="--><?php //echo base_url(); ?><!--template/backend/js/jquery.peity.min.js"></script>-->
<!--<script src="--><?php //echo base_url(); ?><!--template/backend/js/fullcalendar.min.js"></script>-->



<!--<script src="--><?php //echo base_url(); ?><!--template/backend/js/matrix.dashboard.js"></script>-->
<script src="<?php echo base_url(); ?>template/backend/js/jquery.gritter.min.js"></script>
<!--<script src="--><?php //echo base_url(); ?><!--template/backend/js/matrix.interface.js"></script>-->
<!--<script src="--><?php //echo base_url(); ?><!--template/backend/js/matrix.chat.js"></script>-->

<script src="<?php echo base_url(); ?>template/backend/js/jquery.wizard.js"></script>
<script src="<?php echo base_url(); ?>template/backend/js/excanvas.min.js"></script>
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
                title:	'Thông báo',
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
                title:	'Thông báo',
                text:	'<?php echo $this->session->flashdata('act_success');?>',
                image: 	'',
                sticky: false
            });
        })
    </script>
    <?php
}

if ($this->session->flashdata('act_fail')) {
    ?>
    <script>
        $(document).ready(function () {
            $.gritter.add({
                title:	'Lỗi',
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
                title:	'Lỗi',
                text:	'<?php echo $this->session->flashdata('id_not_exist');?>',
                image: 	'',
                sticky: false
            });
        })
    </script>
    <?php
}
?>
</body>
</html>

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
                    <a class="label label-info" href="<?php echo base_url('admin/module/add'); ?>">Thêm mới</a>
                </div>
                <div class="widget-content">
                    <table class="table table-bordered table-striped with-check">
                        <thead>
                        <tr>
<!--                            <th><input type="checkbox" id="title-table-checkbox" name="title-table-checkbox"/></th>-->
                            <th>#</th>
                            <th>Mã</th>
                            <th>Tên module</th>
                            <th>Location</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $stt=1;
                        if(!empty($items)){
                        foreach ($items as $item){
                            ?>
                            <tr>
<!--                                <td><input type="checkbox" value="--><?php //echo $item['id'];?><!--"></td>-->
                                <td><?php echo $stt;?></td>
                                <td><?php echo $item['code'];?></td>
                                <td><?php echo $item['name'];?></td>
                                <td><?php echo $item['location'];?></td>
                            </tr>
                            <?php
                            $stt++;
                        }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
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

        $('button[name=btnDel]').click(function(){
            var id=$(this).prev().prev().val();
            $.ajax({
                url: "<?php echo base_url().'admin/account/getItemById';?>",
                type: "post",
                data: {'id':id},
                success:function(response){
                    var data=JSON.parse(response);
                    $('#id_del').val(data.id);
                    $('#name_del').html(data.name);
                }
            });
        });

        $('button[name=yes]').click(function(){
            var id=$(this).prev().val();
            $.ajax({
                url:"<?php echo base_url().'admin/account/checkListByGroupId';?>",
                type: "post",
                data: {'id':id},
                success:function(response){
                    var data=JSON.parse(response);
                    console.log(data);
                    if(!data){
                        $('#alert_text').html('Không thể xóa nhóm này. <br> Có tài khoản đang tồn tại trong nhóm!');
                        $('#delGroup').modal('hide');
                        $('#Alert').modal('show');
                    }
                    else{
                        $.ajax({
                            url:"<?php echo base_url().'admin/account/delById';?>",
                            type: "post",
                            data: {'id':data},
                            success:function(response) {
                                $('#alert_text').html('Xóa thành công!');
                                $('#delGroup').modal('hide');
                                $('#Alert').modal('show');
                                setTimeout(function(){
                                    window.location.reload(1);
                                }, 1000);
                            }
                        });
                    }
                }
            })
        });

        $('button[name=btnDelAccount]').click(function(){
            var id=$(this).prev().prev().val();
            $.ajax({
                url: "<?php echo base_url().'admin/account/getItemById';?>",
                type: "post",
                data: {'id':id},
                success:function(response){
                    var data=JSON.parse(response);
                    $('#id_del').val(data.id);
                    $('#username_del').html(data.username);
                }
            });
        });
        /*
        check xem tài khoản có hóa đơn nào không?
        có đơn hàng nào đã xử lý không?
        */
        $('button[name=yesAccount]').click(function(){
            var id=$(this).prev().val();
            $.ajax({
                url:"<?php echo base_url().'admin/account/checkListByGroupId';?>",
                type: "post",
                data: {'id':id},
                success:function(response){
                    var data=JSON.parse(response);
                    if(!data){
                        $('#alert_text').html('Không thể xóa tài khoản này. <br> Có hóa đơn hoặc đơn hàng đang xử lý!');
                        $('#delGroup').modal('hide');
                        $('#Alert').modal('show');
                    }
                    else{
                        $.ajax({
                            url:"<?php echo base_url().'admin/account/delById';?>",
                            type: "post",
                            data: {'id':data},
                            success:function(response) {
                                $('#alert_text').html('Xóa thành công!');
                                $('#delGroup').modal('hide');
                                $('#Alert').modal('show');
                                setTimeout(function(){
                                    window.location.reload(1);
                                }, 1000);
                            }
                        });
                    }
                }
            })
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

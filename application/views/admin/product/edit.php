<?php $this->load->view('admin/layouts/header'); ?>
<?php $this->load->view('admin/layouts/navbar'); ?>
<?php $this->load->view('admin/layouts/sidebar'); ?>

    <div id="content">
        <?php $this->load->view('admin/layouts/breadcrumb'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Sửa</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="<?php echo base_url('admin/product/editaction');?>" name="information_product" id="information_product" novalidate="novalidate">
                            <div class="control-group">
                                <label class="control-label">Mã sản phẩm</label>
                                <div class="controls">
                                    <input type="text" name="code" id="code" value="<?php echo $item['code'];?>" readonly>
                                    <input type="hidden" name="id" id="id" value="<?php echo $item['id'];?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Tên sản phẩm</label>
                                <div class="controls">
                                    <input type="text" name="name" id="name" value="<?php echo $item['name'];?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Loại</label>
                                <div class="controls">
                                    <select name="product_type" id="product_type" class="span3">
                                        <?php
                                        if(!empty($product_type)){
                                            foreach ($product_type as $key=>$val){
                                                ?>
                                                <option value="<?php echo $val['id'];?>" <?php echo ($val['id']==$item['product_type_id'])?'selected':'';?>><?php echo $val['name'];?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <button type="button" class="btn btn-info btn-small" data-toggle="modal" data-target="#addProductType">Thêm loại</button>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Thương hiệu</label>
                                <div class="controls">
                                    <select name="brand" id="brand" class="span3">
                                        <?php
                                        if(!empty($brand)){
                                            foreach ($brand as $key=>$val){
                                                ?>
                                                <option value="<?php echo $val['id'];?> <?php echo ($val['id']==$item['brand_id'])?'selected':'';?>"><?php echo $val['name'];?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <button type="button" class="btn btn-info btn-small" data-toggle="modal" data-target="#addBrand">Thêm thương hiệu</button>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Ảnh đại diện</label>
                                <div class="controls">
                                    <input type="file" name="img_cover" id="img_cover">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Ảnh</label>
                                <div class="controls">
                                    <input type="file" name="img_list[]" id="img_list">
                                    <button type="button" id="add_img">+</button>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Mô tả</label>
                                <div class="controls">
                                    <textarea class="span8" rows="10" name="description" id="description"></textarea>
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

        <div id="addProductType" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thêm loại sản phẩm</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" action="<?php echo base_url('admin/product/addproducttype');?>" name="add_product_type" id="add_product_type" novalidate="novalidate">
                            <div class="control-group">
                                <label class="control-label">Mã loại</label>
                                <div class="controls">
                                    <input type="text" name="code_product_type" id="code_product_type">
                                    <input type="hidden" name="code_product_type_confirm" id="code_product_type_confirm">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Tên loại</label>
                                <div class="controls">
                                    <input type="text" name="name_product_type" id="name_product_type">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Mô tả</label>
                                <div class="controls">
                                    <input type="text" name="description_type" id="description_type">
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

        <div id="addBrand" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thêm thương hiệu sản phẩm</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/product/addbrand');?>" name="add_brand" id="add_brand" novalidate="novalidate">
                            <div class="control-group">
                                <label class="control-label">Mã thương hiệu</label>
                                <div class="controls">
                                    <input type="text" name="code_brand" id="code_brand">
                                    <input type="hidden" name="code_brand_confirm" id="code_brand_confirm">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Tên thương hiệu</label>
                                <div class="controls">
                                    <input type="text" name="name_brand" id="name_brand">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Logo</label>
                                <div class="controls">
                                    <input type="file" name="logo" id="logo">
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
<?php $this->load->view('admin/layouts/footer'); ?>
<script>
    $(document).ready(function () {
        $("#add_product_type").validate({
            rules:{
                code_product_type:{
                    required:true,
                    equalTo:"#code_product_type_confirm"
                },
                name_product_type:{
                    required:true
                },
                description_type:{
                    required:true
                }
            },
            messages:{
                code_product_type:{
                    required:'Không được để trống',
                    equalTo:"Mã đã tồn tại"
                },
                name_product_type:{
                    required:'Không được để trống'
                },
                description_type:{
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

        $('#code_product_type').on('keyup',function(){
            if($('#code_product_type').val()!==''){
                $('#code_product_type_confirm').val($('#code_product_type').val());
                $.ajax({
                    url: "<?php echo base_url('admin/product/check_code_product_type_exist');?>",
                    type: "post",
                    data: {'code_product_type':$('#code_product_type').val()},
                    success:function(response){
                        var data=JSON.parse(response);
                        $('#code_product_type_confirm').val(data);
                    }
                });
            }
        });

        $("#add_brand").validate({
            rules:{
                code_brand:{
                    required:true,
                    equalTo:"#code_brand_confirm"
                },
                name_brand:{
                    required:true
                }
            },
            messages:{
                code_brand:{
                    required:'Không được để trống',
                    equalTo:"Mã đã tồn tại"
                },
                name_brand:{
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

        $('#code_brand').on('keyup',function(){
            if($('#code_brand').val()!==''){
                $('#code_brand_confirm').val($('#code_brand').val());
                $.ajax({
                    url: "<?php echo base_url('admin/product/check_code_brand_exist');?>",
                    type: "post",
                    data: {'code_brand':$('#code_brand').val()},
                    success:function(response){
                        var data=JSON.parse(response);
                        $('#code_brand_confirm').val(data);
                    }
                });
            }
        });


        $('#add_img').click(function(){
            $(this).parent().append('<input type="file" name="img_list[]" id="img_list">');
        });

        $("#information_product").validate({
            rules:{
                code_product:{
                    required:true,
                    equalTo:"#code_product_confirm"
                },
                name_product:{
                    required:true
                },
                description:{
                    required:true
                }
            },
            messages:{
                code_product:{
                    required:'Không được để trống',
                    equalTo:"Mã đã tồn tại"
                },
                name_product:{
                    required:'Không được để trống'
                },
                description:{
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

        $('#code_product').on('keyup',function(){
            if($('#code_product').val()!==''){
                $('#code_product_confirm').val($('#code_product').val());
                $.ajax({
                    url: "<?php echo base_url('admin/product/check_code_product_exist');?>",
                    type: "post",
                    data: {'code':$('#code_product').val()},
                    success:function(response){
                        var data=JSON.parse(response);
                        $('#code_product_confirm').val(data);
                    }
                });
            }
        });

    });

</script>

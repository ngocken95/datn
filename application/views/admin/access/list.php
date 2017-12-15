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
                        </div>
                        <div class="widget-content">
                            <div class="control-group">
                                <form action="<?php echo base_url('admin/access');?>" method="POST" name="information_access" id="information_access">
                                    <label class="control-label span2">Tài khoản</label>
                                    <div class="controls">
                                        <select name="account" id="account" class="span4">
                                        <?php
                                        showSelectAccount($list_account,$acc);
                                        ?>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <form action="<?php echo base_url('admin/access/save');?>" method="post" name="save_access" id="save_access">
                                <input type="hidden" value="" name="account_id" id="account_id">
                            <input type="submit" class="btn btn-small btn-success" value="Lưu" style="margin-left: 5px;margin-top: -12px">
                            <table class="table table-bordered table-striped with-check">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên module</th>
                                    <th>Xem</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                    <th>Thêm</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $stt=1;
                                    foreach ($items as $item) {
                                        ?>
                                        <tr>
                                            <td><?php echo $stt;?></td>
                                            <td><?php echo $item['name'];?></td>
                                            <td style="text-align: center"><input type="checkbox" name="view[]" value="<?php echo $item['id'];?>" <?php echo ($item['view']==1)?'checked':'';?>></td>
                                            <td style="text-align: center"><input type="checkbox" name="edit[]" value="<?php echo $item['id'];?>" <?php echo ($item['edit']==1)?'checked':'';?>></td>
                                            <td style="text-align: center"><input type="checkbox" name="delete[]" value="<?php echo $item['id'];?>" <?php echo ($item['delete']==1)?'checked':'';?>></td>
                                            <td style="text-align: center"><input type="checkbox" name="add[]" value="<?php echo $item['id'];?>" <?php echo ($item['add']==1)?'checked':'';?>></td>
                                            <td style="text-align: center"><input type="checkbox" name="all"></td>
                                        </tr>
                                        <?php
                                        $stt++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('admin/layouts/footer'); ?>

<script>
    $(document).ready(function(){
        $('#account_id').val($('#account').val());

        $('#account').on('change',function(){
            console.log($('#account').val());
            $('#information_access').submit();
        });

        $('input[name=all]').change(function(){
            var checkedStatus = this.checked;
            var checkbox = $(this).parents('tr').find('input:checkbox');
            checkbox.each(function() {
                this.checked = checkedStatus;
                if (checkedStatus == this.checked) {
                    $(this).closest('.checker > span').removeClass('checked');
                }
                if (this.checked) {
                    $(this).closest('.checker > span').addClass('checked');
                }
            });
        })
    })
</script>
   
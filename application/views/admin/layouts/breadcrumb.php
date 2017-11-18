<div id="content-header">
    <div id="breadcrumb">
        <a href="<?php echo base_url();?>admin/homepage" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a>
        <?php
        if($active['code']!='homepage'){
            ?>
            <a href="<?php echo base_url();?>admin/<?php echo $active['code'];?>" title="<?php echo $active['name'];?>" class="tip-bottom"> <?php echo $active['name'];?></a>
            <?php
        }
        if(isset($action)){
            if($action=='add'){
                ?>
                <a href="<?php echo base_url();?>admin/<?php echo $active['code'];?>/add" title="Thêm mới" class="tip-bottom"> Thêm mới</a>
                <?php
            }
            if($action=='list'){
                ?>
                <a href="<?php echo base_url();?>admin/<?php echo $active['code'];?>" title="Danh sách" class="tip-bottom"> Danh sách</a>
                <?php
            }
            if($action=='edit'){
                ?>
                <a href="<?php echo base_url();?>admin/<?php echo $active['code'];?>/edit" title="Sửa" class="tip-bottom"> Sửa</a>
                <?php
            }
        }
        ?>
    </div>
</div>
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li class="<?php echo ($active['code'] == 'homepage') ? 'active' : ''; ?>"><a
                    href="<?php echo base_url('admin/homepage'); ?>"><i class="icon icon-home"></i>
                <span>Bảng điều khiển</span></a></li>
        <li class="submenu <?php echo ($active['code'] == 'module' || $active['code'] == 'account' || $active['code'] == 'access' || $active['code'] == 'log') ? 'active' : ''; ?>">
            <a href="#"><i
                        class="icon icon-info-sign"></i> <span>Hệ thống</span></a>
            <ul>
                <?php
                foreach ($access as $act) {
                    if ($act['code'] == 'module' && $act['view_act'] == 1) {
                        ?>
                        <li class="<?php echo ($active['code'] == 'module') ? 'active' : ''; ?>"><a
                                    href="<?php echo base_url('admin/module'); ?>">Module</a></li>
                        <?php
                    }
                    if ($act['code'] == 'account' && $act['view_act'] == 1) {
                        ?>
                        <li class="<?php echo ($active['code'] == 'account') ? 'active' : ''; ?>"><a
                                    href="<?php echo base_url('admin/account'); ?>">Tài khoản</a></li>
                        <?php
                    }
                    if ($act['code'] == 'access' && $act['view_act'] == 1) {
                        ?>
                        <li class="<?php echo ($active['code'] == 'access') ? 'active' : ''; ?>"><a
                                    href="<?php echo base_url('admin/access'); ?>">Quyền truy cập</a></li>
                        <?php
                    }
                    if ($act['code'] == 'log' && $act['view_act'] == 1) {
                        ?>
                        <li class="<?php echo ($active['code'] == 'log') ? 'active' : ''; ?>"><a
                                    href="<?php echo base_url('admin/log'); ?>">Log thao tác</a></li>
                        <?php
                    }
                }
                ?>
            </ul>
        </li>
        <li class="submenu <?php echo ($active['code'] == 'order') ? 'active' : ''; ?>">
            <a href="#"><i
                        class="icon icon-truck"></i> <span>Cửa hàng</span></a>
            <ul>
                <?php
                foreach ($access as $act) {
                    if ($act['code'] == 'order' && $act['view_act'] == 1) {
                        ?>
                        <li class="<?php echo ($active['code'] == 'order') ? 'active' : ''; ?>"><a
                                    href="<?php echo base_url('admin/order'); ?>">Đơn hàng</a></li>
                        <?php
                    }
                }
                ?>
            </ul>
        </li>
        <li class="submenu <?php echo ($active['code'] == 'product' || $active['code'] == 'color' || $active['code'] == 'importwh' || $active['code'] == 'exportwh') ? 'active' : ''; ?>">
            <a href="#"><i
                        class="icon icon-truck"></i> <span>Kho</span></a>
            <ul>
                <?php
                foreach ($access as $act) {
                    if ($act['code'] == 'product' && $act['view_act'] == 1) {
                        ?>
                        <li class="<?php echo ($active['code'] == 'product') ? 'active' : ''; ?>"><a
                                    href="<?php echo base_url('admin/product'); ?>">Sản phẩm</a></li>
                        <?php
                    }
                    if ($act['code'] == 'color' && $act['view_act'] == 1) {
                        ?>
                        <li class="<?php echo ($active['code'] == 'color') ? 'active' : ''; ?>"><a
                                    href="<?php echo base_url('admin/color'); ?>">Màu son</a></li>
                        <?php
                    }
                    if ($act['code'] == 'importwh' && $act['view_act'] == 1) {
                        ?>
                        <li class="<?php echo ($active['code'] == 'importwh') ? 'active' : ''; ?>"><a
                                    href="<?php echo base_url('admin/importwh'); ?>">Nhập kho</a></li>
                        <?php
                    }
                    if ($act['code'] == 'exportwh' && $act['view_act'] == 1) {
                        ?>
                        <li class="<?php echo ($active['code'] == 'exportwh') ? 'active' : ''; ?>"><a
                                    href="<?php echo base_url('admin/exportwh'); ?>">Xuất kho</a></li>
                        <?php
                    }
                }
                ?>
            </ul>
        </li>
    </ul>
</div>

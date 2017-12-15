<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// ------------------------------------------------------------------------

if (!function_exists('showTableAccount')) {
    function showTableAccount($categories, $act, $parent_id = 0, $char = '')
    {
        $stt = 0;
        foreach ($categories as $key => $item) {
            if ($item['group_account_id'] == $parent_id) {

                if ($parent_id == 0) {
                    echo '<tr>';
                    echo '<td style="background: #27a9e3 !important;font-size:15px;text-transform: uppercase;color:white" colspan="6">' . $item['name'] . '</td>';
                    echo '<td><input type="hidden" value="' . $item['id'] . '">';
                    if ($act['edit_act'] == 1) {
                        echo '<button type="button" class="btn btn-info btn-small" name="btnEdit" data-toggle="modal" data-target="#editGroup">Sửa</button>';
                    }
                    if ($act['delete_act'] == 1) {
                        ?><a class="btn btn-warning btn-small"
                             href="<?php echo base_url('admin/account/delete/') . $item['id']; ?>"
                             onclick="return confirm('Bạn có muốn xóa?')">Xóa</a>
                        <?php
                    }
                    echo '</td>';
                    echo '</tr>';
                } else {
                    $stt++;
                    echo '<tr>';
//                    echo '<td style="text-align: center;"><input type="checkbox"/></td>';
                    echo '<td>' . $stt . '</td>';
                    echo '<td>' . $item['username'] . '</td>';
                    echo '<td>' . md5($item['password']) . '</td>';
                    echo '<td>' . $item['name'] . '</td>';
                    echo '<td>' . $item['email'] . '</td>';
                    echo '<td>' . $item['phone'] . '</td>';
                    echo '<td>
                            <input type="hidden" value="' . $item['id'] . '">';
                    if ($item['id'] != 2) {
                        if ($act['edit_act'] == 1) {
                            echo '<a href="' . base_url('admin/account/edit/' . $item['id']) . '" class="btn btn-link"><i class="icon icon-pencil"></i></a>';
                        }
                        if ($act['delete_act'] == 1) {
                            ?><a class="btn btn-link"
                                 href="<?php echo base_url('admin/account/delete/') . $item['id']; ?>"
                                 onclick="return confirm('Bạn có muốn xóa?')"><i class="icon icon-trash"></i></a>
                            <?php
                        }
                    }
                    echo '</td>';
                    echo '</tr>';
                }
                unset($categories[$key]);
                showTableAccount($categories, $act, $item['id'], $char . '|---');
            }
        }
    }
}

if (!function_exists('showSelectAccount')) {
    function showSelectAccount($categories,$check_account=1, $parent_id = 0, $char = '')
    {
        $check = isset($_POST['account']) ? $_POST['account'] :$check_account;
        foreach ($categories as $key => $item) {
            if ($item['group_account_id'] == $parent_id) {
                if ($parent_id == 0) {
                    if ($item['id'] == $check) {
                        echo '<option value="' . $item['id'] . '" selected=\'selected\'>';
                    } else {
                        echo '<option value="' . $item['id'] . '">';
                    }
                    echo $char . $item['name'];
                    echo '</option>';
                    unset($categories[$key]);
                    showSelectAccount($categories,$check_account, $item['id'], $char . '|---');
                } else {
                    if ($item['id'] == $check) {
                        echo '<option value="' . $item['id'] . '" selected=\'selected\'>';
                    } else {
                        echo '<option value="' . $item['id'] . '">';
                    }
                    echo $char . $item['username'] . ' - ' . $item['name'];
                    echo '</option>';
                    unset($categories[$key]);
                    showSelectAccount($categories,$check_account, $item['id'], $char . '|---');
                }
            }
        }
    }
}

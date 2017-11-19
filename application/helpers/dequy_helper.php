<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// ------------------------------------------------------------------------

if ( ! function_exists('showTable'))
{
    function showTableAccount($categories, $parent_id = 0, $char = '')
    {
        $stt=0;
        foreach ($categories as $key => $item)
        {
            // Nếu là chuyên mục con thì hiển thị
            if ($item['group_account_id'] == $parent_id)
            {

                if($parent_id==0){
                    echo '<tr>';
                    echo '<td style="background: #27a9e3 !important;font-size:15px;text-transform: uppercase;" colspan="7">' . $item['name'].'</td>';
                    echo '<td><input type="hidden" value="'.$item['id'].'">
                            <button type="button" class="btn btn-info btn-small" name="btnEdit" data-toggle="modal" data-target="#editGroup">Sửa</button>
                            <button type="button" class="btn btn-info btn-small" name="btnDel" data-toggle="modal" data-target="#delGroup">Xóa</button>
                            </td>';
                    echo '</tr>';
                }
                else{
                    $stt++;
                    echo '<tr>';
                    echo '<td style="text-align: center;"><input type="checkbox"/></td>';
                    echo '<td>'.$stt.'</td>';
                    echo '<td>' . $item['username'].'</td>';
                    echo '<td>' . md5($item['password']).'</td>';
                    echo '<td>' . $item['name'].'</td>';
                    echo '<td>' . $item['email'].'</td>';
                    echo '<td>' . $item['phone'].'</td>';
                    echo '<td>
                            <a href="'.base_url().'admin/account/edit/'.$item['id'].'"><i class="icon icon-pencil"></i></a>
                            <a href="'.base_url().'admin/account/delete/'.$item['id'].'"><i class="icon icon-trash"></i></a>
                            </td>';
                    echo '</tr>';
                }

                // Xóa chuyên mục đã lặp
                unset($categories[$key]);

                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                showTableAccount($categories, $item['id'], $char.'|---');
            }
        }
    }
}

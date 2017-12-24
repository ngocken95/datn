<?php $this->load->view('site/layouts/head'); ?>
<?php $this->load->view('site/layouts/header'); ?>
    <section class="cart">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h3> Giỏ hàng </h3>
                    <form action="<?php echo base_url('cart/updatecart'); ?>" method="post" name="updateCart">
                        <table class="table table-striped table-responsive table-bordered">
                            <p class="bg-info"></p>
                            <thead>
                            <tr>
                                <th></th>
                                <th>Ảnh sản phẩm</th>
                                <th>Tên</th>
                                <th>Giá tiền</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th>Xóa</th>
                            </tr>
                            <?php
                            $stt = 1;
                            if (!empty($this->cart->contents())) {
                                foreach ($this->cart->contents() as $key => $product) {
                                    ?>
                                    <tr>
                                        <td><?php echo $stt; ?></td>
                                        <td><img src="<?php echo base_url('upload/' . $product['option']['img']); ?>"
                                                 alt=""></td>
                                        <td><?php echo $product['name'] . ' - ' . $product['option']['color']; ?></td>
                                        <td><?php echo $product['price']; ?></td>
                                        <td style="width: 10%">
                                            <input type="hidden" value="<?php echo $product['id']; ?>" name="id[]">
                                            <input type="number"
                                                                      value="<?php echo $product['qty']; ?>"
                                                                      name="qty[]" class="form-control"></td>
                                        <td><?php echo $product['subtotal']; ?></td>
                                        <td><a href="<?php echo base_url('cart/delete/' . $key); ?>"><i
                                                        class="glyphicon glyphicon-trash"></i></a></td>
                                    </tr>
                                    <?php
                                    $stt++;
                                }
                            }
                            ?>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="4"></td>
                                <td colspan="1">
                                    <button type="submit" class="btn btn-button">Cập nhật số lượng</button>
                                </td>
                                <td colspan="" align="center"><?php $this->cart->total(); ?></td>
                                <td colspan="" align="center"></td>
                            </tr>

                            </tr>
                            </tbody>
                        </table>
                    </form>
                    <a href="<?php echo base_url('search'); ?>" class=" btn btn-danger custom-btn">Tiếp tục mua hàng</a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h3>Thông tin đặt hàng</h3>
                    <h4>Vui lòng để lại thông tin để chúng tôi giao hàng!</h4>
                    <form class="custom-form form-horizontal" role="form"
                          action="<?php echo base_url('cart/addorder'); ?>" method="post" name="infoUser">
                        <?php if (!$this->session->userdata('user')['id']) {
                            ?>
                            <div class="form-group">
                                <label for="fullname" class="col-sm-2 control-label">Tên đầy đủ<span
                                            class="form-require"> (*)</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" required name="name"
                                           placeholder="Tên đầy đủ" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                           value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-2 control-label">Điện thoại<span class="form-require"> (*)</span></label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" required="" id="phone" name="phone"
                                           placeholder="Điện thoại" value="">
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">Địa chỉ<span
                                        class="form-require"> (*)</span></label>
                            <div class="col-sm-10">
                                <textarea class="form-control" required="" rows="3" name="address"
                                          placeholder="Địa chỉ giao hàng"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="note" class="col-sm-2 control-label">Ghi chú</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" name="note" placeholder="Ghi chú"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <?php
                                if ($this->cart->total_items() > 0) {
                                    ?>
                                    <button type="submit" id="send_order" class=" btn btn-danger custom-btn">Gửi đơn
                                        hàng
                                    </button>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php
if ($this->session->flashdata('update_success')) {
    ?>
    <script>
        alert('<?php echo $this->session->flashdata('update_success');?>');
    </script>
    <?php
}

if ($this->session->flashdata('order_success')) {
    ?>
    <script>
        alert('<?php echo $this->session->flashdata('order_success');?>');
        $.ajax({
            url: "<?php echo base_url('admin/homepage/check_order');?>",
            success: function (response) {
                var data = JSON.parse(response);
                console.log(data);
                if (data > 0) {
                    $.gritter.add({
                        title: 'Thông báo',
                        text: '<a href="<?php echo base_url('admin/order');?>">Có ' + data + ' đơn hàng mới</a>',
                        image: '',
                        sticky: false
                    });
                }
            }
        });
    </script>
    <?php
}
?>
<?php $this->load->view('site/layouts/footer'); ?>
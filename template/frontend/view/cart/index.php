<?php include_once 'view/partial/head.php';?>
<?php include_once 'view/partial/header.php';?>
<section class="cart" >
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h3> Giỏ hàng </h3>
                <form action="http://mantan081.webmantan.com/saveOrderProduct_reloadOrder" method="post" name="updateCart">
                    <table class="table table-striped table-responsive table-bordered">
                        <p class="bg-info"></p>
                        <thead>
                        <tr>
                            <th></th>
                            <th>Ảnh sản phẩm</th>
                            <th>Tên</th>
                            <th>Giá tiền </th>
                            <th>Số lượng </th>
                            <th>Thành tiền</th>
                            <th>Xóa </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="4">
                                <input id="codeDiscount" class="form-control" type="text" value="" name="codeDiscount" placeholder="Nhập mã giảm giá sau đó ấn Cập nhập giỏ hàng" />
                            </td>
                            <td colspan="1">
                                <button type="submit"  class="btn btn-button">Cập nhật</button>
                            </td>
                            <td colspan="6" align="center">
                                Giỏ hàng trống
                            </td>
                        </tr>

                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h3>Thông tin đặt hàng</h3>
                <h4>Vui lòng để lại thông tin để chúng tôi giao hàng!</h4>
                <form class="custom-form form-horizontal" role="form" action="http://mantan081.webmantan.com/saveOrderProduct_addOrder" method="post" name="infoUser" onsubmit="checkInfoUser();">
                    <input type="hidden" name="userId" value="">
                    <input type="hidden" name="totalMoney" value="0">
                    <div class="form-group">
                        <label for="fullname" class="col-sm-2 control-label" >Tên đầy đủ<span class="form-require"> (*)</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fullname" required name="fullname" placeholder="Tên đầy đủ" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-sm-2 control-label">Điện thoại<span class="form-require"> (*)</span></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" required="" id="phone" name="phone" placeholder="Điện thoại" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-sm-2 control-label">Địa chỉ<span class="form-require"> (*)</span></label>
                        <div class="col-sm-10">
                            <textarea class="form-control" required="" rows="3" name="address" placeholder="Địa chỉ giao hàng"></textarea>
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
                            <button type="submit" class=" btn btn-danger custom-btn">Gửi đơn hàng</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var urlHomes = "http://mantan081.webmantan.com/";
        var urlPluginCart = "/cart/";

        function deleteProductCart(idProduct)
        {
            var r = confirm('Bạn có chắc chắn muốn xóa không?');
            if (r)
            {
                $.ajax({
                    type: "POST",
                    url: urlHomes + "saveOrderProduct_deleteProductCart",
                    data: {idProduct: idProduct}
                }).done(function (msg) {
                    window.location = urlPluginCart;
                })
                    .fail(function () {
                        alert('Quá trình xử lý bị lỗi !');
                        return false;
                    });
            }
        }

        function clearCart()
        {
            var r = confirm('Bạn có chắc chắn muốn làm trống giỏ hàng không?');
            if (r)
            {
                $.ajax({
                    type: "POST",
                    url: urlPluginProduct + "saveOrderProduct_clearCart",
                    data: {}
                }).done(function (msg) {
                    window.location = urlPluginCart;
                })
                    .fail(function () {
                        alert('Quá trình xử lý bị lỗi !');
                        return false;
                    });
            }
        }
        function changeNumberProduct()
        {
            document.updateCart.submit();
        }
    </script>
</section>
<?php include_once 'view/partial/footer.php';?>
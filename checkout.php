<?php
include_once 'include/header.php';
require_once './lib/session.php';
require_once './lib/database.php';
Session::init();
Session::checkuserLogin();
?>
<!-- Header End====================================================================== -->
<div id="mainBody">
    <div class="container">
        <div class="row">
            <!-- Sidebar ================================================== -->
            <?php
            include 'include/sidebar.php'
            ?>
            <!-- Sidebar end=============================================== -->
            <div class="span9">
                <ul class="breadcrumb">
                    <li><a href="index.php">Trang chủ</a> <span class="divider">/</span></li>
                    <li class="active">Thanh toán</li>
                </ul>
                <h3> Thanh toán</h3>
                <hr class="soft" />
                <?php 
                    $login_check = Session::get('customer_name');
                ?>
                <form method="post" action="./classes/dathang.php" class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label" for="name">Họ tên <sup>*</sup></label>
                        <div class="controls">
                            <input type="text" name="name" id="name" placeholder="Họ tên" value="<?=$login_check?>" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="phone"> Số điện thoại <sup>*</sup></label>
                        <div class="controls">
                            <input type="text" name="phone" id="phone" placeholder="Số điện thoại" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="address"> Địa chỉ <sup>*</sup></label>
                        <div class="controls">
                            <input type="text" name="address" id="address" placeholder="Địa chỉ" required>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Mô tả</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Tổng tiền sản phẩm</th>
                                <th>Giảm giá</th>
                                <th>Tổng cộng</th>
                            </tr>
                        </thead>
                        <?php
                        if (isset($_SESSION['cart'])) {
                            $tongtien = 0;
                        ?>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($_SESSION['cart'] as $cart_item) {
                                    $i++;
                                    $thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
                                    $tongcong = $thanhtien - (($cart_item['giamgia'] * $thanhtien) / 100);
                                    $tongtien += $tongcong;
                                ?>
                                    <tr>
                                        <td>
                                            <img width="60" src="admin/uploads/<?php echo $cart_item['hinh'] ?>" />
                                        </td>
                                        <td><?php echo $cart_item['tensanpham'] ?></td>
                                        <td>
                                            <div class="input-append">
                                                <input readonly class="span1" style="max-width:34px" value="<?php echo $cart_item['soluong'] ?>" id="appendedInputButtons" size="16" type="text">

                                            </div>
                                        </td>
                                        <td><?php echo number_format($cart_item['giasp'], 0, ',', '.') . ' ' . 'VND';  ?></td>
                                        <td><?php echo number_format($thanhtien, 0, ',', '.') . ' ' . 'VND'; ?></td>
                                        <td><?php echo $cart_item['giamgia'] ?> %</td>
                                        <td><?php echo number_format($tongcong, 0, ',', '.') . ' ' . 'VND'; ?></td>
                                    </tr>
                                <?php
                                }
                                ?>

                                <tr>
                                    <td colspan="6" style="text-align:right"><strong>Tổng cộng = </strong>
                                    </td>
                                    <input type="hidden" name="tongtien" value="<?php echo $tongtien ?>">

                                    <td class="label label-important" style="display:block"> <strong><?php echo number_format($tongtien, 0, ',', '.'); ?> VND </strong></td>
                                </tr>
                                <tr>
                                    <td colspan="12" style="text-align:right">
                                        <strong>
                                            <a href="./product_summary.php">Trở lại trang giỏ hàng </a>

                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        <?php

                        } else {
                        ?>
                            <tbody>
                                <h2>Chưa chọn sản phẩm để thanh toán</h2>
                                <tr>
                                    <td colspan="12" style="text-align:right">
                                        <strong>
                                            <a href="./product_summary.php">Trở lại trang giỏ hàng </a>

                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        <?php
                        }
                        ?>
                    </table>

                    <div class="control-group pull-right">
                        <div class="controls">
                            <input type="hidden" name="email_create" value="1">
                            <input class="btn btn-large btn-success" type="submit" value="Đặt hàng" />
                        </div>
                    </div>
                </form>

            </div>
            <?php
                $tong = 0;
                foreach ($_SESSION['cart'] as $key => $value) {
                    $tien = $value['soluong']*$value['giasp'];
                    $tong += $tien;
                }
            ?>
            <form method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="classes/momoqr.php">
                <input class="pull-right btn-large" style="background-color:#a50064;border:#a50064;color:#ffffff" type="submit" name="" value="Thanh toán MOMO QR" />
            </form>
            <form method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="classes/momoatm.php">
                <input name = "tongtienmomo" type="hidden" value = "<?php echo $tong ?>">
                <input class="pull-right btn-large" style="margin-right:10px;background-color:#a50064;border:#a50064;color:#ffffff" type="submit" name="" value="Thanh toán MOMO ATM" />
            </form>
        </div>
    </div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php
include 'include/footer.php'
?>
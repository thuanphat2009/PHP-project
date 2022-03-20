<?php 
	include_once 'include/header.php';
	include_once 'include/slider.php';
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

                    <form class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label" for="inputFname1">Họ tên <sup>*</sup></label>
                            <div class="controls">
                                <input type="text" id="inputFname1" placeholder="Họ tên">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="input_phone"> Số điện thoại <sup>*</sup></label>
                            <div class="controls">
                                <input type="text" id="input_phone" placeholder="Số điện thoại">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="input_phone"> Địa chỉ <sup>*</sup></label>
                            <div class="controls">
                                <input type="text" id="input_phone" placeholder="Địa chỉ">
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
                            <tbody>
                                <tr>
                                    <td> <img width="60" src="themes/images/products/4.jpg" alt="" /></td>
                                    <td>MASSA AST<br />Color : black, Material : metal</td>
                                    <td>
                                        <div class="input-append">
                                            <input class="span1" style="max-width:34px" placeholder="1"
                                                id="appendedInputButtons" size="16" type="text" readonly>
                                        </div>
                                    </td>
                                    <td>$120.00</td>
                                    <td>$25.00</td>
                                    <td>$15.00</td>
                                    <td>$110.00</td>
                                </tr>
                                <tr>
                                    <td> <img width="60" src="themes/images/products/8.jpg" alt="" /></td>
                                    <td>MASSA AST<br />Color : black, Material : metal</td>
                                    <td>
                                        <div class="input-append"><input class="span1" style="max-width:34px"
                                                placeholder="1" size="16" type="text" readonly> </div>
                                    </td>
                                    <td>$7.00</td>
                                    <td>--</td>
                                    <td>$1.00</td>
                                    <td>$8.00</td>
                                </tr>
                                <tr>
                                    <td> <img width="60" src="themes/images/products/3.jpg" alt="" /></td>
                                    <td>MASSA AST<br />Color : black, Material : metal</td>
                                    <td>
                                        <div class="input-append"><input class="span1" style="max-width:34px"
                                                placeholder="1" size="16" type="text" readonly> </div>
                                    </td>
                                    <td>$120.00</td>
                                    <td>$25.00</td>
                                    <td>$15.00</td>
                                    <td>$110.00</td>
                                </tr>

                                <tr>
                                    <td colspan="6" style="text-align:right">Tổng tiền: </td>
                                    <td> $228.00</td>
                                </tr>
                                <tr>
                                    <td colspan="6" style="text-align:right">Tổng giảm giá: </td>
                                    <td> $50.00</td>
                                </tr>
                                <tr>
                                    <td colspan="6" style="text-align:right">Tổng cộng: </td>
                                    <td> $31.00</td>
                                </tr>
                                <tr>
                                    <td colspan="6" style="text-align:right"><strong>Tổng cộng =</strong>
                                    </td>
                                    <td class="label label-important" style="display:block"> <strong> $155.00 </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="control-group pull-right">
                            <div class="controls">
                                <input type="hidden" name="email_create" value="1">
                                <input type="hidden" name="is_new_customer" value="1">
                                <input class="btn btn-large btn-success" type="submit" value="Đặt hàng" />
                            </div>
                        </div>
                    </form>
                    < </div>
                </div>
            </div>
        </div>
        <!-- MainBody End ============================= -->
        <!-- Footer ================================================================== -->
        <?php
	include 'include/footer.php'
?>
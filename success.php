<?php
include_once 'include/header.php';
if (isset($_GET['partnerCode'])) {
	$bytes = random_bytes(20);
	$code_order = bin2hex($bytes);
	$name = "";
	$phone = "";
	$address = "";
	$id_khachhang = $_SESSION['customer_id'];
	$tongtien = $_GET['amount'];
	$partnerCode = $_GET['partnerCode'];
	$orderId = $_GET['orderId'];
	$amount = $_GET['amount'];
	$orderInfo = $_GET['orderInfo'];
	$orderType = $_GET['orderType'];
	$transId = $_GET['transId'];
	$payType = $_GET['payType'];
	$insert_momo = "INSERT INTO tbl_momo(partnerCode,orderId,amount,orderInfo,orderType,transId,payType,code_order) 
	VALUES('" . $partnerCode . "','" . $orderId . "','" . $amount . "','" . $orderInfo . "', '" . $orderType . "','" . $transId . "' 
	,'" . $payType . "','" . $code_order . "')";
	$momo_query = mysqli_query($db->conn, $insert_momo);
	if ($momo_query) {
		$ngaylap =  date("Y/m/d");
		$insert_order = "INSERT INTO tbl_order(id_khachhang,code_order,status,userName,phone,address,tongtien,ngaylap) VALUES('" . $id_khachhang . "','" . $code_order . "',1,'" . $name . "', '" . $phone . "','" . $address . "' ,'" . $tongtien . "','" . $ngaylap . "')";
		$momo_query = mysqli_query($db->conn, $insert_order);
		if (isset($_SESSION['cart'])) {
			foreach ($_SESSION['cart'] as $key => $value) {
				$id_sanpham = $value['id'];
				$sanphamdat = $product->getproductbyId($id_sanpham);
				$soluong = $value['soluong'];
				$tonkhomoi = $value['tonkho'] - $soluong;
				$daban = $value['daban'] + $value['soluong'];
				$update_query = "UPDATE tbl_product SET 
							daban = '$daban' ,tonkho = '$tonkhomoi' 
							WHERE productId = '$id_sanpham'";
				$insert_order_detail = "INSERT INTO tbl_order_detail(id_product,code_order,soluong) VALUES('" . $id_sanpham . "','" . $code_order . "','" . $soluong . "')";
				mysqli_query($db->conn, $insert_order_detail);
				mysqli_query($db->conn, $update_query);
			}
		}
	}
	unset($_SESSION['cart']);
}
?>
<div id="mainBody">
	<div class="container">
		<div class="row">
			<!-- Sidebar ================================================== -->
			<?php
			include 'include/sidebar.php'
			?>
			<!-- Sidebar end=============================================== -->
			<?php

			if (isset($_GET['message'])) {
				$mess = $_GET['message'];
				if ($mess == 'Successful.') {

			?>
					<div class="span9">
						<h2 class="text-center">C???m ??n b???n ???? ?????t h??ng qua Momo </br> ????n h??ng c???a b???n ??ang ???????c x??? l??</h2>
						<img src="./admin/uploads/Thank-you.jpg" alt="">
					</div>
				<?php
				} else {
				?>
					<div class="span9">
						<h2 class="text-center">?????t h??ng qua Momo th???t b???i</br> Vui l??ng th??? l???i sau</h2>
						<img src="./admin/uploads/Thank-you.jpg" alt="">
					</div>

				<?php }
			} else { ?>
				<div class="span9">
					<h2 class="text-center">C???m ??n b???n ???? ?????t h??ng </br> ????n h??ng c???a b???n ??ang ???????c x??? l??</h2>
					<img src="./admin/uploads/Thank-you.jpg" alt="">
				</div>
			<?php } ?>
		</div>
	</div>
</div>
<!-- Footer ================================================================== -->
<?php
include 'include/footer.php'
?>
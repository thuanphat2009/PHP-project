<?php
require_once '../lib/session.php';
require_once '../lib/database.php';
require_once '../classes/product.php';
$product = new Product();
Session::init();
$db = new Database();
$id_khachhang = $_SESSION['customer_id'];
$bytes = random_bytes(20);
$code_order = bin2hex($bytes);
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$tongtien = $_POST['tongtien'];
$ngaylap =  date("Y/m/d");
$insert_order = "INSERT INTO tbl_order(id_khachhang,code_order,status,userName,phone,address,tongtien,ngaylap) VALUES('" . $id_khachhang . "','" . $code_order . "',1,'" . $name . "', '" . $phone . "','" . $address . "' ,'" . $tongtien . "','" . $ngaylap . "')";
$order_query = mysqli_query($db->conn, $insert_order);
if ($order_query) {
    // Them chi tiet hoa don
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
unset($_SESSION['cart']);
header("Location:../success.php");

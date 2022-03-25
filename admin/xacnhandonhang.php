<?php
include '../classes/order.php';
$order = new Order();
$id = $_GET['code'];
if (isset($_GET['code'])) {
    $code = $_GET['code'];
}
$updateStatus = $order->xacnhandonhang($id);
header('Location:./orderlist.php');

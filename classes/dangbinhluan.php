<?php
include '../lib/session.php';
Session::init();
include '../classes/comment.php';
$comment = new Comment();

$id_khachhang = $_SESSION['customer_id'];
$id_sanpham = $_POST['proid'];
$binhluan = $_POST['binhluan'];
date_default_timezone_set("Asia/Ho_Chi_Minh");
$ngay = date("Y/m/d");
$gio = date('H:i');
$insert_comment = $comment -> insert_comment($id_khachhang,$id_sanpham,$ngay,$gio,$binhluan);
header('Location: ' . $_SERVER['HTTP_REFERER']);
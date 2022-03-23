<?php
include '../lib/session.php';
Session::init();
include '../lib/database.php';
$db = new Database();
// session_destroy();
// Tang sl
if (isset($_GET['tangsl'])) {
    $id = $_GET['tangsl'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array(
                'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinh' => $cart_item['hinh'], 'giamgia' => $cart_item['giamgia'], 'tonkho' => $cart_item['tonkho']
            );
            $_SESSION['cart'] = $product;
        } else {
            $tangsoluong = $cart_item['soluong'] + 1;
            if($cart_item['soluong'] < $cart_item['tonkho'] ){
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $tangsoluong, 'giasp' => $cart_item['giasp'], 'hinh' => $cart_item['hinh'], 'giamgia' => $cart_item['giamgia'], 'tonkho' => $cart_item['tonkho']
                );
            }
            else{
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinh' => $cart_item['hinh'], 'giamgia' => $cart_item['giamgia'], 'tonkho' => $cart_item['tonkho']
                );
            }
            $_SESSION['cart'] = $product;
        }
    }
    header('Location:../product_summary.php');
}
// Giam sl
if (isset($_GET['giamsl'])) {
    $id = $_GET['giamsl'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array(
                'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinh' => $cart_item['hinh'], 'giamgia' => $cart_item['giamgia'], 'tonkho' => $cart_item['tonkho']
            );
            $_SESSION['cart'] = $product;
        } else {
            $tangsoluong = $cart_item['soluong'] - 1;
            if($cart_item['soluong'] > 1){
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $tangsoluong, 'giasp' => $cart_item['giasp'], 'hinh' => $cart_item['hinh'], 'giamgia' => $cart_item['giamgia'], 'tonkho' => $cart_item['tonkho']
                );
            }
            else{
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinh' => $cart_item['hinh'], 'giamgia' => $cart_item['giamgia'], 'tonkho' => $cart_item['tonkho']
                );
            }
            $_SESSION['cart'] = $product;
        }
    }
    header('Location:../product_summary.php');
}
// Xoa tung sp
if (isset($_SESSION['cart']) && $_GET['xoaspid']) {
    $id = $_GET['xoaspid'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array(
                'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinh' => $cart_item['hinh'], 'giamgia' => $cart_item['giamgia'], 'tonkho' => $cart_item['tonkho']
            );
        }
        $_SESSION['cart'] = $product;
        header('Location:../product_summary.php');
    }
}
// Xoa tat ca sp
if (isset($_GET['xoatatca'])) {
    unset($_SESSION['cart']);
    header('Location:../product_summary.php');
}
// Them sp vao gio hang
if (isset($_POST['themgiohang'])) {
    $id = $_GET['proid'];
    $soluong = 1;
    $sql = "SELECT * FROM tbl_product WHERE productId='" . $id . "' LIMIT 1";
    $query = mysqli_query($db->conn, $sql);
    $row =  mysqli_fetch_array($query);
    echo ($row['giamgia']);
    if ($row) {
        $new_product = array(array(
            'tensanpham' => $row['productName'], 'id' => $id, 'soluong' => $soluong, 'giasp' => $row['price'], 'hinh' => $row['image'], 'giamgia' => $row['giamgia'], 'tonkho' => $row['tonkho']
        ));

        // Kiem tra session gio hang ton tai
        if (isset($_SESSION['cart'])) {
            $found = false;
            foreach ($_SESSION['cart'] as $cart_item) {
                // Neu du lieu trung
                if ($cart_item['id'] == $id) {
                    $product[] = array(
                        'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $soluong + 1, 'giasp' => $cart_item['giasp'], 'hinh' => $cart_item['hinh'], 'giamgia' => $cart_item['giamgia'] , 'tonkho' => $cart_item['tonkho']
                    );
                    $found = true;
                } else {
                    // Neu khong trung
                    $product[] = array(
                        'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinh' => $cart_item['hinh'], 'giamgia' => $cart_item['giamgia'] , 'tonkho' => $cart_item['tonkho']
                    );
                }
            }
            if ($found == false) {
                // lien ket du lieu
                $_SESSION['cart'] = array_merge($product, $new_product);
            } else {
                $_SESSION['cart'] = $product;
            }
        } else {
            $_SESSION['cart'] = $new_product;
        }
    }
    header('Location:../product_summary.php');        // print_r($new_product);

    // print_r($_SESSION['cart']);
}

<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helper/format.php');
?>

<?php
class comment
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }


    public function insert_comment($id_khachhang,$id_sanpham,$ngay,$gio,$noidung)
    {
        $query = "INSERT INTO tbl_comment(id_khachhang,id_product,ngay,gio,noidung) 
        VALUES('" . $id_khachhang . "','" . $id_sanpham . "','" . $ngay . "','" . $gio . "','" . $noidung . "')
        ";
        $result = $this->db->insert($query);
        return $result;
    }
    public function show_comment($id_sanpham)
    {
        $query = "SELECT * FROM tbl_comment,tbl_customer WHERE tbl_comment.id_khachhang = tbl_customer.Id AND tbl_comment.id_product = '$id_sanpham'";
        $result = $this->db->insert($query);
        return $result;
    }
}
?>
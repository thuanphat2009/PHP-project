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
        $query = "SELECT * FROM tbl_comment,tbl_customer WHERE tbl_comment.id_khachhang = tbl_customer.Id AND tbl_comment.id_product = '$id_sanpham' ORDER BY id_comment DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_commentAdmin()
    {
        $query = "SELECT * FROM tbl_comment,tbl_customer,tbl_product WHERE tbl_comment.id_product = tbl_product.productId AND tbl_comment.id_khachhang = tbl_customer.Id  ORDER BY id_comment DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function delete_comment($id_comment)
    {
        $query = "DELETE FROM tbl_comment WHERE id_comment = '$id_comment'";
        $result = $this->db->delete($query);
        return $result;
    }
    public function del_cmt($id){
        $query = "DELETE FROM tbl_comment WHERE id_comment = '$id'";
        $result = $this->db->delete($query);
        if ($result){
            $alert = "<span class='text-success'>Xóa bình luận thành công</span>";             
            return $alert;
        }else{
            $alert = "<span class='text-danger'>Xóa bình luận thất bại</span>";
            return $alert;            
     }
    }
}
?>
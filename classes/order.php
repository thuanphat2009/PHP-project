<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helper/format.php');
?>

<?php
class order
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function showOrder()
    {
        $data = null;
        $sql = "SELECT * From tbl_order ORDER BY id_other DESC";
        $result = $this->db->select($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function showOrderDetail($id)
    {
        $data = null;
        $sql = "SELECT * From tbl_order_detail,tbl_product WHERE tbl_order_detail.productId = tbl_product.productId AND tbl_order_detail.code_order = '$id' ORDER BY tbl_order_detail.id_order_detail DESC";
        $result = $this->db->select($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function xacnhandonhang($id)
    {
        $data = null;
        $sql = "UPDATE tbl_order SET status=0 where code_order = '".$id."'";
        $result = $this->db->select($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
}
?>
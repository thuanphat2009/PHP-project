<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helper/format.php');
?>

<?php
    class category{
        private $db;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_category($cateName){
            $cateName = $this->fm->validation($cateName);
            $connection = $this->db->conn;
            if(empty($cateName)){
                $alert =  "<span class='text-danger'>Không được để trống</span>"; 
                 return $alert;
            }else{
                $query = "INSERT INTO tbl_category(cateName) VALUES('$cateName')";
                $result = $this->db->insert($query);
                if ($result){
                    $alert = "<span class='text-success'>Thêm danh mục thành công</span>";             
                    return $alert;
                }else{
                    $alert = "<span class='text-danger'>Thêm danh mục thất bại</span>";
                    return $alert;            
             }
            
        }
    }
    public function show_category(){
        $query = "SELECT * FROM tbl_category order by cateId desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_category($cateName,$id){
        $cateName = $this->fm->validation($cateName);
        $connection = $this->db->conn;
        $cateName =$connection -> real_escape_string($cateName);
        $id =$connection -> real_escape_string($id);
   
        if(empty($cateName)){
            $alert =  "<span class='text-danger'>Không được để trống</span>"; 
             return $alert;
        }else{
            $query = "UPDATE tbl_category SET cateName = '$cateName' WHERE cateId = '$id'";
            $result = $this->db->update($query);
            if ($result){
                $alert = "<span class='text-success'>Sửa danh mục thành công</span>";             
                return $alert;
            }else{
                $alert = "<span class='text-danger'>Sửa danh mục thất bại</span>";
                return $alert;            
         }
        
    }
    }
    public function del_category($id){
        $query = "DELETE FROM tbl_category WHERE cateId = '$id'";
        $result = $this->db->delete($query);
        if ($result){
            $alert = "<span class='text-success'>Xóa danh mục thành công</span>";             
            return $alert;
        }else{
            $alert = "<span class='text-danger'>Xóa danh mục thất bại</span>";
            return $alert;            
     }
    }
    //USER
    public function getcatebyId($id){
        $query = "SELECT * FROM tbl_category WHERE cateId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }       
    public function add_category(){
        $query = "SELECT * FROM tbl_category order by cateId desc";
        $result = $this->db->select($query);
        return $result;
    }  
    public function get_product_by_cate($id){
        $query = "SELECT * FROM tbl_product WHERE cateId = '$id' order by cateId desc LIMIT 6";
        $result = $this->db->select($query);
        return $result;
    }   
    public function get_name_by_cate($id){
        $query = "SELECT tbl_product.*, tbl_category.cateName, tbl_category.cateId
        From tbl_product , tbl_category 
        WHERE tbl_product.cateId = tbl_category.cateId And tbl_product.cateId= '$id' LIMIT 1
        ";
        $result = $this->db->select($query);
        return $result;
    } 
}
?>
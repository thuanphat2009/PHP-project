<?php
    include '../lib/database.php';
    include '../helper/format.php';
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
                $alert =  "<span class='text-danger'>Category must be not empty</span>"; 
                 return $alert;
            }else{
                $query = "INSERT INTO tbl_category(cateName) VALUES('$cateName')";
                $result = $this->db->insert($query);
                if ($result){
                    $alert = "<span class='text-success'>Insert Category Successfully</span>";             
                    return $alert;
                }else{
                    $alert = "<span class='text-danger'>Insert Category Not Success</span>";
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
            $alert =  "<span class='text-danger'>Category must be not empty</span>"; 
             return $alert;
        }else{
            $query = "UPDATE tbl_category SET cateName = '$cateName' WHERE cateId = '$id'";
            $result = $this->db->update($query);
            if ($result){
                $alert = "<span class='text-success'>Update Category Successfully</span>";             
                return $alert;
            }else{
                $alert = "<span class='text-danger'>Update Category Not Success</span>";
                return $alert;            
         }
        
    }
    }
    public function del_category($id){
        $query = "DELETE FROM tbl_category WHERE cateId = '$id'";
        $result = $this->db->delete($query);
        if ($result){
            $alert = "<span class='text-success'>Delete Category Successfully</span>";             
            return $alert;
        }else{
            $alert = "<span class='text-danger'>Delete Category Not Success</span>";
            return $alert;            
     }
    }
    public function getcatebyId($id){
        $query = "SELECT * FROM tbl_category WHERE cateId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }         
}
?>
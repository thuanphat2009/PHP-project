<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helper/format.php');
?>

<?php
    class product{
        private $db;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_product($data,$files){
        
            $connection = $this->db->conn;
            $productName =$connection -> real_escape_string($data['productName']);
            $category =$connection -> real_escape_string($data['category']);
            $brand =$connection -> real_escape_string($data['brand']);
            $product_desc =$connection -> real_escape_string($data['product_desc']);
            $price =$connection -> real_escape_string($data['price']);
            $tonkho =$connection -> real_escape_string($data['tonkho']);
            // $daban =$connection -> real_escape_string($data['daban']);
            $type =$connection -> real_escape_string($data['type']);
           
             
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];  
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;
            
                  

            if($productName=="" ||  $brand=="" || $category=="" || $product_desc=="" || $price=="" || $type=="" || $file_name=="" || $tonkho==""){                                                                           
                $alert =  "<span class='text-danger'>Không được để trống</span>"; 
                 return $alert;
            }else{
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "INSERT INTO tbl_product(productName,cateId,brandId,product_desc,price,type,image,tonkho) VALUES('$productName','$category','$brand','$product_desc','$price','$type','$unique_image','$tonkho')";
                $result = $this->db->insert($query);
                if ($result){
                    $alert = "<span class='text-success'>Thêm Sản Phẩm thành công</span>";             
                    return $alert;
                }else{
                    $alert = "<span class='text-danger'>Thêm Sản Phẩm thất bại</span>";
                    return $alert;            
             }
            
        }
    }
    public function show_product(){
        // $query = "SELECT * FROM tbl_product order by productId desc";
        $query = "SELECT tbl_product.*, tbl_brand.brandName 
        From tbl_product INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
        order by tbl_product.productId desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_product($data,$files,$id){
        
            $connection = $this->db->conn;
            $productName =$connection -> real_escape_string($data['productName']);
            $category =$connection -> real_escape_string($data['category']);
            $brand =$connection -> real_escape_string($data['brand']);
            $product_desc =$connection -> real_escape_string($data['product_desc']);
            $price =$connection -> real_escape_string($data['price']);
            $type =$connection -> real_escape_string($data['type']);
            $tonkho =$connection -> real_escape_string($data['tonkho']);
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];  
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;
   
            if($productName=="" ||  $brand=="" || $category=="" || $product_desc=="" || $price=="" || $type=="" || $tonkho==""){                                                                           
                $alert =  "<span class='text-danger'>Không được để trống</span>"; 
                 return $alert;
            }else{
                // Nếu ng dùng chọn ảnh
                if(!empty($file_name)){
                if (in_array ($file_ext, $permited) === false)
                  {
                    $alert = "<span class='text-danger'>You can upload only:-".implode(', ', $permited)."</span>";
                    return $alert;
                    }
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query = "UPDATE tbl_product SET 
                    productName = '$productName',
                    cateId = '$category',
                    brandId = '$brand',
                    product_desc = '$product_desc',
                    price = '$price',
                    image = '$unique_image',
                    type = '$type',
                    tonkho = '$tonkho'
                    WHERE productId = '$id'";
        }else{
            // Nếu ng dùng k chọn ảnh
                    $query = "UPDATE tbl_product SET 
                    productName = '$productName',
                    cateId = '$category',
                    brandId = '$brand',
                    product_desc = '$product_desc',
                    price = '$price',
                    type = '$type',
                    tonkho = '$tonkho'
                    WHERE productId = '$id'";
        } 
            $result = $this->db->update($query);
            if ($result){
                $alert = "<span class='text-success'>Sửa Sản Phẩm thành công</span>";             
                return $alert;
            }else{
                $alert = "<span class='text-danger'>Sửa Sản Phẩm thất bại</span>";
                return $alert;            
    
            }
        }
    }

    public function del_product($id){
        $query = "DELETE FROM tbl_product WHERE productId = '$id'";
        $result = $this->db->delete($query);
        if ($result){
            $alert = "<span class='text-success'>Xóa Sản Phẩm thành công</span>";             
            return $alert;
        }else{
            $alert = "<span class='text-danger'>Xóa Sản Phẩm thất bại</span>";
            return $alert;            
     }
    }
    public function getproductbyId($id){
        $query = "SELECT * FROM tbl_product WHERE productId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }     
    //User
    
    public function getproduct_featured_first(){
        $query = "SELECT * FROM tbl_product WHERE type = '1' ORDER BY productId ASC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproduct_featured_last(){
        $query = "SELECT * FROM tbl_product WHERE type = '1' ORDER BY productId DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproduct_new(){
        $query = "SELECT * FROM tbl_product ORDER BY productId desc LIMIT 6";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_details($id){
        $query = "SELECT tbl_product.*, tbl_brand.brandName , tbl_category.cateName
        From tbl_product INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
        INNER JOIN tbl_category ON tbl_product.cateId = tbl_category.cateId
        Where tbl_product.productId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_add_products(){
        $query = "SELECT * FROM tbl_product LIMIT 6";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_product_relative($id,$id_cate){
        $query = "SELECT * FROM tbl_product Where cateId = '$id_cate' 
        EXCEPT
        SELECT *
        FROM tbl_product
        WHERE productId = '$id' LIMIT 6 ";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_product_rand(){
        $query = "SELECT DISTINCT * FROM tbl_product ORDER BY RAND() LIMIT 2";
        $result = $this->db->select($query);
        return $result;
    }
    public function insert_wishlist($productid, $customer_id){
        $connection = $this->db->conn;
        $productid =$connection -> real_escape_string($productid);
        $customer_id =$connection -> real_escape_string($customer_id);

        $check_wlist = "SELECT * FROM tbl_wishlist WHERE productId ='$productid' AND customer_id ='$customer_id'";
        $result_check_wlist = $this->db->select ($check_wlist);
        
        if($result_check_wlist){
            $msg = "<span class='text-success'>Sản phẩm đã đc thêm r</span>";
            return $msg;
        }
        else{
            $query = "SELECT * from tbl_product WHERE productId='$productid'";
            $result = $this->db->select($query)->fetch_assoc();

            $productName = $result['productName'];
            $price = $result['price'];
            $image = $result['image'];

            $query_insert = "INSERT INTO tbl_wishlist(productId,price,image,customer_id,productName) VALUE ('$productid','$price','$image','$customer_id','$productName')";
            $insert_wlist = $this->db->insert($query_insert);
            if($insert_wlist){
                $alert = "<span class='text-success'>Add thành công</span>";             
                return $alert;
            }else{
                $alert = "<span class='text-success'>Add thất bại</span>";             
                return $alert;
            }
        }
    }
    public function get_wlist($customer_id){
        $query = "SELECT tbl_wishlist.*, tbl_product.productId , tbl_category.cateId
        From tbl_product INNER JOIN tbl_category ON tbl_product.cateId = tbl_category.cateId
        INNER JOIN tbl_wishlist ON tbl_product.productId = tbl_wishlist.productId
        WHERE tbl_wishlist.customer_id ='$customer_id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function del_wlist($proid,$customer_id){
        $query = "DELETE FROM tbl_wishlist WHERE productId = '$proid' AND customer_id='$customer_id'";
        $result = $this->db->delete($query);
        return $result;
    }
}
?>
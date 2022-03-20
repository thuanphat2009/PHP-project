<?php
    require_once '../lib/database.php';
    require_once '../helper/format.php';
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
            $type =$connection -> real_escape_string($data['type']);
           
             
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];  
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;
            
                  

            if($productName=="" ||  $brand=="" || $category=="" || $product_desc=="" || $price=="" || $type=="" || $file_name==""){                                                                           
                $alert =  "<span class='text-danger'>Không được để trống</span>"; 
                 return $alert;
            }else{
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "INSERT INTO tbl_product(productName,cateId,brandId,product_desc,price,type,image) VALUES('$productName','$category','$brand','$product_desc','$price','$type','$unique_image')";
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
           
             
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];  
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;
   
            if($productName=="" ||  $brand=="" || $category=="" || $product_desc=="" || $price=="" || $type==""){                                                                           
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
                    type = '$type'
                    WHERE productId = '$id'";
        }else{
            // Nếu ng dùng k chọn ảnh
                    $query = "UPDATE tbl_product SET 
                    productName = '$productName',
                    cateId = '$category',
                    brandId = '$brand',
                    product_desc = '$product_desc',
                    price = '$price',
                    type = '$type'
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
}
?>
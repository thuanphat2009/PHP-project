<?php
require_once '../classes/brand.php';
require_once '../classes/category.php';
require_once '../classes/product.php';

?>
<?php
    $pd = new product();
    if (!isset($_GET['productid']) || $_GET['productid'] == NULL) {
		echo "<script>window.location ='productlist.php'</script>";
	} else {
		$id = $_GET['productid'];
	}
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $updateProduct = $pd->update_product($_POST,$_FILES,$id);
    }	
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title> Add product form bootstrap</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css'>

</head>
<body>
<div class="container">
  
<section class="panel panel-default">
<div class="panel-heading"> 
<h3 class="panel-title">Thêm Sản Phẩm</h3> 
</div> 
<div class="panel-body">
<?php 
     if(isset($updateProduct)){
        echo $updateProduct;
    }
 ?>
 <?php 
    $get_product_by_id = $pd->getproductbyId($id);
        if($get_product_by_id){
            while($result_product = $get_product_by_id->fetch_assoc()){

 ?>
<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
<div class="form-group">
    <label for="tech" class="col-sm-3 control-label">Danh mục</label>
    <div class="col-sm-3">
   <select class="form-control" name="category">
	<option value="">--Chọn danh mục--</option>
    <?php

      $cate = new category();
      $catelist = $cate->show_category();

        if($catelist){
            while ($result = $catelist->fetch_assoc()){
        ?>
	        <option
            <?php 
                if($result['cateId']==$result_product['cateId']){ echo 'selected'; }
            ?>
            
            value="<?php echo $result['cateId'] ?>"><?php echo $result['cateName'] ?></option>
    <?php
        }
    }
    ?>
   </select>
    </div>
  </div> <!-- form-group // -->
  <div class="form-group">
    <label for="tech" class="col-sm-3 control-label">Thương Hiệu</label>
    <div class="col-sm-3">
   <select class="form-control" name="brand">
	<option value="">--Chọn thương hiệu--</option>

    <?php
        $brand = new brand();
        $brandlist = $brand->show_brand();
  
          if($brandlist){
              while ($result = $brandlist->fetch_assoc()){
          ?>
	        <option 
            <?php 
                if($result['brandId']==$result_product['brandId']){ echo 'selected'; }
            ?>
            value="<?php echo $result['brandId'] ?>"><?php echo $result['brandName'] ?></option>
    <?php
        }
    }
?>

   </select>
    </div>
  </div> <!-- form-group // -->
  <div class="form-group">
    <label for="name" class="col-sm-3 control-label">Tên Sản Phẩm</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="productName" id="name" value="<?php echo $result_product['productName'] ?>">
    </div>
  </div> <!-- form-group // -->
  
  <div class="form-group">
    <label for="about" class="col-sm-3 control-label">Mô Tả</label>
    <div class="col-sm-9">
      <textarea class="form-control" name="product_desc"><?php echo $result_product['product_desc'] ?></textarea>
    </div>
  </div> <!-- form-group // -->
  <div class="form-group">
    <label for="qty" class="col-sm-3 control-label">Giá</label>
    <div class="col-sm-3">
   <input type="text" class="form-control" name="price" value="<?php echo $result_product['price'] ?>">
    </div>
  </div> <!-- form-group // -->
  <div class="form-group">
    <label for="tech" class="col-sm-3 control-label">Loại</label>
    <div class="col-sm-3">
   <select class="form-control" name="type">
       <?php 
            if($result_product['type']==0){   
       ?>
	<option value="1">Nổi Bật</option>
	<option selected value="0">Không Nổi Bật</option>
    <?php 
        }else{
    ?>
    <option selected value="1">Nổi Bật</option>
	<option  value="0">Không Nổi Bật</option>
    <?php 
        }
    ?>
   </select>
    </div>
  </div> <!-- form-group // -->
  <div class="form-group">
    <label for="name" class="col-sm-3 control-label">Hình</label>
    <div class="col-sm-3">
      <label class="control-label small" for="file_img">Hình 1 (jpg/png):</label> 
      <input type="file" name="image"> </br>
      <img style="height:120px;width:120px;object-fit:cover;" src="uploads/<?php echo $result_product['image'] ?>" alt="">
    </div>
  </div> <!-- form-group // -->
 
  <hr>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" name="submit" value="Update" class="btn btn-primary">Cập Nhật</button>
    </div>
  </div> <!-- form-group // -->
  <a href="./productlist.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Về Danh sách Sản Phẩm</a>

</form>
<?php 
    }
}
?>
</div><!-- panel-body // -->
</section><!-- panel// -->

  
</div> <!-- container// -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>

</body>
</html>
<?php
include '../classes/brand.php';
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Edit</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>
</head>
<body>
<?php
$brand = new brand();
if(!isset($_GET['brandid']) || $_GET['brandid']==NULL){
    echo "<script>window.location ='brandlist.php'</script>";
 }else{
      $id = $_GET['brandid'];
 }
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$brandName = $_POST['brandName'];
	$updateBrand = $brand->update_brand($brandName,$id);
}
?>
<div class="container">
		<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12 edit_information">
			<form action=""  method="POST">	
				<h3 class="text-center">Sửa Thương Hiệu</h3>
                <?php 
                    if(isset($updateBrand)){
                        echo $updateBrand;
                    }
                ?>
                <?php
                    $get_brand_name= $brand->getbrandbyId($id); 
                    if ($get_brand_name){
                        while ($result = $get_brand_name->fetch_assoc()){
                         ?>
                        
                
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<label class="profile_details_text">Tên Thương Hiệu:</label>
							<input name="brandName" class="form-control" value="<?php echo $result['brandName'] ?>">
							
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 submit">
						<div class="form-group">
							<input type="submit" name="submitBtn" class="btn btn-success" value="Sửa">
						</div>
					</div>
				</div>
				<a href="./brandlist.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Về Danh sách Thương Hiệu</a>
			</form>
            <?php
                }
            } 
            ?>
		</div>
	</div>
  
</body>
</html>

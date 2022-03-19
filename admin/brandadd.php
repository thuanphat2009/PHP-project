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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$brandName = $_POST['brandName'];
	$insertBrand = $brand->insert_brand($brandName);
}
?>
<div class="container">
		<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12 edit_information">
		
			<form action="brandadd.php"  method="POST">	
				<h3 class="text-center">Thêm Thương Hiệu</h3>
                <?php 
                    if(isset($insertBrand)){
                        echo $insertBrand;
                    }
                ?>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<label class="profile_details_text">Tên Thương Hiệu:</label>
							<input name="brandName" class="form-control" value="">
							
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 submit">
						<div class="form-group">
							<input type="submit" name="submitBtn" class="btn btn-success" value="Thêm">
						</div>
					</div>
				</div>
				<a href="./brandlist.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Về Danh sách Thương Hiệu</a>
			</form>
		</div>
	</div>
  
</body>
</html>

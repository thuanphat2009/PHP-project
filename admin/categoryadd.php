<?php
include '../classes/category.php';
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
$cate = new category();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$cateName = $_POST['cateName'];
	$insertCate = $cate->insert_category($cateName);
}
?>
<div class="container">
		<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12 edit_information">
		
			<form action="categoryadd.php"  method="POST">	
				<h3 class="text-center">Thêm Danh Mục</h3>
                <?php 
                    if(isset($insertCate)){
                        echo $insertCate;
                    }
                ?>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<label class="profile_details_text">Tên Danh Mục:</label>
							<input name="cateName" class="form-control" value="">
							
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
				<a href="./categorylist.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Về Danh sách Danh Mục</a>
			</form>
		</div>
	</div>
  
</body>
</html>

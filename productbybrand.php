<?php
include 'include/header.php';
?>
<?php 
        if (!isset($_GET['brandid']) || $_GET['brandid'] == NULL) {
            echo "<script>window.location ='index.php'</script>";
        } else {
            $id = $_GET['brandid'];
        }

        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //     $cateName = $_POST['cateName'];
        //     $updateCate = $cate->update_category($cateName, $id);
        // }
?>
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
		<div class="row">
			<!-- Sidebar ================================================== -->
			<?php
			include 'include/sidebar.php'
			?>
			<!-- Sidebar end=============================================== -->
			<div class="span9">
				<ul class="breadcrumb">
					<li><a href="index.php">Trang chủ</a> <span class="divider">/</span></li>
					<li >Sản phẩm</li> <span class="divider">/</span>
                    <li >Thương hiệu</li> <span class="divider">/</span>
                    <?php 
                            $name_brand = $br->get_name_by_brand($id);
                                if($name_brand){
                                    while($result_name =$name_brand->fetch_assoc()){
                            
                        ?>
                    <li class="active"><?php echo $result_name['brandName'] ?></li>
                    <?php  
                         }
                     }
                    ?>
				</ul>

				<hr class="soft" />
				<form class="form-horizontal span6">
					<div class="control-group">
						<label class="control-label alignL">Sắp xếp theo </label>
						<select>
							<option>Tên sản phẩm A - Z</option>
							<option>Tên sản phẩm Z - A</option>
							<option>Giá thấp - cao</option>
							<option>Giá cao - thấp</option>
						</select>
					</div>
				</form>

				<div id="myTab" class="pull-right">
					<a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
					<a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
				</div>
				<br class="clr" />
				<div class="tab-content">
					<div class="tab-pane" id="listView">
                        <?php 
                                $productbybrand = $br->get_name_by_brand($id);
                                    if($productbybrand){
                                        while($result =$productbybrand->fetch_assoc()){
                                
                        ?>
						<div class="row">
                           <a href="product_details.php?proid=<?php echo $result['productId'] ?>&&cateid=<?php echo $result['cateId'] ?>">
								<div class="span2">
									<img style="height:160px;width:160px;object-fit:cover;border-radius:15px;" src="admin/uploads/<?php echo $result['image'] ?>" alt="" />
								</div>			
						   </a>
						
							<div class="span4">

								
								<h5><?php echo $result['productName'] ?></h5>
								<p>
                                    <?php echo $result['product_desc'] ?>
								</p>

								<br class="clr" />
							</div>
							<div class="span3 alignR">
								<form class="form-horizontal qtyFrm">
									<h3><?php echo $fm->format_currency($result['price']) . " " . "VND" ?></h3>


									<a href="product_details.php" class="btn btn-large btn-primary"> Thêm vào <i class=" icon-shopping-cart"></i></a>
									<a href="product_details.php?proid=<?php echo $result['productId'] ?>&&cateid=<?php echo $result['cateId'] ?>" class="btn btn-large"><i class="icon-zoom-in"></i></a>

								</form>
							</div>
                         
						</div>
                      
						<hr class="soft" />
                        <?php  
                                    }
                                }else {
                                    echo  ' Không có danh mục này';
                                }
                            ?>
					</div>

					<div class="tab-pane  active" id="blockView">
						<ul class="thumbnails">
                        <?php 
                            $productbybrand = $br->get_name_by_brand($id);
                            if($productbybrand){
                                while($result =$productbybrand->fetch_assoc()){
                            
                        ?>
							<li class="span3">
								<div class="thumbnail">
									<a href="product_details.php?proid=<?php echo $result['productId'] ?>&&cateid=<?php echo $result['cateId'] ?>"><img style="height:240px;width:240px;object-fit:cover;border-radius:15px;" src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
									<div class="caption">
										<h5><?php echo $result['productName'] ?></h5>
										<p>
                                            <?php echo $result['product_desc'] ?>
										</p>
										<h4 style="text-align:center"><a class="btn" href="product_details.php?proid=<?php echo $result['productId'] ?>&&cateid=<?php echo $result['cateId'] ?>"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Thêm vào <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#"><?php echo $fm->format_currency($result['price']) . " " . "VND" ?></a></h4>
									</div>
								</div>
							</li>
                            <?php  
                                    }
                                }else {
                                    echo  ' Không có danh mục này';
                                }
                            ?>
						</ul>
						<hr class="soft" />
					</div>
				</div>

				<div class="pagination">
					<ul>
						<li><a href="#">&lsaquo;</a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">...</a></li>
						<li><a href="#">&rsaquo;</a></li>
					</ul>
				</div>
				<br class="clr" />
			</div>
		</div>
	</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php
include 'include/footer.php'
?>
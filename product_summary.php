<?php 
	include 'include/header.php';
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
						<li class="active"> Giỏ hàng</li>
					</ul>
					<h3> Giỏ hàng [ <small> 3 sản phẩm </small>]<a href="products.php"
							class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Trở lại trang sản phẩm </a></h3>
					<hr class="soft" />
					

					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Sản phẩm</th>
								<th>Mô tả</th>
								<th>Số lượng</th>
								<th>Giá</th>
								<th>Tổng tiền sản phẩm</th>
								<th>Giảm giá</th>
								<th>Tổng cộng</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td> <img width="60" src="themes/images/products/4.jpg" alt="" /></td>
								<td>MASSA AST<br />Color : black, Material : metal</td>
								<td>
									<div class="input-append"><input class="span1" style="max-width:34px"
											placeholder="1" id="appendedInputButtons" size="16" type="text"><button
											class="btn" type="button"><i class="icon-minus"></i></button><button
											class="btn" type="button"><i class="icon-plus"></i></button><button
											class="btn btn-danger" type="button"><i
												class="icon-remove icon-white"></i></button> </div>
								</td>
								<td>$120.00</td>
								<td>$25.00</td>
								<td>$15.00</td>
								<td>$110.00</td>
							</tr>
							<tr>
								<td> <img width="60" src="themes/images/products/8.jpg" alt="" /></td>
								<td>MASSA AST<br />Color : black, Material : metal</td>
								<td>
									<div class="input-append"><input class="span1" style="max-width:34px"
											placeholder="1" size="16" type="text"><button class="btn" type="button"><i
												class="icon-minus"></i></button><button class="btn" type="button"><i
												class="icon-plus"></i></button><button class="btn btn-danger"
											type="button"><i class="icon-remove icon-white"></i></button> </div>
								</td>
								<td>$7.00</td>
								<td>--</td>
								<td>$1.00</td>
								<td>$8.00</td>
							</tr>
							<tr>
								<td> <img width="60" src="themes/images/products/3.jpg" alt="" /></td>
								<td>MASSA AST<br />Color : black, Material : metal</td>
								<td>
									<div class="input-append"><input class="span1" style="max-width:34px"
											placeholder="1" size="16" type="text"><button class="btn" type="button"><i
												class="icon-minus"></i></button><button class="btn" type="button"><i
												class="icon-plus"></i></button><button class="btn btn-danger"
											type="button"><i class="icon-remove icon-white"></i></button> </div>
								</td>
								<td>$120.00</td>
								<td>$25.00</td>
								<td>$15.00</td>
								<td>$110.00</td>
							</tr>

							<tr>
								<td colspan="6" style="text-align:right">Tổng tiền: </td>
								<td> $228.00</td>
							</tr>
							<tr>
								<td colspan="6" style="text-align:right">Tổng giảm giá: </td>
								<td> $50.00</td>
							</tr>
							<tr>
								<td colspan="6" style="text-align:right">Tổng cộng: </td>
								<td> $31.00</td>
							</tr>
							<tr>
								<td colspan="6" style="text-align:right"><strong>Tổng cộng =</strong>
								</td>
								<td class="label label-important" style="display:block"> <strong> $155.00 </strong></td>
							</tr>
						</tbody>
					</table>


					<!-- <table class="table table-bordered">
						<tbody>
							<tr>
								<td>
									<form class="form-horizontal">
										<div class="control-group">
											<label class="control-label"><strong> VOUCHERS CODE: </strong> </label>
											<div class="controls">
												<input type="text" class="input-medium" placeholder="CODE">
												<button type="submit" class="btn"> ADD </button>
											</div>
										</div>
									</form>
								</td>
							</tr>

						</tbody>
					</table> -->

					
					<a href="login.php" class="btn btn-large pull-right">Thanh toán <i class="icon-arrow-right"></i></a>

				</div>
			</div>
		</div>
	</div>
	<!-- MainBody End ============================= -->
	<!-- Footer ================================================================== -->
	<?php
	include 'include/footer.php'
?>
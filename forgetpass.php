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
					<li class="active">Quên mật khẩu?</li>
				</ul>
				<h3> Bạn quên mật khẩu ?</h3>
				<hr class="soft" />

				<div class="row">
					<div class="span9" style="min-height:900px">
						<div class="well">
							<h5>Đặt lại mật khẩu</h5><br />
							Vui lòng nhập email để đặt lại mật khẩu. Mã xác nhận sẽ được gửi về email
							. Khi bạn đã nhận được mã xác nhận, bạn sẽ được đặt lại mật khẩu của mình.<br /><br /><br />
							<form>
								<div class="control-group">
									<label class="control-label" for="inputEmail1">Địa chỉ Email</label>
									<div class="controls">
										<input class="span3" type="text" id="inputEmail1" placeholder="Email">
									</div>
								</div>
								<div class="controls">
									<button type="submit" class="btn block">Gửi mã xác nhận</button>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php
	include 'include/footer.php'
?>
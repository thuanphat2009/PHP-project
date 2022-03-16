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
					<li class="active">Đăng ký</li>
				</ul>
				<h3> Đăng ký</h3>
				<div class="well">
					<!--
	<div class="alert alert-info fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div>
	<div class="alert fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div>
	 <div class="alert alert-block alert-error fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div> -->
					<form class="form-horizontal">
						<div class="control-group">
							<label class="control-label" for="inputFname1">Họ tên <sup>*</sup></label>
							<div class="controls">
								<input type="text" id="inputFname1" placeholder="Họ tên">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="input_email">Email <sup>*</sup></label>
							<div class="controls">
								<input type="text" id="input_email" placeholder="Email">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputPassword1">Mật khẩu <sup>*</sup></label>
							<div class="controls">
								<input type="password" id="inputPassword1" placeholder="Mật khẩu">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputPassword1">Nhập lại mật khẩu <sup>*</sup></label>
							<div class="controls">
								<input type="password" id="inputPassword1" placeholder="Nhập lại mật khẩu">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Ngày sinh <sup>*</sup></label>
							<div class="controls">
								<select class="span1" name="days">
									<option value="">-</option>
									<option value="1">1&nbsp;&nbsp;</option>
									<option value="2">2&nbsp;&nbsp;</option>
									<option value="3">3&nbsp;&nbsp;</option>
									<option value="4">4&nbsp;&nbsp;</option>
									<option value="5">5&nbsp;&nbsp;</option>
									<option value="6">6&nbsp;&nbsp;</option>
									<option value="7">7&nbsp;&nbsp;</option>
								</select>
								<select class="span1" name="days">
									<option value="">-</option>
									<option value="1">1&nbsp;&nbsp;</option>
									<option value="2">2&nbsp;&nbsp;</option>
									<option value="3">3&nbsp;&nbsp;</option>
									<option value="4">4&nbsp;&nbsp;</option>
									<option value="5">5&nbsp;&nbsp;</option>
									<option value="6">6&nbsp;&nbsp;</option>
									<option value="7">7&nbsp;&nbsp;</option>
								</select>
								<select class="span1" name="days">
									<option value="">-</option>
									<option value="1">1&nbsp;&nbsp;</option>
									<option value="2">2&nbsp;&nbsp;</option>
									<option value="3">3&nbsp;&nbsp;</option>
									<option value="4">4&nbsp;&nbsp;</option>
									<option value="5">5&nbsp;&nbsp;</option>
									<option value="6">6&nbsp;&nbsp;</option>
									<option value="7">7&nbsp;&nbsp;</option>
								</select>
							</div>
						</div>

						<div class="control-group">
							<div class="controls">
								<input type="hidden" name="email_create" value="1">
								<input type="hidden" name="is_new_customer" value="1">
								<input class="btn btn-large btn-success" type="submit" value="Đăng ký" />
							</div>
						</div>
					</form>
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
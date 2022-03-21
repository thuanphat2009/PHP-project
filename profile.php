<?php
include 'include/header.php';
?>
<?php 
		$login_check = Session::get('customer_login');
			if($login_check==false){
				echo "<script> window.location.href='login.php';</script>";
			}else{
					// echo '<li class=""><a href="profile.php">Thông tin người dùng</a></li>';
				}
?>
<?php 
    $id = Session::get('customer_id');
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save']))  {
		$UpdateCustomer = $cs->update_customer($_POST, $id);
	}
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
					<li class="active">Thông tin người dùng</li>
				</ul>
				<h3> Thông tin người dùng</h3>
				<?php
					if (isset($UpdateCustomer)) {
						echo $UpdateCustomer;
					}
				?>
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
					<form action="" method="post" class="form-horizontal">
                        <?php 
                            $id = Session::get('customer_id');
                            $get_customer = $cs->show_customer($id);
                            if($get_customer){
                                while($result = $get_customer->fetch_assoc()){

                            
                        ?>
						<div class="control-group">
							<label class="control-label" for="inputFname1">Họ tên <sup>*</sup></label>
							<div class="controls">
								<input type="text" id="inputFname1" name="name" value="<?php echo $result['name'] ?>"  placeholder="Họ tên">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="input_email">Email <sup>*</sup></label>
							<div class="controls">
								<input type="text" value="<?php echo $result['email'] ?>" id="input_email" name="email"  placeholder="Email">
							</div>
						</div>
                        <?php 
                            }
                        }
                        ?>
						<!-- <div class="control-group">
							<label class="control-label" for="inputPassword1">Nhập lại mật khẩu <sup>*</sup></label>
							<div class="controls">
								<input type="password" id="inputPassword1" placeholder="Nhập lại mật khẩu">
							</div>
						</div> -->
						<!-- <div class="control-group">
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
						</div> -->

						<div class="control-group">
							<div class="controls">
								<input type="hidden" name="email_create" value="1">
								<input type="hidden" name="is_new_customer" value="1">
								<input class="btn btn-large btn-success" type="submit" name="save" value="Cập Nhật" />
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
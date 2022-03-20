<?php
require_once '../classes/brand.php';
require_once '../classes/category.php';
require_once '../classes/product.php';
include '../lib/session.php';
Session::checkSession();
?>
<?php
$pd = new product();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

  $insertProduct = $pd->insert_product($_POST, $_FILES);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Now UI Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <?php
    include '../admin/include/sidebar.php'
    ?>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">

              <?php
              include '../admin/include/logout.php'

              ?>
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="container">
                <div class="col-lg-12 p-5 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12 edit_information">
                  <section class="panel panel-default">
                    <div class="panel-heading text-center">
                      <h3 class="panel-title">Thêm Sản Phẩm</h3>
                    </div>
                    <div class="panel-body">
                      <?php
                      if (isset($insertProduct)) {
                        echo $insertProduct;
                      }
                      ?>
                      <form action="productadd.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="form-group">
                          <label for="tech" class="col-sm-3 control-label">Danh mục</label>

                          <select class="form-control" name="category">
                            <option value="">--Chọn danh mục--</option>
                            <?php

                            $cate = new category();
                            $catelist = $cate->show_category();

                            if ($catelist) {
                              while ($result = $catelist->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $result['cateId'] ?>"><?php echo $result['cateName'] ?></option>
                            <?php
                              }
                            }
                            ?>
                          </select>

                        </div> <!-- form-group // -->
                        <div class="form-group">
                          <label for="tech" class="col-sm-3 control-label">Thương Hiệu</label>

                          <select class="form-control" name="brand">
                            <option value="">--Chọn thương hiệu--</option>

                            <?php
                            $brand = new brand();
                            $brandlist = $brand->show_brand();

                            if ($brandlist) {
                              while ($result = $brandlist->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $result['brandId'] ?>"><?php echo $result['brandName'] ?></option>
                            <?php
                              }
                            }
                            ?>

                          </select>

                        </div> <!-- form-group // -->
                        <div class="form-group">
                          <label for="name" class="col-sm-3 control-label">Tên Sản Phẩm</label>

                          <input type="text" class="form-control" name="productName" id="name" placeholder="">

                        </div> <!-- form-group // -->

                        <div class="form-group">
                          <label for="about" class="col-sm-3 control-label">Mô Tả</label>

                          <textarea class="form-control" style="background-color:rgb(236 217 217 / 50%); border-radius:12px;" name="product_desc"></textarea>

                        </div> <!-- form-group // -->
                        <div class="form-group">
                          <label for="qty" class="col-sm-3 control-label">Giá</label>

                          <input type="text" class="form-control" name="price" id="qty" placeholder="">

                        </div> <!-- form-group // -->
                        <div class="form-group">
                          <label for="tech" class="col-sm-3 control-label">Loại</label>

                          <select class="form-control" name="type">
                            <option value="1">Nổi Bật</option>
                            <option value="0">Không Nổi Bật</option>
                          </select>

                        </div> <!-- form-group // -->
                        <div class="form-group">
                          <label for="name" class="col-sm-3 control-label">Hình</label>


                          <!-- <label class="control-label small" for="file_img">Hình 1 (jpg/png):</label> -->
                          <input type="file" style="opacity:1; position:unset;" name="image">

                        </div> <!-- form-group // -->
                        <div class="form-group">
                          <label for="tonkho" class="col-sm-3 control-label">Số lượng tồn kho</label>

                          <input type="text" class="form-control" name="tonkho" id="tonkho" placeholder="">

                        </div> <!-- form-group // -->
                       
                        <hr>
                        <div class="form-group">

                          <button type="submit" name="submit" class="btn btn-success">Thêm</button>

                        </div> <!-- form-group // -->
                        <a href="./productlist.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Về Danh sách Sản Phẩm</a>

                      </form>

                    </div><!-- panel-body // -->
                  </section><!-- panel// -->
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
  <!--   Core JS Files   -->
  
  <script src="./assets/js/core/jsbybanhcuon.js"></script>
  <script src="./assets/js/core/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="./assets/demo/demo.js"></script>

</body>

</html>
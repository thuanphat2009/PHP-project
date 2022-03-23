<?php
require_once '../classes/brand.php';
require_once '../classes/category.php';
require_once '../classes/product.php';
include '../lib/session.php';
Session::checkSession();

?>
<?php
  $fm = new format();
  $product = new product();
  if(isset($_GET['delid'])){
    $id = $_GET['delid'];
    $delcate = $product->del_product($id); 


}

   
?>
<?php 
  $product = new product();
  //vị trí hiện tại của trang
  $page = isset($_GET['page']) ?  $_GET['page'] : 1;

  // số sản phẩm trên 1 trang 
  $pro =5;
  //công thức tính vị trí sản phẩm băt sđầu muốn lấy
  $startPro = $page * $pro - $pro;

  //show sp
  $result_page = $product->show_productadmin_pagein($startPro,$pro);
  //lấy tất cả sp từ db
  $rows = $product->show_productadmin_all();

  //đếm số lượng sp
  $rowCount = count($rows);
  //tổng só trang
  $total = ceil($rowCount / $pro);
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
    <?php 
      $pd = new product();
        if(isset($_GET['productid'])){
          $id = $_GET['productid'];
          $delpro = $pd->del_product($id);
        }
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
            <a class="navbar-brand" href="./productadd.php">Thêm Sản phẩm</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
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
              <div class="card-header">
                <h4 class="card-title"> Sản Phẩm</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <?php 
                    if(isset($delpro)){
                        echo $delpro;
                    }
                ?>
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        ID
                      </th>
                      <th>
                        Tên Sản Phẩm
                      </th>
                      <th>
                        Hình 
                      </th>
                      <th>
                        Thương Hiệu
                      </th>
                      <th>
                        Giá
                      </th>
                      <th>
                        Tồn kho
                      </th>
                      <th>
                        Giảm giá (%)
                      </th>
                      <th>
                        Đã bán
                      </th>
                      <th>
                        Action
                      </th>
                    </thead>
                    <tbody>
                    <?php 
                      if(!empty($result_page)): foreach($result_page as $val):
                    ?>
                      <tr>
                        <td>
                          <?php echo $val['productId'] ?>
                        </td>
                        <td>
                          <?php echo $val['productName'] ?>
                        </td>
                        <td>
                          <img style="height:120px;width:120px;object-fit:cover;" src="uploads/<?php echo $val['image'] ?>" alt="">
                        </td>
                        <td>
                          <?php echo $val['brandName'] ?>
                        </td>
                        <td>
                          <?php echo $fm->format_currency($val['price']) . " " . "VND" ?>
                        </td>
                        <td>
                          <?php echo $val['tonkho'] ?>
                        </td>
                        <td>
                          <?php echo $result['giamgia'] ?>
                        </td>
                        <td>
                          <?php echo $result['daban'] ?>
                          <?php echo $val['daban'] ?>
                        </td>
                        <td>
                          <a href="productedit.php?productid=<?php echo $val['productId'] ?>">Sửa</a> |
                          <a onclick= "return confirm ('Muốn xóa hông?')" href="?delid=<?php echo $val['productId'] ?>">Xóa</a>
                        </td>
                      </tr>
                    <?php
                      endforeach;
                      endif
                    
                    ?>
                    </tbody>
                  </table>
                </div>
                <nav aria-label="Page navigation example">
                  <ul class="pagination">
                  <?php if($page>1): ?>

                    <li class="page-item"><a class="page-link" href="productlist.php?page=<?= $page -1  ?>">Previous</a></li>
                  <?php endif; ?>
                    <?php for($i =1 ; $i<= $total;$i++): ?>
                        <?php if($page == $i){ ?>

                          <li class="page-item active"><a class="page-link" href="productlist.php?page=<? $i ?>"><?php $i ?> </a></li>

                        <?php }else{ ?>
                        
                          <li class="page-item"><a class="page-link" href="productlist.php?page=<?= $i  ?>"><?= $i ?> </a></li>

                    <?php } endfor; ?>
                    <?php if($page!= $total): ?>

                        <li class="page-item"><a class="page-link" href="productlist.php?page=<?= $page +1  ?>">Next</a></li>
                    <?php endif; ?>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        
        </div>
      </div>
      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="http://presentation.creative-tim.com">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div>
      </footer>
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
<?php
require_once '../classes/brand.php';
require_once '../classes/category.php';
require_once '../classes/product.php';
include '../lib/session.php';
Session::checkSession();

?>
<?php
  $product = new product();
  if(isset($_GET['delid'])){
    $id = $_GET['delid'];
    $delcate = $product->del_product($id); 
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
                    if(isset($delbrand)){
                        echo $delbrand;
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
                        Đã bán
                      </th>
                      <th>
                        Action
                      </th>
                    </thead>
                    <tbody>
                    <?php 
                      $pd = new product();
                      $pdlist = $pd->show_product();
                      if($pdlist){
                          $i =0;
                          while($result = $pdlist->fetch_assoc()){
                            $i++;
                    ?>
                      <tr>
                        <td>
                          <?php echo $i ?>
                        </td>
                        <td>
                          <?php echo $result['productName'] ?>
                        </td>
                        <td>
                          <img style="height:120px;width:120px;object-fit:cover;" src="uploads/<?php echo $result['image'] ?>" alt="">
                        </td>
                        <td>
                          <?php echo $result['brandName'] ?>
                        </td>
                        <td>
                          <?php echo $result['price'] ?>
                        </td>
                        <td>
                          <?php echo $result['tonkho'] ?>
                        </td>
                        <td>
                          <?php echo $result['daban'] ?>
                        </td>
                        <td>
                          <a href="productedit.php?productid=<?php echo $result['productId'] ?>">Sửa</a> |
                          <a onclick= "return confirm ('Muốn xóa hông?')" href="?delid=<?php echo $result['productId'] ?>">Xóa</a>
                        </td>
                      </tr>
                    <?php
                      }
                    }
                    ?>
                    </tbody>
                  </table>
                </div>
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
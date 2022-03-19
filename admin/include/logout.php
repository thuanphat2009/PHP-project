<?php
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
  Session::destroy();
}

?>

<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="now-ui-icons location_world"></i>
    <p>
      <span class="d-lg-none d-md-block">Some Actions</span>
    </p>
  </a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">

    <a class="dropdown-item" href="?action=logout">Đăng xuất</a>
  </div>
</li>
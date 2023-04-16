
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title> diplomado laravel</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="<?php echo asset('assets/admin/assets/css/bootstrap.min.css') ?>" rel="stylesheet" />
  <link href="<?php echo asset('assets/admin/assets/css/now-ui-dashboard.css') ?>" rel="stylesheet" />
  <link href="<?php echo asset('assets/admin/assets/demo/demo.css') ?>" rel="stylesheet" />

  <script src="<?php echo asset('assets/admin/assets/js/core/jquery.min.js') ?>"></script>
  <script type="text/javascript" src="<?php echo asset('assets/alert/lib/alertify.js') ?>"></script>
  <link rel="stylesheet" href="<?php echo asset('assets/alert/themes/alertify.core.css') ?>" />
  <link rel="stylesheet" href="<?php echo asset('assets/alert/themes/alertify.default.css') ?>" />

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
 
      <div class="logo">
        <a href="" class="simple-text logo-mini">
          CT
        </a>
        <a href="" class="simple-text logo-normal">
          Curso
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="./dashboard.html">
              <i class="now-ui-icons design_app"></i>
              <p>Inicio</p>
            </a>
          </li>
          <li>
            <a href="./icons.html">
              <i class="now-ui-icons education_atom"></i>
              <p>Icons</p>
            </a>
          </li>
          <li>
            <a href="./notifications.html">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Notifications</p>
            </a>
          </li>
          <li>
            <a href="./user.html">
              <i class="now-ui-icons users_single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="active ">
            <a href="/adminDocente"> <i class="now-ui-icons design_bullet-list-67"></i> <p>ADMINISTRACION DOCENTE</p> </a>
          </li>
          
          
        </ul>
      </div>
    </div>
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
            <a class="navbar-brand" href="#">SISTEMA DE CONTROL</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        @yield('contenido')
      </div>
      <footer class="footer">
        
      </footer>
    </div>
  </div>

  <script src="<?php echo asset('assets/admin/assets/js/core/popper.min.js') ?>"></script>
  <script src="<?php echo asset('assets/admin/assets/js/core/bootstrap.min.js') ?>"></script>
  <script src="<?php echo asset('assets/admin/assets/js/plugins/perfect-scrollbar.jquery.min.js') ?>"></script>
  <script src="<?php echo asset('assets/admin/assets/js/plugins/bootstrap-notify.js') ?>"></script>
  <script src="<?php echo asset('assets/admin/assets/demo/demo.js') ?>"></script>
</body>

</html>
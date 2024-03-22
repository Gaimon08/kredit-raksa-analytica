<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Raksa Analytica</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/weathericons/css/weather-icons.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/weathericons/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/summernote/dist/summernote-bs4.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="assets/modules/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/jquery-selectric/selectric.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/components.css">

  <!-- fav icon -->
  <link rel="shortcut icon" href="<?= base_url() ?>/img/logo.png" type="image/x-icon">
  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>

  <!-- datatable -->
  <link href="<?= base_url() ?>DataTables/datatables.min.css" rel="stylesheet">

  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <ul class="navbar-nav mr-3">
          <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
        <ul class="navbar-nav navbar-right  ml-auto">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="<?= base_url() ?>/template/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block"><?php echo $greeting; ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= site_url() ?>/admin/logout" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Raksa Analytica</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Ra</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="<?= site_url() ?>/admin/dashboard"><i class="fas fa-fire"></i>
                <span>Dashboard</span></a>
            <li class="menu-header">Analisa Kredit</li>
                      <li><a class="nav-link" href="<?= site_url() ?>/analisa/data"><i class="fas fa-fire"></i>
                <span>Data Kredit</span></a>
                      <li><a class="nav-link" href="<?= site_url() ?>/jaminanSHM/data"><i class="fas fa-fire"></i>
                <span>Data Jaminan SHM</span></a>
            <li><a class="nav-link"  href="<?= site_url() ?>/jaminanBPKB/data"><i class="fas fa-fire"></i>
                <span>Data Jaminan BPKB</span></a>
           

            <li class="menu-header">User</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>User</span></a>
              <ul class="dropdown-menu">
                <li class=active><a class="nav-link" href="<?= site_url() ?>/user">Data User</a></li>
                <li><a class="nav-link" href="<?= site_url() ?>/user/add">Tambah User</a></li>
              </ul>
            </li>
          </ul>
        </aside>
      </div>
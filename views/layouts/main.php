<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this); 
$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" data-bs-theme="dark" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon/favicon.ico">
    <link rel="stylesheet" href="/assets/css/theme.css">
    <!--plugins-->
<link rel="stylesheet" href="/assets/css/icons.css">
     
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"> 
    <link href="/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet">
    <link href="/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet">
    <script src="/assets/plugins/apex/apexcharts.min.js"></script>

    <!-- loader-->
    <link href="/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="/assets/css/pace.min.css" rel="stylesheet">
    <script src="/assets/js/pace.min.js"></script>
    <!--Styles-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/icons.css">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="/assets/css/main.css" rel="stylesheet">
    <link href="/assets/css/dark-theme.css" rel="stylesheet">
    <link href="/assets/css/semi-dark-theme.css" rel="stylesheet">
    <link href="/assets/css/minimal-theme.css" rel="stylesheet">
    <link href="/assets/css/shadow-theme.css" rel="stylesheet">
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
</head>

<body class=" ">

    <?php $this->beginBody() ?>
    <!--start header-->
    <header class="top-header">
        <nav class="navbar navbar-expand justify-content-between">
            <div class="btn-toggle-menu">
                <span class="material-symbols-outlined">menu</span>
            </div>
            <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                <input class="form-control form-control-sm rounded-5 px-5" disabled type="search" placeholder="Search">
                <span
                    class="material-symbols-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
            </div>
            <ul class="navbar-nav top-right-menu gap-2">
                <li class="nav-item d-lg-none d-block" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <a class="nav-link" href="javascript:;"><span class="material-symbols-outlined">
                            search
                        </span></a>
                </li>
                <li class="nav-item dark-mode">
                    <a class="nav-link dark-mode-icon" href="javascript:;"><span
                            class="material-symbols-outlined">dark_mode</span></a>
                </li>
                <li class="nav-item dropdown dropdown-app">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"
                        href="javascript:;"><span class="material-symbols-outlined">
                            apps
                        </span></a>
                    <div class="dropdown-menu dropdown-menu-end mt-lg-2 p-0">
                        <div class="app-container p-2 my-2">
                            <div class="row gx-0 gy-2 row-cols-3 justify-content-center p-2">
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/slack.png" width="30" alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Slack</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/behance.png" width="30" alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Behance</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/google-drive.png" width="30" alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Dribble</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/outlook.png" width="30" alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Outlook</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/github.png" width="30" alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">GitHub</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/stack-overflow.png" width="30" alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Stack</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/figma.png" width="30" alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Stack</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/twitter.png" width="30" alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Twitter</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/google-calendar.png" width="30" alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Calendar</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/spotify.png" width="30" alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Spotify</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/google-photos.png" width="30" alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Photos</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/pinterest.png" width="30" alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Photos</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/linkedin.png" width="30" alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">linkedin</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/dribble.png" width="30" alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Dribble</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/youtube.png" width="30" alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">YouTube</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/google.png" width="30" alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">News</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/envato.png" width="30" alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Envato</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/safari.png" width="30" alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Safari</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                            <!--end row-->

                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-large">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                        data-bs-toggle="dropdown">
                        <div class="position-relative">
                            <span class="notify-badge">8</span>
                            <span class="material-symbols-outlined">
                                notifications_none
                            </span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end mt-lg-2">
                        <a href="javascript:;">
                            <div class="msg-header">
                                <p class="msg-header-title">Notifications</p>
                                <p class="msg-header-clear ms-auto">Marks all as read</p>
                            </div>
                        </a>
                        <div class="header-notifications-list">
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify text-primary border">
                                        <span class="material-symbols-outlined">
                                            add_shopping_cart
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
                                                ago</span></h6>
                                        <p class="msg-info">You have recived new orders</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify text-danger border">
                                        <span class="material-symbols-outlined">
                                            account_circle
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
                                                ago</span></h6>
                                        <p class="msg-info">5 new user registered</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify text-success border">
                                        <span class="material-symbols-outlined">
                                            picture_as_pdf
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">24 PDF File<span class="msg-time float-end">19 min
                                                ago</span></h6>
                                        <p class="msg-info">The pdf files generated</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify text-info border">
                                        <span class="material-symbols-outlined">
                                            store
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">New Product Approved <span class="msg-time float-end">2 hrs
                                                ago</span></h6>
                                        <p class="msg-info">Your new product has approved</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify text-warning border">
                                        <span class="material-symbols-outlined">
                                            event_available
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">Time Response <span class="msg-time float-end">28 min
                                                ago</span></h6>
                                        <p class="msg-info">5.1 min avarage time response</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify text-danger border">
                                        <span class="material-symbols-outlined">
                                            forum
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">New Comments <span class="msg-time float-end">4 hrs
                                                ago</span></h6>
                                        <p class="msg-info">New customer comments recived</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify text-primary border">
                                        <span class="material-symbols-outlined">
                                            local_florist
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
                                                ago</span></h6>
                                        <p class="msg-info">24 new authors joined last week</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify text-success border">
                                        <span class="material-symbols-outlined">
                                            park
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5 hrs
                                                ago</span></h6>
                                        <p class="msg-info">Successfully shipped your item</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify text-warning border">
                                        <span class="material-symbols-outlined">
                                            elevation
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2 weeks
                                                ago</span></h6>
                                        <p class="msg-info">45% less alerts last 4 weeks</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <a href="javascript:;">
                            <div class="text-center msg-footer">View All</div>
                        </a>
                    </div>
                </li> 
            </ul>
        </nav>
    </header>

    <!--start sidebar-->
    <aside class="sidebar-wrapper">
        <div class="sidebar-header">
            <div class="logo-icon">
                <img src="assets/images/logo-icon.png" class="logo-img" alt="">
            </div>
            <div class="logo-name flex-grow-1">
                <h5 class="mb-0">Lab Center</h5>
            </div>
            <div class="sidebar-close ">
                <span class="material-symbols-outlined">close</span>
            </div>
        </div>
        <div class="sidebar-nav" data-simplebar="true">

            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="/">
                        <div class="parent-icon"><span class="material-symbols-outlined">home</span>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li class="menu-label">Layanan</li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><span class="material-symbols-outlined">apps</span>
                        </div>
                        <div class="menu-title">Alat</div>
                    </a>
                    <ul>
                        <li> <a href="/alat"><span class="material-symbols-outlined">arrow_right</span>Alat</a>
                        </li>
                        <li> <a href="/kalibrasi"><span class="material-symbols-outlined">arrow_right</span>Kalibrasi</a>
                        </li>
                        <li> <a href="/maintenance"><span class="material-symbols-outlined">arrow_right</span>Maintenance</a>
                        </li>
                        <li> <a href="/vendor"><span class="material-symbols-outlined">arrow_right</span>Vendor</a>
                        </li>



                    </ul>
                </li>
               
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><span class="material-symbols-outlined">widgets</span>
                        </div>
                        <div class="menu-title">Peminjaman</div>
                    </a>
                    <ul>
                    <li> <a href="/peminjaman"><span class="material-symbols-outlined">arrow_right</span>Riwayat Peminjaman
                                </a>
                        <li> <a href="/pjminternal"><span class="material-symbols-outlined">arrow_right</span>Peminjaman Internal
                                </a>
                        </li>
                        <li> <a href="/pjmeksternal"><span
                                    class="material-symbols-outlined">arrow_right</span>Peminjaman Eksternal</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><span class="material-symbols-outlined">shopping_cart</span>
                        </div>
                        <div class="menu-title">Data Divisi</div>
                    </a>
                    <ul>
                        <li> <a href="/bagian"><span
                                    class="material-symbols-outlined">arrow_right</span>Bagian</a>
                        </li>
                        <li> <a href="/sub_bag"><span
                                    class="material-symbols-outlined">arrow_right</span>Sub Bagian</a>
                        </li>
                        <li> <a href="/lab"><span
                                    class="material-symbols-outlined">arrow_right</span>Laboratorium</a>
                        </li>
                    </ul>
                </li>
                
                <li class="menu-label">Option</li>
                
                <li>
                    <a href="user-profile.html">
                        <div class="parent-icon"><span class="material-symbols-outlined">account_circle</span>
                        </div>
                        <div class="menu-title">Users</div>
                    </a>
                </li>
                <li>
                    <a href="timeline.html">
                        <div class="parent-icon"><span class="material-symbols-outlined">hotel_class</span>
                        </div>
                        <div class="menu-title">Activity Logs</div>
                    </a>
                </li>
                <li>
                    <a href="faq.html">
                        <div class="parent-icon"><span class="material-symbols-outlined">call</span>
                        </div>
                        <div class="menu-title">Manage Role</div>
                    </a>
                </li>
                <li>
                    <a href="pricing-table.html">
                        <div class="parent-icon"><span class="material-symbols-outlined">currency_bitcoin</span>
                        </div>
                        <div class="menu-title">Manage Permissions</div>
                    </a>
                </li>
                <li>
                    <a href="pricing-table.html">
                        <div class="parent-icon"><span class="material-symbols-outlined">currency_bitcoin</span>
                        </div>
                        <div class="menu-title">Backup</div>
                    </a>
                </li>
                
                <li class="menu-label">Others</li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><span class="material-symbols-outlined">toc</span>
                        </div>
                        <div class="menu-title">Setting</div>
                    </a>
                    <ul>
                        <li> <a href="/alat"><span class="material-symbols-outlined">arrow_right</span>General Settings</a>
                        </li>
                        <li> <a href="/kalibrasi"><span class="material-symbols-outlined">arrow_right</span>Company Settings</a>
                        </li>
                        <li> <a href="/maintenance"><span class="material-symbols-outlined">arrow_right</span>Manage Email Tempalte</a>
                        </li>
                    </ul>
                </li>
                
            <!--end navigation-->


        </div>
        <div class="sidebar-bottom dropdown dropup-center dropup">
            <div class="dropdown-toggle d-flex align-items-center px-3 gap-3 w-100 h-100" data-bs-toggle="dropdown">
                <div class="user-img">
                    <img src="assets/images/avatars/01.png" alt="">
                </div>
                <div class="user-info">
                    <h5 class="mb-0 user-name">Jhon Maxwell</h5>
                    <p class="mb-0 user-designation">UI Engineer</p>
                </div>
            </div>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="javascript:;"><span class="material-symbols-outlined me-2">
                            account_circle
                        </span><span>Profile</span></a>
                </li>
                <li><a class="dropdown-item" href="javascript:;"><span class="material-symbols-outlined me-2">
                            tune
                        </span><span>Settings</span></a>
                </li>
                <li><a class="dropdown-item" href="javascript:;"><span class="material-symbols-outlined me-2">
                            dashboard
                        </span><span>Dashboard</span></a>
                </li>
                <li><a class="dropdown-item" href="javascript:;"><span class="material-symbols-outlined me-2">
                            account_balance
                        </span><span>Earnings</span></a>
                </li>
                <li><a class="dropdown-item" href="javascript:;"><span class="material-symbols-outlined me-2">
                            cloud_download
                        </span><span>Downloads</span></a>
                </li>
                <li>
                    <div class="dropdown-divider mb-0"></div>
                </li>
                <li><a class="dropdown-item" href="javascript:;"><span class="material-symbols-outlined me-2">
                            logout
                        </span><span>Logout</span></a>
                </li>
            </ul>
        </div>
    </aside>
    <main class="page-content">
        <?= $content ?>
    </main>
    <!--end sidebar-->


    <?php $this->endBody() ?>

    <!--plugins-->
    <!-- <script src="/assets/js/jquery.min.js"></script> -->
    <script src="/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="/assets/plugins/simplebar/js/simplebar.min.js"></script> 
    <script src="/assets/js/index.js"></script>
    <!-- BS Scripts -->
    <!-- <script src="/assets/js/bootstrap.bundle.min.js"></script> -->
    <script src="/assets/js/main.js"></script>

    <script src="/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>
    <script>
    $(document).ready(function() {
        var table = $('#example2').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print']
        });

        table.buttons().container()
            .appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
    </script>

    <style>
    .dataTables_filter {
        display: flex !important;
        justify-content: end !important;
        margin-bottom: 8px !important;
    }

    .row {
        align-items: center !important;
    }
    </style>
</body>

</html>
<?php $this->endPage() ?>
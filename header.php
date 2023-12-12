<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-RWV0R60XK1"></script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'G-RWV0R60XK1');
</script>

<meta charset="utf-8">
<meta name="author" content="Ankit Saikia">
<meta http-equiv="content-language" content="en">
<meta name="description"
  content="Comprehensive College Management Site developed by Ankit Saikia for the BCA major project at C.T. College.">
<meta name="keywords" content="college management, BCA project, C.T. College, Ankit Saikia">
<meta name="generator" content="Bootstrap, jQuery, JavaScript, PHP, HTML5, CSS, XML, MySQL">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="theme-color" content="#000000">

<!-- Open Graph Meta Tags for Social Media -->
<meta property="og:title" content="College Management Site - Ankit Saikia">
<meta property="og:description"
  content="A comprehensive college management site created by Ankit Saikia for the BCA major project at C.T. College.">
<meta property="og:image" content="./admin/assets/img/logo/android-chrome-512x512.png">
<meta property="og:url" content="https://ctctsk.in/">
<meta property="og:site_name" content="C.T. College">

<!-- Twitter Meta Tags for Social Media -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@YourTwitterHandle">
<meta name="twitter:title" content="College Management Site - Ankit Saikia">
<meta name="twitter:description"
  content="A comprehensive college management site created by Ankit Saikia for the BCA major project at C.T. College.">
<meta name="twitter:image" content="./admin/assets/img/logo/android-chrome-512x512.png">

<!-- Additional Meta Tags for SEO -->
<meta name="robots" content="index, follow">
<meta name="googlebot" content="index, follow">
<meta name="google" content="notranslate">
<meta name="format-detection" content="telephone=no">
<meta name="mobile-web-app-capable" content="yes">

<!-- Canonical URL -->
<link rel="canonical" href="https://ctctsk.in/">

<!-- Favicon -->
<link rel="icon" type="image/png" sizes="32x32" href="./favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="./favicon-16x16.png">

<?php
$currentpage = isset($_GET['page']) ? $_GET['page'] : "home";
$thispage = strtoupper($currentpage);
$thispage = str_replace('_', ' ', $thispage);
?>
<title><?php echo $thispage . ' - ' . $_SESSION['system']['site_title'] ?></title>

<link rel="icon" href="admin/assets/img/logo/favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="admin/assets/vendor/bstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="lib/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="lib/ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="lib/css/animate.compat.css">
<link rel="stylesheet" href="lib/css/color-pallete.css">
<link rel="stylesheet" href="lib/css/altered.css">
<link rel="stylesheet" href="lib/css/nav.css">
<link rel="stylesheet" href="admin/assets/vendor/boxicons/css/boxicons.min.css">

<style>
  @font-face {
    font-family: 'Avalon';
    src: url('lib/FontsFree-Net-Avalon.ttf');
  }

  * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    user-select: none;
    -ms-user-select: none;
    -webkit-user-select: none;
    /* font-family: 'Avalon'; */
  }

  ::-webkit-scrollbar {
    display: none !important;
  }

  .bsn {
    box-shadow: none !important;
  }

  #preloader {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 9999;
    overflow: hidden;
    background: #000;
    filter: brightness(2);
    transition: all .2s ease-out;
  }

  #preloader:before {
    content: "";
    position: fixed;
    top: calc(50% - 30px);
    left: calc(50% - 30px);
    border: 8px solid transparent;
    border-top: 8px solid #cfc421;
    border-radius: 50%;
    width: 100px;
    height: 100px;
    -webkit-animation: animate-preloader 1s linear infinite;
    animation: animate-preloader 1s linear infinite;
  }

  @-webkit-keyframes animate-preloader {
    0% {
      -webkit-transform: rotate(0deg);
      transform: rotate(0deg);
    }

    100% {
      -webkit-transform: rotate(360deg);
      transform: rotate(360deg);
    }
  }

  @keyframes animate-preloader {
    0% {
      -webkit-transform: rotate(0deg);
      transform: rotate(0deg);
    }

    100% {
      -webkit-transform: rotate(360deg);
      transform: rotate(360deg);
    }
  }

  .ls-2 {
    letter-spacing: 2px;
  }
</style>

<script src="admin/assets/vendor/jquery/jquery.min.js" type="text/javascript"></script>
<script src="admin/assets/vendor/bstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="lib/sweetalert2/dist/sweetalert2.all.min.js" type="text/javascript"></script>
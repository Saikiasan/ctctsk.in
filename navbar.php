<?php
// Read JSON configuration file
$navbarConfig = json_decode(file_get_contents('navbar_config.json'), true);

// Active page (you can set this dynamically based on the current page)
$currentPage = isset($_GET['page']) ? './?page=' . $_GET['page'] : './?page=home';

?>

<div class="topbanner pb-3 bg-black">
  <div class="position-relative" style="width: 100%; height: 30px;z-index: 100;">
      <a class="navbar-brand p-0 m-0 ms-4 position-absolute" href="<?php echo $navbarConfig['logo']['url']; ?>" id="logo_top">
          <img src="<?php echo $navbarConfig['logo']['imageSrc']; ?>" alt="logo" class="img-fluid p-0 m-0 nav-logo">
      </a>
      <div class="position-relative">
          <div class="position-absolute d-flex flex-column brand-sus">
              <span class="animated fadeIn faster delay-1s logo-brand text-warning"><?php echo $navbarConfig['brand']['title']; ?></span>
              <span class="text-light animated fadeIn faster delay-2s text-uppercase logo-sub"><?php echo $navbarConfig['brand']['subtitle']; ?></span>
          </div>
      </div>
  </div>
  <nav class="navbar navbar-expand-lg pt-lg-5 animated bg-black">
      <div class="container-fluid">
          <button class="btn btn-primary navbar-toggler ms-auto collapsed" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarcol" aria-controls="navbarcol">
              <span></span>
              <span></span>
              <span></span>
          </button>
          <div class="navbar-collapse offcanvas offcanvas-bottom bg-dark vh-100" id="navbarcol">
              <ul class="navbar-nav me-md-auto ms-lg-auto text-capitalize offcanvas-body align-items-center">
                  <?php
                  foreach ($navbarConfig['menu'] as $menuItem) {
                      echo '<li class="nav-item';
                      if (isset($menuItem['submenu'])) {
                          echo ' dropdown">
                                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                      ' . $menuItem['label'] . '
                                  </a>
                                  <div class="dropdown-menu shadow" role="menu">';
                          foreach ($menuItem['submenu'] as $subItem) {
                              $activeClass = ($currentPage == basename($subItem['url'])) ? 'active' : '';
                              echo '<a class="dropdown-item ' . $activeClass . '" href="' . $subItem['url'] . '">' . $subItem['label'] . '</a>';
                          }
                          echo '</div>';
                      } else {
                          $activeClass = ($currentPage == $menuItem['url']) ? 'text-warning' : '';
                          echo '">
                                  <a class="nav-link ' . $activeClass . '" href="' . $menuItem['url'] . '">
                                      ' . $menuItem['label'] . '
                                  </a>';
                      }
                      echo '</li>';
                  }
                  ?>
                  <button type="button" class="offcanvas-close btn m-2" data-bs-dismiss="offcanvas" id="offcoco">
                      <span class="fa fa-close text-danger fa-2x"></span>
                  </button>
              </ul>
          </div>
      </div>
  </nav>
</div>

<script>
  var navbar = $(".navbar");
  var navbarCollapse = $(".navbar-collapse");
  var topbanner = $(".topbanner");
  if ($(window).width() >= 992) {
    $(window).scroll(function () {
      topbanner.css('z-index', '100')
      if ($(this).scrollTop() > topbanner.height() + 100) {
        navbar.addClass("fixed-top fadeInDown ").removeClass("pt-lg-5")
        navbarCollapse.removeClass('pt-4').addClass('p-0')
      } else {
        navbar.addClass("pt-lg-5").removeClass("fixed-top fadeInDown")
        navbarCollapse.addClass('pt-4').removeClass('p-0')
      }
    });
  } else {
    $(window).scroll(function () {
      if ($(this).scrollTop() > topbanner.height() + 100) {
        topbanner.addClass("fixed-top")
      } else {
        topbanner.removeClass("fixed-top")
      }
    });
  }
</script>
<style>
  @font-face {
    font-family: 'boxIcon';
    src: url(admin/assets/vendor/boxicons/fonts/boxicons.ttf);
    font-weight: normal;
    font-style: normal;
  }

  #footerx .link-item {
    color: #ffffff84;
    text-decoration: none;
    position: relative;
  }

  #footerx .link-item::before {
    content: '\eb09';
    font-family: 'boxIcon';
    font-size: 20px;
    margin-left: -30px;
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    color: #154892;
  }
</style>
<footer id="footerx" class="text-center text-lg-start text-white pb-2 mt-5 bg-dark">
  <div class="container p-4">
    <div class="row my-4">
      <div class="col-lg-3 col-md-6">
        <h2 class="text-center text-light hover-grow"
          style="font-family: 'Archivo Black', sans-serif; text-shadow: 2px 5px 6px #000;">
          <?php echo $_SESSION['system']['site_title'] ?></h2>
        <div class="rounded-circle d-flex align-items-center justify-content-center mb-0 mx-auto"
          style="width: 150px; height: 150px;">
          <img src="admin/assets/img/logo/CT-logo.webp" height="90" alt="logo" loading="lazy" />
        </div>
        <!-- <p class="text-center"></p> -->
        <ul class="list-unstyled d-flex flex-row justify-content-center gap-2">
          <li class="hover-grow-ico">
            <a class="text-white px-2" href="https://www.facebook.com/ctcollegetinsukia/">
              <i class="fa fa-facebook fa-2x"></i>
            </a>
          </li>
          <li class="hover-grow-ico">
            <a class="text-white px-2" href="https://www.instagram.com/ctcollegetsk/?hl=en">
              <i class="fa fa-instagram fa-2x"></i>
            </a>
          </li>
          <li class="hover-grow-ico">
            <a class="text-white px-2" href="https://wa.me/919435036478">
              <i class="fa fa-whatsapp fa-2x"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-4">Quick links</h5>
        <ul class="list-unstyled">
          <li class="mb-2">
            <a href="https://astu.ac.in/" class="link-item">ASTU</a>
          </li>
          <li class="mb-2">
            <a href="https://dibru.ac.in/" class="link-item">Dibrugarh University</a>
          </li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="mb-4">FAQs</h5>
        <ul class="list-unstyled">
          <li class="mb-2">
            <a href="./?page=apply_addmision" class="link-item">Apply for addmission</a>
          </li>
          <li class="mb-2">
            <a href="./?page=rules-regulations" class="link-item">Rules and regulations</a>
          </li>
          <li class="mb-2">
            <a href="./?page=student_curriculum" class="link-item">Student curriculum</a>
          </li>
          <li class="mb-2">
            <a href="./?page=jobs" class="link-item">Job</a>
          </li>
          <li class="mb-2">
            <a href="./?page=available_courses" class="link-item">Courses available</a>
          </li>
          <li class="mb-2">
            <a href="./?page=contact" class="link-item">Contact</a>
          </li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-4">Contact</h5>
        <ul class="list-unstyled">
          <li>
            <p><i class="fa fa-map-marker pe-2 text-danger"></i><span
                style="font-size: 14px; font-weight: 100;"><?php echo $_SESSION['system']['contact_address'] ?></span></p>
          </li>
          <li>
            <p><i class="fa fa-phone pe-2" style="color: green"></i><?php echo $_SESSION['system']['contact_phone'] ?></p>
          </li>
          <li>
            <p><i class="fa fa-envelope pe-2 mb-0 text-warning"></i><?php echo $_SESSION['system']['contact_mail'] ?></p>
          </li>
        </ul>
      </div>
    </div>
    <hr class="text-light">
    <div class="row text-center">
      <span class="fs-5">&copy; 2023 <?php echo $_SESSION['system']['site_title'] ?></span>
    </div>
    <p class="lead justify-content-center d-flex align-items-center" style="color:#989898">Made by - Ankit Saikia&nbsp;<i class="bx bxl-github"></i></p>
  </div>
</footer>
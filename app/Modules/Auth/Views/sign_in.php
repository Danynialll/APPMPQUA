<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url(); ?>/assets/img/favicon.png">
  <title>
    UPSI Quality Verification Center
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?= base_url(); ?>/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?= base_url(); ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?= base_url(); ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url(); ?>/assets/css/soft-ui-dashboard.css?v=1.1.1" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <!-- SweetAlert2 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Include Font Awesome CDN -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <!-- Include Bootstrap Icons CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

  <style>
    .nav-item:hover .nav-link {
      background-color: #007bff;
      border-radius: 5px;
      /* Light background on hover */
      color: #fff;
      font-weight: bold;
      /* Change text color */
      transition: background-color 0.3s ease;
    }

    html {
      scroll-behavior: smooth;
    }

    #scrollToTopBtn {
      position: fixed;
      bottom: 30px;
      /* Distance from bottom */
      right: 30px;
      /* Distance from right */
      display: none;
      /* Hidden by default */
      z-index: 9999;
      /* Ensure it's above the footer */
      transition: opacity 0.3s ease, visibility 0.3s ease;
      border-radius: 5px;
    }

    #scrollToTopBtn.visible {
      display: block;
      /* Show the button when visible class is added */
    }

    body {
      overflow-x: hidden;
    }
  </style>

  <style>
    .news_card {
      width: 300px;
      min-width: 300px;
      height: auto;
      background: #fff;
      border-radius: 30px;
      position: relative;
      z-index: 10;
      margin: 25px;
      min-height: 356px;
      cursor: pointer;
      transition: all .25s ease;
      box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, .08);
    }

    .news_card:hover {
      transform: translate(0, -10px);
      box-shadow: 0px 17px 35px 0px rgba(0, 0, 0, .07);
    }

    .news_card h6 {
      position: absolute;
      left: 0;
      top: 0;
      padding: 15px;
    }

    .news_card i {
      position: absolute;
      right: 0;
      top: 0;
      padding: 15px;
      font-size: 1.4rem;
      line-height: 3.2rem;
    }

    .news_card .news_card-text {
      padding: 20px;
    }

    p {
      font-size: .8rem;
      opacity: .6;
      margin-top: 10px;
    }

    .news_card .news_card-img {
      transform: translate(90px, -10px);
      margin: 0 30px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all .35s ease-out;
    }

    .news_card img {
      height: 180px;
      border-radius: 15px;
    }

    .news_card img.blur {
      position: absulute;
      filter: blur(15px);
      z-index: -1;
      opacity: .40;
      transform: translate(-160px, 30px);
      transition: all .35s ease-out;
    }

    .news_card:hover .news_card-img {
      transform: translate(70px, -15px);
    }

    .news_card:hover .news_card-img img.blur {
      transform: translate(-100px, 35px) scale(.85);
      opacity: .25;
      filter: blur(20px);
    }

    .news_card-content {
      display: flex;
      align-items: center;
      justify-content: flex-start;
      width: 100%;
      overflow: auto;
      padding-top: 100px;
      padding-bottom: 100px;
      padding-left: 60px;
      padding-right: 50px;
      scroll-behavior: smooth;
    }

    .news_card-content::-webkit-scrollbar {
      height: 0px;
    }

    .news_card-content:after {
      content: '';
      display: block;
      min-width: 20px;
      height: 100px;
      position: relative;
    }

    .btn-card-slider {
      min-width: 60px;
      margin: auto 30px;
      height: 60px;
      border-radius: 20px;
      background: #fff;
      border: 0px;
      outline: none;
      cursor: pointer;
      z-index: 9999;
      box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, .08);
      transition: all .25s ease;
    }

    .btn-card-slider :hover {
      box-shadow: 0px 17px 35px 0px rgba(0, 0, 0, .07);
    }

    .btn-card-slider i {
      font-size: 1.2rem;
    }

    .slider {
      display: flex;
      align-items: center;
      justify-content: center;
      /* Adjust based on how you want the image to scale */
      width: 100%;
      overflow: hidden;
      position: relative;
      /* Needed for positioning child elements */
    }

    .slider:after {
      content: '';
      left: 98px;
      /* height: 90vh; */
      position: absolute;
      width: 150px;
      z-index: 100;
      background: linear-gradient(90deg, rgb(242, 243, 248) 0%, rgba(242, 243, 248, 0) 100%);
      pointer-event: none;
    }

    .slider:before {
      content: '';
      right: 98px;
      /* height: 90vh; */
      position: absolute;
      width: 150px;
      z-index: 100;
      background: linear-gradient(90deg, rgba(242, 243, 248, 0) 0%, rgba(242, 243, 248, 1) 100%);
      pointer-event: none;
    }

    /* Embedded Map */
    #map-container {
      width: 100%;
      height: 100vh;
      /* Full height of the viewport */
      position: relative;
    }

    #map-container iframe {
      width: 100%;
      height: 100%;
      border: 0;
      position: absolute;
      top: 0;
      left: 0;
    }

    /* Icon */

    /* Social Media */
    /* Social Media */
    *:focus,
    *:active {
      outline: none !important;
      -webkit-tap-highlight-color: transparent;
    }

    .wrapper {
      display: inline-flex;
      list-style: none;
    }

    .wrapper .icon {
      position: relative;
      background: #ffffff;
      border-radius: 50%;
      padding: 15px;
      margin: 10px;
      width: 50px;
      /* Adjusted to ensure the icon has enough space */
      height: 50px;
      /* Adjusted to ensure the icon has enough space */
      font-size: 24px;
      /* Adjusted for better icon visibility */
      display: flex;
      justify-content: center;
      align-items: center;
      box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
      cursor: pointer;
      transition: all 0.2s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .wrapper .tooltip {
      position: absolute;
      top: 0;
      font-size: 14px;
      background: #ffffff;
      color: #ffffff;
      padding: 5px 8px;
      border-radius: 5px;
      box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
      opacity: 0;
      pointer-events: none;
      transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .wrapper .tooltip::before {
      position: absolute;
      content: "";
      height: 8px;
      width: 8px;
      background: #ffffff;
      bottom: -3px;
      left: 50%;
      transform: translate(-50%) rotate(45deg);
      transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .wrapper .icon:hover .tooltip {
      top: -45px;
      opacity: 1;
      visibility: visible;
      pointer-events: auto;
    }

    .wrapper .icon:hover span,
    .wrapper .icon:hover .tooltip {
      text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.1);
    }

    .wrapper .facebook:hover,
    .wrapper .facebook:hover .tooltip,
    .wrapper .facebook:hover .tooltip::before {
      background: #1877F2;
      color: #ffffff;
    }

    .wrapper .twitter:hover,
    .wrapper .twitter:hover .tooltip,
    .wrapper .twitter:hover .tooltip::before {
      background: #1DA1F2;
      color: #ffffff;
    }

    .wrapper .tiktok:hover,
    .wrapper .tiktok:hover .tooltip,
    .wrapper .tiktok:hover .tooltip::before {
      background: #000000;
      color: #ffffff;
    }

    .wrapper .instagram:hover,
    .wrapper .instagram:hover .tooltip,
    .wrapper .instagram:hover .tooltip::before {
      /* background: hsl(323.6842105263158,100%,45%); */
      background: #1877F2;
      color: #ffffff;
    }

    .wrapper .github:hover,
    .wrapper .github:hover .tooltip,
    .wrapper .github:hover .tooltip::before {
      background: #333333;
      color: #ffffff;
    }

    .wrapper .youtube:hover,
    .wrapper .youtube:hover .tooltip,
    .wrapper .youtube:hover .tooltip::before {
      background: #CD201F;
      color: #ffffff;
    }

    .fa-youtube:before {
      color: red;
    }

    .fa-tiktok:hover:before,
    .fa-facebook-f:hover:before,
    .fa-youtube:hover:before {
      color: white;
      /* Color on hover */
    }

    .fa-facebook-f:before {
      color: #1877F2;
    }

    .fa-tiktok:before {
      color: black;
    }
  </style>

</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="<?= base_url(); ?>pages/dashboards/default.html">
              UPSI QUALITY VERIFICATION CENTER
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">
              <ul class="navbar-nav navbar-nav-hover mx-auto">
                <li class="nav-item dropdown mx-2">
                  <a role="button" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuPages" href="#homeSection" aria-expanded="false">
                    Homes
                  </a>
                </li>
                <li class="nav-item dropdown mx-2">
                  <a role="button" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuAccount" href="#aboutUsSection" aria-expanded="false">
                    About Us
                  </a>
                </li>
                <li class="nav-item dropdown mx-2">
                  <a role="button" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuBlocks" href="#ourServiceSection" aria-expanded="false">
                    Our Services
                  </a>
                </li>
                <li class="nav-item dropdown mx-2">
                  <a role="button" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuBlocks" href="#fieldSection" aria-expanded="false">
                    Fields
                  </a>
                </li>
                <li class="nav-item dropdown mx-2">
                  <a role="button" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuDocs" href="#pricing" aria-expanded="false">
                    Pricing
                  </a>
                </li>
                <li class="nav-item dropdown mx-2">
                  <a role="button" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuDocs" href="#faqSection" aria-expanded="false">
                    Faq
                  </a>
                </li>
                <li class="nav-item dropdown mx-2">
                  <a role="button" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuEcommerce" href="#contactUsSection" aria-expanded="false">
                    Contact Us
                  </a>
                </li>
              </ul>

              <!-- <ul class="navbar-nav d-lg-block d-none">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/product/soft-ui-dashboard-pro" class="btn btn-sm  bg-gradient-primary  btn-round mb-0 me-1" onclick="smoothToPricing('pricing-soft-ui')">Buy Now</a>
                </li>
              </ul> -->
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section id="homeSection">
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <!-- <div class="card card-plain" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);"> -->
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Sign In</h4>
                  <p class="mb-0">Enter your username and password to sign in</p>
                </div>
                <div class="card-body">
                  <form action="<?= site_url('auth/attempt_login') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                      <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" aria-label="Username" required>
                    </div>
                    <div class="mb-3">
                      <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" required>
                    </div>
                    <!-- <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div> -->
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                      <!-- <a href="<?= base_url('user/dashboard') ?>" type="button" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign in</a> -->
                      <a href="javascript:void(0);" class="register-btn btn btn-lg bg-gradient-danger btn-lg w-100 mt-1 mb-0">Register</a>

                    </div>
                  </form>
                </div>
                <!-- <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Don't have an account?
                    <a href="javascript:;" class="text-primary text-gradient font-weight-bold">Sign up</a>
                  </p>
                </div> -->
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center">
                <img src="<?= base_url(); ?>/assets/img/shapes/pattern-lines.svg" alt="pattern-lines" class="position-absolute opacity-4 start-0">
                <div class="position-relative">
                  <img class="max-width-500 w-50 position-relative z-index-2 mx-auto d-block"
                    src="<?= base_url(); ?>/assets/img/logos/qvc_logo.png"
                    alt="chat-img">
                  <!-- <img class="max-width-500 w-100 position-relative z-index-2" src="<?= base_url(); ?>/assets/img/illustrations/chat.png" alt="chat-img"> -->
                </div>
                <h4 class="mt-5 text-white font-weight-bolder">"Attention is the new currency"</h4>
                <p class="text-white">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="aboutUsSection">
      <div class="container pt-8">
        <div class="row">
          <div class="col-lg-6 my-auto">
            <h1 class="display-1 text-bolder text-gradient text-danger">About Us</h1>
            <h2>UPSI Quality Verification Center</h2>
            <p class="lead">The UPSI Quality Verification Center (QVC UPSI) ensures the integrity and credibility of Stand-Alone Micro-Credentials (SAMCs) through a rigorous verification process. Upholding transparency and accountability, we provide a trusted system that validates learning achievements, creating clear pathways to higher education and professional recognition.

              With a commitment to excellence and innovation, QVC UPSI empowers learners and institutions with secure, authenticated credentials, reinforcing UPSI’s leadership in quality education.

              QVC UPSI – Verifying Excellence, Elevating Futures.</p>
            <button type="button" class="register-btn btn bg-gradient-dark mt-4">Register Now!</button>
          </div>
          <div class="col-lg-6 my-auto position-relative">
            <img class="w-100 position-relative" src="<?= base_url(); ?>/assets/img/logos/about_us.png" alt="404-error">
          </div>
        </div>
        <div class="row">
          <div class="row mt-4">
            <div class="col-lg-3 col-md-6 col-12">
              <div class="card bg-gradient-secondary">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <h5 class="text-white font-weight-bolder mb-0">
                          Trusted Verification
                        </h5>
                        <!-- <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">Quality verification guarantees that micro-credentials adhere to established standards in design, delivery, and assessment.</p> -->

                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                        <i class="ni ni-badge text-dark text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mt-4 mt-md-0">
              <div class="card bg-gradient-secondary">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <!-- <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">Pathways to Advancement</p> -->
                        <h5 class="text-white font-weight-bolder mb-0">
                          Pathways to Advancement
                        </h5>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                        <i class="ni ni-map-big text-dark text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mt-4 mt-lg-0">
              <div class="card bg-gradient-secondary">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <!-- <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">Excellence & Innovation</p> -->
                        <h5 class="text-white font-weight-bolder mb-0">
                          Excellence & Innovation
                        </h5>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                        <i class="ni ni-bulb-61 text-dark text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mt-4 mt-lg-0">
              <div class="card bg-gradient-secondary">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <!-- <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">Empowering Learners & Institutions</p> -->
                        <h5 class="text-white font-weight-bolder mb-0">
                          Transparent & Accountable
                        </h5>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                        <i class="ni ni-check-bold text-dark text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

    <section id="ourServiceSection" class="mt-9 pb-8" style="background: rgb(255, 226, 98) url('<?= base_url(); ?>/assets/img/shapes/pattern-lines.svg') no-repeat center;
      background-size: cover;">
      <br>
      <div class="row mt-7">
        <div class="col-md-6 mx-auto text-center">
          <h2>Our Services</h2>
          <p class="text-dark text-sm mb-0 text-capitalize font-weight-bold opacity-7">QVCs ensure the credibility and excellence of Stand-Alone Micro-Credentials (SAMCs) through rigorous verification, guaranteeing trusted and recognized qualifications.</p><br>
        </div>
      </div>
      <div class="slider">
        <button id="prev" class="btn-card-slider">
          <i class="las la-angle-left"></i>
        </button>
        <div class="news_card-content">
          <!-- news_card -->
          <div class="news_card">
            <!-- <h6>5.0</h6> -->
            <!-- <i class="lar la-star"></i> -->
            <div class="news_card-img">
              <img src="<?= base_url(); ?>/assets/img/logos/application_review.png" alt="ISO 9001 Training">
              <img class="blur" src="<?= base_url(); ?>/assets/img/logos/application_review.png" alt="ISO 9001 Training">
            </div>
            <div class="news_card-text">
              <h5>Application Review</h5>
              <p>Receiving, vetting, and tracking SAMC applications for completeness and compliance.</p>
            </div>
          </div>
          <!-- news_card End -->

          <!-- news_card -->
          <div class="news_card">
            <!-- <h6>4.8</h6> -->
            <!-- <i class="lar la-star"></i> -->
            <div class="news_card-img">
              <img src="<?= base_url(); ?>/assets/img/logos/expert_assessment.png" alt="Internal Auditing Course">
              <img class="blur" src="<?= base_url(); ?>/assets/img/logos/expert_assessment.png" alt="Internal Auditing Course">
            </div>
            <div class="news_card-text">
              <h5>Expert Assessment</h5>
              <p>Appointing qualified assessors, reviewing evaluations, and making informed verification decisions.</p>
            </div>
          </div>
          <!-- news_card End -->

          <!-- news_card -->
          <div class="news_card">
            <!-- <h6>4.9</h6> -->
            <!-- <i class="lar la-star"></i> -->
            <div class="news_card-img">
              <img src="<?= base_url(); ?>/assets/img/logos/QualityAssurance.png" alt="New Certification Program">
              <img class="blur" src="<?= base_url(); ?>/assets/img/logos/QualityAssurance.png" alt="New Certification Program">
            </div>
            <div class="news_card-text">
              <h5>Ongoing Quality Assurance</h5>
              <p>Submitting verified SAMCs to MQA and ensuring continuous compliance.</p>
            </div>
          </div>
          <!-- news_card End -->

          <!-- news_card -->
          <div class="news_card">
            <!-- <h6>4.7</h6> -->
            <!-- <i class="lar la-star"></i> -->
            <div class="news_card-img">
              <img src="<?= base_url(); ?>/assets/img/logos/guidance_consultation.png" alt="Continuous Improvement Webinar">
              <img class="blur" src="<?= base_url(); ?>/assets/img/logos/guidance_consultation.png" alt="Continuous Improvement Webinar">
            </div>
            <div class="news_card-text">
              <h5>Guidance & Consultation</h5>
              <p>Providing expert support on quality verification policies and best practices.</p>
            </div>
          </div>
          <!-- news_card End -->

          <!-- news_card -->
          <div class="news_card">
            <!-- <h6>4.6</h6> -->
            <!-- <i class="lar la-star"></i> -->
            <div class="news_card-img">
              <img src="<?= base_url(); ?>/assets/img/logos/seamless_management.png" alt="Quality Management Summit">
              <img class="blur" src="<?= base_url(); ?>/assets/img/logos/seamless_management.png" alt="Quality Management Summit">
            </div>
            <div class="news_card-text">
              <h5>Seamless System Management</h5>
              <p>Evaluating provider eligibility, overseeing assessments, and maintaining a digital platform.</p>
            </div>
          </div>
          <!-- news_card End -->

          <!-- news_card -->
          <div class="news_card">
            <!-- <h6>4.5</h6> -->
            <!-- <i class="lar la-star"></i> -->
            <div class="news_card-img">
              <img src="<?= base_url(); ?>/assets/img/logos/data_protection.png" alt="Case Studies on QVC Success">
              <img class="blur" src="<?= base_url(); ?>/assets/img/logos/data_protection.png" alt="Case Studies on QVC Success">
            </div>
            <div class="news_card-text">
              <h5>Secure Data Protection</h5>
              <p>Ensuring confidentiality and safeguarding sensitive information./p>
            </div>
          </div>
          <!-- news_card End -->
        </div>
        <button id="next" class="btn-card-slider">
          <i class="las la-angle-right"></i>
        </button>
      </div>

    </section>
    <section id="fieldSection" class="pt-5 pb-8">
      <div class="container my-6">
        <div class="row">
          <div class="col-8 mx-auto text-center">
            <h2>We Cover a Wide Range of Fields</h2>
            <p class="text-dark text-sm mb-0 text-capitalize font-weight-bold opacity-7">QVC UPSI covers a wide range of fields, ensuring comprehensive quality verification. We are continuously expanding to enhance excellence and impact.</p><br>
          </div>
        </div>
        <div class="row mt-4">
          <?php
          $badgeColors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'dark'];
          $colorIndex = 0;
          ?>
          <div class="d-flex flex-wrap gap-2">
            <?php foreach ($samc_field as $field): ?>
              <span class="badge badge-<?= $badgeColors[$colorIndex]; ?>"><?= $field->ef_desc; ?></span>
              <?php
              $colorIndex = ($colorIndex + 1) % count($badgeColors); // Cycle through colors in order
              ?>
            <?php endforeach; ?>
          </div>


        </div>
      </div>
    </section>

    <section id="pricing">

      <br>
      <div class="page-header bg-gradient-primary  position-relative m-3 border-radius-xl">
        <img src="../../assets/img/shapes/waves-white.svg" alt="pattern-lines" class="position-absolute opacity-6 start-0 top-0 w-100">
        <div class="container pb-lg-9 pb-10 pt-7 postion-relative z-index-2">
          <div class="row">
            <div class="col-md-6 mx-auto text-center">
              <h3 class="text-white">See our pricing</h3>
              <p class="text-white">You have Free Unlimited Updates and Premium Support on each package.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6 col-7 mx-auto text-center">
              <div class="nav-wrapper mt-5 position-relative z-index-2">
                <ul class="nav nav-pills nav-fill flex-row p-1" id="tabs-pricing" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link mb-0 active" id="tabs-iconpricing-tab-1" data-bs-toggle="tab" href="#monthly" role="tab" aria-controls="monthly" aria-selected="true">
                      Monthly
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0" id="tabs-iconpricing-tab-2" data-bs-toggle="tab" href="#annual" role="tab" aria-controls="annual" aria-selected="false">
                      Annual
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-n8">
        <div class="container">
          <div class="tab-content tab-space">
            <div class="tab-pane active" id="monthly">
              <div class="row">
                <div class="col-lg-4 mb-lg-0 mb-4">
                  <div class="card">
                    <div class="card-header text-center pt-4 pb-3">
                      <span class="badge rounded-pill bg-light text-dark">BASIC</span>
                      <h1 class="font-weight-bold mt-2">
                        <small>RM</small>1000
                      </h1>
                    </div>
                    <div class="card-body text-lg-start text-center pt-0">
                      <div class="d-flex justify-content-lg-start justify-content-center p-2">
                        <div class="icon icon-shape icon-xs rounded-circle bg-gradient-success shadow text-center">
                          <i class="fas fa-check opacity-10"></i>
                        </div>
                        <div>
                          <span class="ps-3">1 SAMC program review</span>
                        </div>
                      </div>
                      <div class="d-flex justify-content-lg-start justify-content-center p-2">
                        <div class="icon icon-shape icon-xs rounded-circle bg-gradient-success shadow text-center">
                          <i class="fas fa-check opacity-10"></i>
                        </div>
                        <div>
                          <span class="ps-3">Access to SAMC basic guidelines</span>
                        </div>
                      </div>
                      <div class="d-flex justify-content-lg-start justify-content-center p-2">
                        <div class="icon icon-shape icon-xs rounded-circle bg-gradient-secondary shadow text-center">
                          <i class="fas fa-minus"></i>
                        </div>
                        <div>
                          <span class="ps-3">Consultation with experts</span>
                        </div>
                      </div>
                      <div class="d-flex justify-content-lg-start justify-content-center p-2">
                        <div class="icon icon-shape icon-xs rounded-circle bg-gradient-secondary shadow text-center">
                          <i class="fas fa-minus"></i>
                        </div>
                        <div>
                          <span class="ps-3">Detailed reports on quality assurance</span>
                        </div>
                      </div>
                      <div class="d-flex justify-content-lg-start justify-content-center p-2">
                        <div class="icon icon-shape icon-xs rounded-circle bg-gradient-secondary shadow text-center">
                          <i class="fas fa-minus"></i>
                        </div>
                        <div>
                          <span class="ps-3">Limited access to best practices</span>
                        </div>
                      </div>
                      <a href="javascript:;" class="btn btn-icon bg-gradient-dark d-lg-block mt-3 mb-0">
                        Join
                        <i class="fas fa-arrow-right ms-1"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 mb-lg-0 mb-4">
                  <div class="card">
                    <div class="card-header text-center pt-4 pb-3">
                      <span class="badge rounded-pill bg-light text-dark">Premium</span>
                      <h1 class="font-weight-bold mt-2">
                        <small>RM</small>389
                      </h1>
                    </div>
                    <div class="card-body text-lg-start text-center pt-0">
                      <div class="d-flex justify-content-lg-start justify-content-center p-2">
                        <div class="icon icon-shape icon-xs rounded-circle bg-gradient-success shadow text-center">
                          <i class="fas fa-check opacity-10"></i>
                        </div>
                        <div>
                          <span class="ps-3">Up to 5 SAMC program reviews</span>
                        </div>
                      </div>
                      <div class="d-flex justify-content-lg-start justify-content-center p-2">
                        <div class="icon icon-shape icon-xs rounded-circle bg-gradient-success shadow text-center">
                          <i class="fas fa-check opacity-10"></i>
                        </div>
                        <div>
                          <span class="ps-3">Access to comprehensive SAMC guidelines</span>
                        </div>
                      </div>
                      <div class="d-flex justify-content-lg-start justify-content-center p-2">
                        <div class="icon icon-shape icon-xs rounded-circle bg-gradient-success shadow text-center">
                          <i class="fas fa-check opacity-10"></i>
                        </div>
                        <div>
                          <span class="ps-3">In-depth analysis of quality assurance reports</span>
                        </div>
                      </div>
                      <div class="d-flex justify-content-lg-start justify-content-center p-2">
                        <div class="icon icon-shape icon-xs rounded-circle bg-gradient-success shadow text-center">
                          <i class="fas fa-check opacity-10"></i>
                        </div>
                        <div>
                          <span class="ps-3">Expert consultation on SAMC implementation</span>
                        </div>
                      </div>
                      <div class="d-flex justify-content-lg-start justify-content-center p-2">
                        <div class="icon icon-shape icon-xs rounded-circle bg-gradient-secondary shadow text-center">
                          <i class="fas fa-minus"></i>
                        </div>
                        <div>
                          <span class="ps-3">Access to advanced tools and resources</span>
                        </div>
                      </div>
                      <a href="javascript:;" class="btn btn-icon bg-gradient-primary d-lg-block mt-3 mb-0">
                        Try Premium
                        <i class="fas fa-arrow-right ms-1"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 mb-lg-0 mb-4">
                  <div class="card">
                    <div class="card-header text-center pt-4 pb-3">
                      <span class="badge rounded-pill bg-light text-dark">Enterprise</span>
                      <h1 class="font-weight-bold mt-2">
                        <small>RM</small>499
                      </h1>
                    </div>
                    <div class="card-body text-lg-start text-center pt-0">
                      <div class="d-flex justify-content-lg-start justify-content-center p-2">
                        <div class="icon icon-shape icon-xs rounded-circle bg-gradient-success shadow text-center">
                          <i class="fas fa-check opacity-10"></i>
                        </div>
                        <div>
                          <span class="ps-3">Unlimited SAMC program reviews</span>
                        </div>
                      </div>
                      <div class="d-flex justify-content-lg-start justify-content-center p-2">
                        <div class="icon icon-shape icon-xs rounded-circle bg-gradient-success shadow text-center">
                          <i class="fas fa-check opacity-10"></i>
                        </div>
                        <div>
                          <span class="ps-3">Priority access to all SAMC guidelines</span>
                        </div>
                      </div>
                      <div class="d-flex justify-content-lg-start justify-content-center p-2">
                        <div class="icon icon-shape icon-xs rounded-circle bg-gradient-success shadow text-center">
                          <i class="fas fa-check opacity-10"></i>
                        </div>
                        <div>
                          <span class="ps-3">Comprehensive consultation and expert support</span>
                        </div>
                      </div>
                      <div class="d-flex justify-content-lg-start justify-content-center p-2">
                        <div class="icon icon-shape icon-xs rounded-circle bg-gradient-success shadow text-center">
                          <i class="fas fa-check opacity-10"></i>
                        </div>
                        <div>
                          <span class="ps-3">Full access to tools and resources</span>
                        </div>
                      </div>
                      <div class="d-flex justify-content-lg-start justify-content-center p-2">
                        <div class="icon icon-shape icon-xs rounded-circle bg-gradient-success shadow text-center">
                          <i class="fas fa-check opacity-10"></i>
                        </div>
                        <div>
                          <span class="ps-3">Personalized program reviews and feedback</span>
                        </div>
                      </div>
                      <a href="javascript:;" class="btn btn-icon bg-gradient-dark d-lg-block mt-3 mb-0">
                        Join
                        <i class="fas fa-arrow-right ms-1"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Add similar structure for the "annual" section -->
          </div>
        </div>
      </div>

    </section>

    <section id="faqSection" class="mb-10">
      <br>
      <div class="row mt-8">
        <div class="col-md-6 mx-auto text-center">
          <h2>Frequently Asked Questions</h2>
          <p>Here are some common questions regarding the Quality Verification Center (QVC) system for Stand-Alone Micro-Credentials (SAMCs). If you don't find the information you need, feel free to contact us.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-10 mx-auto">
          <div class="accordion" id="accordionRental">
            <div class="accordion-item mb-3">
              <h5 class="accordion-header" id="headingOne">
                <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  What are Stand-Alone Micro-Credentials (SAMCs)?
                  <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"></i>
                  <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"></i>
                </button>
              </h5>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionRental">
                <div class="accordion-body text-sm opacity-8">
                  Stand-Alone Micro-Credentials (SAMCs) are specialized digital credentials that validate specific skills or competencies in targeted areas of study. These credentials are offered by accredited providers and demonstrate that an individual has achieved a certain level of expertise or knowledge. SAMCs are a flexible and effective way for learners to gain recognition for non-degree programs and enhance their employability.
                </div>
              </div>
            </div>
            <div class="accordion-item mb-3">
              <h5 class="accordion-header" id="headingTwo">
                <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Who can apply for QVC certification?
                  <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"></i>
                  <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"></i>
                </button>
              </h5>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionRental">
                <div class="accordion-body text-sm opacity-8">
                  QVC certification is available to accredited educational institutions, training providers, and professional organizations that offer SAMC programs. Providers must ensure their programs meet quality standards and align with industry requirements before applying for certification. Certification confirms that the SAMC program meets national and international standards for quality and competency.
                </div>
              </div>
            </div>
            <div class="accordion-item mb-3">
              <h5 class="accordion-header" id="headingThree">
                <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  What is the process for obtaining QVC certification for SAMCs?
                  <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"></i>
                  <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"></i>
                </button>
              </h5>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionRental">
                <div class="accordion-body text-sm opacity-8">
                  To obtain QVC certification for SAMCs, providers must submit an application detailing their program's learning outcomes, assessment criteria, and alignment with industry needs. After the submission, QVC will conduct a thorough review to ensure that the program meets established quality standards. If approved, the SAMC will be awarded QVC certification, signaling its quality and relevance.
                </div>
              </div>
            </div>
            <div class="accordion-item mb-3">
              <h5 class="accordion-header" id="headingFour">
                <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  How often do SAMCs need to be recertified?
                  <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"></i>
                  <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"></i>
                </button>
              </h5>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionRental">
                <div class="accordion-body text-sm opacity-8">
                  SAMCs are required to be recertified every three years. During the recertification process, QVC will review the program to ensure it remains aligned with current industry standards and educational quality requirements. Providers may need to update their programs to reflect changes in the industry or advancements in educational practices to maintain their certification.
                </div>
              </div>
            </div>
            <div class="accordion-item mb-3">
              <h5 class="accordion-header" id="headingFifth">
                <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFifth" aria-expanded="false" aria-controls="collapseFifth">
                  Can SAMCs be transferred across different educational institutions or industries?
                  <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"></i>
                  <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"></i>
                </button>
              </h5>
              <div id="collapseFifth" class="accordion-collapse collapse" aria-labelledby="headingFifth" data-bs-parent="#accordionRental">
                <div class="accordion-body text-sm opacity-8">
                  Yes, SAMCs are designed to be transferable across educational institutions and industries. Their value lies in their ability to demonstrate specific competencies and skills, making them relevant across different sectors. However, learners and employers should verify that the SAMC is certified by QVC to ensure that it is credible and meets quality standards.
                </div>
              </div>
            </div>
            <div class="accordion-item mb-3">
              <h5 class="accordion-header" id="headingSixth">
                <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSixth" aria-expanded="false" aria-controls="collapseSixth">
                  What happens if a SAMC provider doesn’t meet the standards?
                  <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"></i>
                  <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"></i>
                </button>
              </h5>
              <div id="collapseSixth" class="accordion-collapse collapse" aria-labelledby="headingSixth" data-bs-parent="#accordionRental">
                <div class="accordion-body text-sm opacity-8">
                  If a SAMC provider fails to meet the established standards, QVC may deny or revoke certification. Providers may also be asked to make corrective improvements to align with the required quality benchmarks. In severe cases, QVC can impose sanctions or suspend a provider’s ability to offer SAMCs. Our goal is to ensure that all certified programs maintain high-quality standards and deliver the expected learning outcomes.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="contactUsSection" class="pb-7" style="background: rgb(255, 226, 98) url('<?= base_url(); ?>/assets/img/shapes/pattern-lines.svg') no-repeat center;
      background-size: cover;">
      <div class="row pt-7">
        <div class="col-md-6 mx-auto text-center">
          <h2>Contact Us</h2>
          <p class="text-dark text-sm mb-0 text-capitalize font-weight-bold opacity-7">A lot of people don&#39;t appreciate the moment until it’s passed. I&#39;m not trying my hardest, and I&#39;m not trying to do </p>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row mt-4 px-10 text-center">
          <div class="col-lg-8 mx-auto text-center mb-4">
            <div class="card">
              <div class="card-header bg-light">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-12">
                    <div class="d-flex align-items-center position-relative">
                      <h5 class="font-weight-bold mb-0 text-dark">
                        Our Location
                      </h5>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body px-0 py-0">
                <div id="map-container" style="height:45vh !important;">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d817.0170854983489!2d101.52684795359764!3d3.6841994101438242!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cb880a110b3653%3A0x79bb2873af2f6cd5!2sBilik%20Mesyuarat%20Pusat%20ICT%2C%20UPSI!5e0!3m2!1sen!2smy!4v1736840433067!5m2!1sen!2smy" width="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
              </div>
              <div class="card-footer bg-light">
              </div>
            </div>
          </div>
          <div class="col-lg-4 mx-auto text-center">
            <div class="card shadow-lg border-0" style="height:540px;">
              <div class="card-header bg-light text-dark">
                <div class="row">
                  <div class="col-md-10 d-flex align-items-center">
                    <h5 class="font-weight-bold mb-0 text-dark">Contact Information</h5>
                  </div>
                  <div class="col-md-2 text-end">
                    <a href="javascript:;" class="text-dark">
                      <i class="fas fa-user-edit text-dark text-md" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit Profile" data-bs-original-title="Edit Profile"></i>
                    </a>
                  </div>
                </div>
              </div>
              <div class="card-body p-4">
                <ul class="list-group">
                  <!-- Address -->
                  <li class="list-group-item border-0 ps-0 pt-0 text-md">
                    <strong class="text-dark">ADDRESS:</strong>
                    <p class="mb-0 text-md">
                      Quality Management Division,
                      Sultan Abdul Jalil Shah Campus,
                      35900 Tanjong Malim,
                      Perak, Malaysia
                    </p>
                  </li>
                  <!-- Phone -->
                  <li class="list-group-item border-0 ps-0 text-md">
                    <strong class="text-dark">Phone:</strong>
                    <p class="mb-0 text-md">05-450 5330 / 5334 / 5439 / 5188 / 5080</p>
                  </li>
                  <!-- Email -->
                  <li class="list-group-item border-0 ps-0 text-md">
                    <strong class="text-dark">Email:</strong>
                    <p class="mb-0 text-md"><a href="mailto:bpq@upsi.edu.my" class="text-decoration-none">bpq@upsi.edu.my</a></p>
                  </li>
                  <!-- Social Links -->
                  <li class="list-group-item border-0 ps-0 pb-0 text-md">
                    <strong class="text-dark">Social:</strong><br>
                    <ul class="wrapper">
                      <a href="https://www.facebook.com/profile.php?id=100057479467925">
                        <li class="icon tiktok">
                          <span class="tooltip">Tiktok</span>
                          <span><i class="fab fa-tiktok"></i></span>
                        </li>
                      </a>
                      <a href="https://www.facebook.com/profile.php?id=100057479467925">
                        <li class="icon instagram">
                          <span class="tooltip">Facebook</span>
                          <span><i class="fab fa-facebook-f"></i></span>
                        </li>
                      </a>
                      <!--<li class="icon github">-->
                      <!--  <span class="tooltip">Github</span>-->
                      <!--  <span><i class="fab fa-github"></i></span>-->
                      <!--</li>-->
                      <a href="https://www.youtube.com/channel/UCAC8sXxSYoHzjnc5L7sj1iA">
                        <li class="icon youtube">
                          <span class="tooltip">Youtube</span>
                          <span><i class="fab fa-youtube"></i></span>
                        </li>
                      </a>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="card-footer bg-light">
              </div>
            </div>
          </div>

        </div>
      </div>

    </section>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <footer
      class="bg-gradient-primary footer px-7"
      style="position: relative; overflow: hidden; margin: 0; padding: 0;">
      <img
        src="<?= base_url(); ?>/assets/img/shapes/pattern-lines.svg"
        alt="pattern-lines"
        style="position: absolute; opacity: 0.4; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
      <div class="container">
        <div class="row m-4">

          <div class="col-lg-8 mx-auto text-center">
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg bi bi-dribbble text-white"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg bi bi-twitter text-white"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg bi bi-instagram text-white"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg bi bi-pinterest text-white"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg bi bi-github text-white"></span>
            </a>
          </div>

        </div>

      </div>
    </footer>
    <div class="row bg-dark">
      <div class="col-8 mx-auto text-center mt-2">
        <p class="mb-0 text-white">
          Copyright © <script>
            document.write(new Date().getFullYear())
          </script> Soft by Creative Tim.
        </p>
      </div>
    </div>
    <div>
      <a class="scroll-to-top bg-white px-3 py-2" href="#homeSection" id="scrollToTopBtn">
        <i class="fas fa-angle-up"></i>
      </a>
    </div>

    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  </main>
  <!--   Core JS Files   -->
  <script src="<?= base_url(); ?>/assets/js/core/popper.min.js"></script>
  <script src="<?= base_url(); ?>/assets/js/core/bootstrap.min.js"></script>
  <!-- <script src="<?= base_url(); ?>/assets/js/plugins/perfect-scrollbar.min.js"></script> -->
  <!-- <script src="<?= base_url(); ?>/assets/js/plugins/smooth-scrollbar.min.js"></script> -->
  <!-- Kanban scripts -->
  <!-- <script src="<?= base_url(); ?>/assets/js/plugins/dragula/dragula.min.js"></script> -->
  <!-- <script src="<?= base_url(); ?>/assets/js/plugins/jkanban/jkanban.js"></script> -->
  <!-- <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script> -->
  <!-- Github buttons -->
  <!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url(); ?>/assets/js/soft-ui-dashboard.min.js?v=1.1.1"></script>

  <!-- News Button Function -->
  <script>
    const next = document.querySelector('#next')
    const prev = document.querySelector('#prev')

    function handleScrollNext(direction) {
      const cards = document.querySelector('.news_card-content')
      cards.scrollLeft = cards.scrollLeft += window.innerWidth / 2 > 600 ? window.innerWidth / 2 : window.innerWidth - 100
    }

    function handleScrollPrev(direction) {
      const cards = document.querySelector('.news_card-content')
      cards.scrollLeft = cards.scrollLeft -= window.innerWidth / 2 > 600 ? window.innerWidth / 2 : window.innerWidth - 100
    }

    next.addEventListener('click', handleScrollNext)
    prev.addEventListener('click', handleScrollPrev)
  </script>
  <!-- Register Button -->
  <script>
    document.querySelectorAll('.register-btn').forEach(button => {
      button.addEventListener('click', function() {
        Swal.fire({
          title: 'Are you a provider or assessor?',
          showCancelButton: true,
          confirmButtonText: 'Provider',
          cancelButtonText: 'Assessor',
          icon: 'question',
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            // Redirect to provider registration
            window.location.href = '<?= site_url('auth/register_provider') ?>';
          } else if (result.dismiss === Swal.DismissReason.cancel) {
            // Redirect to assessor registration
            window.location.href = '<?= site_url('auth/register_assessor') ?>';
          }
        });
      });
    });

    // Scroller
    window.addEventListener('scroll', function() {
      var scrollToTopBtn = document.getElementById('scrollToTopBtn');
      // Get the scroll position and the total scrollable height
      var scrollPosition = window.scrollY || document.documentElement.scrollTop;
      var documentHeight = document.documentElement.scrollHeight - window.innerHeight;

      // If the user has scrolled to near the bottom, show the button
      if (scrollPosition >= documentHeight - 100) {
        scrollToTopBtn.classList.add('visible');
      } else {
        scrollToTopBtn.classList.remove('visible');
      }
    });
  </script>
</body>

</html>

<?php if (session()->getFlashdata('success')): ?>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Success',
      text: '<?= session()->getFlashdata('success'); ?>'
    });
  </script>
<?php elseif (session()->getFlashdata('error')): ?>
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: '<?= session()->getFlashdata('error'); ?>'
    });
  </script>
<?php endif; ?>
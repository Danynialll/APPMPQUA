<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>
    QVC UPSI Register Assessor
  </title>
  <!-- SweetAlert CDN -->
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.js"></script>

  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

  <!-- Nucleo Icons -->
  <link href="<?= base_url(); ?>assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?= base_url(); ?>assets/css/nucleo-svg.css" rel="stylesheet" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/favicon.png">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha384-UG8ao2jwOWB7/oDdObZc6ItJmwUkR/PfMyt9Qs5AwX7PsnYn1CRKCTWyncPTWvaS" crossorigin="anonymous"></script>

  <link href="<?= base_url(); ?>assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url(); ?>assets/css/soft-ui-dashboard.css?v=1.1.1" rel="stylesheet" />

  <!-- Select 2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <link href="<?= base_url(); ?>assets/css/select2override.css" rel="stylesheet" />

  <style>
    @media (max-width: 992px) {

      /* Adjust max-width as needed */
      body {
        background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
        background-size: 400% 400%;
        animation: gradient 15s ease infinite;
        height: 100vh;
      }

      @keyframes gradient {
        0% {
          background-position: 0% 50%;
        }

        50% {
          background-position: 100% 50%;
        }

        100% {
          background-position: 0% 50%;
        }
      }

      .card.card-plain {
        background-color: white;
      }
    }

    body {
      overflow-x: hidden;
      /* Hides horizontal scrollbar */
    }
  </style>

</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-6 col-lg-7 col-md-8 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-left">
                  <h4 class="font-weight-bolder">Sign Up</h4>
                  <p class="mb-0">Enter your email and password to register</p>
                </div>
                <div class="card-body pb-3">
                  <form action="<?= base_url('auth/attempt_register_provider') ?>" method="post" role="form" enctype="multipart/form-data">
                    <?= csrf_field() ?> <!-- Add CSRF protection -->

                    <!-- Organization Name -->
                    <label for="organizationName">Organization Name</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" name="pvd_name" id="pvd_name" placeholder="Enter organization name" aria-label="Organization Name" required>
                    </div>

                    <!-- SSM Number and SSM Certification Upload Side by Side -->
                    <div class="row">
                      <div class="col-md-4">
                        <label for="ssmNumber">SSM Number</label>
                        <div class="mb-3">
                          <input type="text" class="form-control" name="pvd_ssm_number" id="pvd_ssm_number" placeholder="Enter SSM number" aria-label="SSM Number" required>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <label for="pvd_ssm_cert">SSM Certification</label>
                        <div class="mb-3">
                          <input type="file" class="form-control" name="pvd_ssm_cert" id="pvd_ssm_cert" aria-label="SSM Certification" accept=".pdf,.jpg,.png" required>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <!-- Type of Organization -->
                        <label for="organizationType">Type</label>
                        <div class="mb-3">
                          <select class="form-control" id="organizationType" name="pvd_type" aria-label="Organization Type" required>
                            <option value="">Select type</option>
                            <option value="government">Government</option>
                            <option value="non-government">Non-Government</option>
                            <option value="government-related">Government Related</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <label for="email">Email</label>
                        <div class="mb-3">
                          <input type="email" class="form-control" name="pvd_email" id="pvd_email" placeholder="Enter email address" aria-label="Email" required>
                        </div>
                      </div>

                    </div>

                    <!-- Address -->
                    <label for="address">Address</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" name="pvd_address" id="pvd_address" placeholder="Enter address" aria-label="Address" required>
                    </div>

                    <!-- Date of Establishment and Contact Side by Side -->
                    <div class="row">
                      <div class="col-md-6">
                        <label for="establishmentDate">Date of Establishment</label>
                        <div class="mb-3">
                          <input type="date" class="form-control" name="pvd_doe" id="pvd_doe" aria-label="Date of Establishment" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="contact">Contact</label>
                        <div class="mb-3">
                          <input type="tel" class="form-control" name="pvd_phone" id="pvd_phone" placeholder="Enter contact number" aria-label="Contact" required>
                        </div>
                      </div>
                    </div>

                    <!-- Username -->
                    <label for="username">Username</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" aria-label="Username" required>
                    </div>

                    <!-- Password -->
                    <label for="password">Password</label>
                    <div class="mb-3">
                      <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" aria-label="Password" required>
                    </div>

                    <!-- Confirm Password -->
                    <label for="confirmPassword">Confirm Password</label>
                    <div class="mb-3">
                      <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm password" aria-label="Confirm Password" required>
                    </div>


                    <!-- Terms and Conditions -->
                    <div class="form-check form-check-info text-left">
                      <input class="form-check-input" type="checkbox" id="termsAndConditions" required>
                      <label class="form-check-label" for="termsAndConditions">
                        I agree to the <a href="<?= base_url(); ?>pages/privacy.html" target="_blank" class="text-dark font-weight-bolder">Terms and Conditions</a>
                      </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-primary w-100 mt-4 mb-0">Sign Up</button>
                    </div>
                  </form>


                </div>
                <div class="card-footer text-center pt-0 px-sm-4 px-1">
                  <p class="mb-4 mx-auto">
                    Already have an account?
                    <a href="<?= base_url(); ?>auth/" class="text-primary text-gradient font-weight-bold">Sign in</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center">
                <img src="<?= base_url(); ?>assets/img/shapes/pattern-lines.svg" alt="pattern-lines" class="position-absolute opacity-4 start-0">
                <div class="position-relative">
                  <img class="max-width-500 w-100 position-relative z-index-2" src="<?= base_url(); ?>assets/img/logos/register.png" alt="rocket">
                </div>
                <h4 class="mt-5 text-white font-weight-bolder">Sign up now to unlock exclusive benefits!</h4>
                <p class="text-white">Get access to comprehensive SAMC guidelines and consultation from our subject matter experts</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="<?= base_url(); ?>assets/js/core/popper.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/plugins/smooth-scrollbar.min.js"></script>
  <!-- Include jQuery and select2.js -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Load jQuery first -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url(); ?>assets/js/soft-ui-dashboard.min.js?v=1.1.1"></script>
  <script>
    document.querySelector("form").addEventListener("submit", function(event) {
      // Get the values of password and confirmPassword
      var password = document.getElementById("password").value;
      var confirmPassword = document.getElementById("confirmPassword").value;

      // Check if the passwords match
      if (password !== confirmPassword) {
        // Prevent form submission
        event.preventDefault();

        // Display SweetAlert error message
        Swal.fire({
          title: 'Error!',
          text: 'Passwords do not match. Please check your input.',
          icon: 'error',
          confirmButtonText: 'Okay'
        });
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
    let errorMessages = <?= json_encode(session()->getFlashdata('error')); ?>;
    Swal.fire({
      icon: 'error',
      title: 'Error',
      html: Array.isArray(errorMessages) ?
        errorMessages.map(msg => `<p>${msg}</p>`).join('') : errorMessages
    });
  </script>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Welcome Back</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            overflow: hidden;
            max-width: 400px;
            width: 100%;
            transition: transform 0.3s ease;
        }
        
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-align: center;
            padding: 2rem 1.5rem;
            border: none;
        }
        
        .card-header h2 {
            margin: 0;
            font-weight: 300;
            font-size: 2rem;
        }
        
        .card-header p {
            margin: 0.5rem 0 0 0;
            opacity: 0.9;
            font-size: 0.9rem;
        }
        
        .card-body {
            padding: 2rem 1.5rem;
        }
        
        .form-floating {
            margin-bottom: 1rem;
        }
        
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 1rem 0.75rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            background: white;
        }
        
        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 12px;
            padding: 1rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
            background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
        }
        
        .forgot-password {
            text-align: center;
            margin-top: 1.5rem;
        }
        
        .forgot-password a {
            color: #667eea;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .forgot-password a:hover {
            color: #764ba2;
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #6c757d;
            cursor: pointer;
            z-index: 10;
        }
        
        .password-field {
            position: relative;
        }
        
        @media (max-width: 576px) {
            .login-container {
                padding: 10px;
            }
            
            .card-header {
                padding: 1.5rem 1rem;
            }
            
            .card-body {
                padding: 1.5rem 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="card-header">
                <h2><i class="fas fa-user-circle me-2"></i>Welcome Back</h2>
                <p>Sign in to your account</p>
            </div>
            <div class="card-body">
                <form action="<?= site_url('auth/appmpqua/attempt_login_MPQUA') ?>" method="post">
                  <?= csrf_field() ?>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                        <label for="username"><i class="fas fa-user me-2"></i>Username</label>
                    </div>
                    
                    <div class="form-floating password-field">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <label for="password"><i class="fas fa-lock me-2"></i>Password</label>
                        <button type="button" class="password-toggle" onclick="togglePassword()">
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-login w-100">
                        <i class="fas fa-sign-in-alt me-2"></i>Sign In
                    </button>
                </form>
                
                <div class="forgot-password">
                    <a href="#" onclick="forgotPassword()">Forgot your password?</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
        
        function forgotPassword() {
            alert('Forgot password functionality would be implemented here');
        }
        
        
        // Add some interactive animations
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
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
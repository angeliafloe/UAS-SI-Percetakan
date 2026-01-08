<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Register Akun</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid bg-light">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-white rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="text-center mb-3">
                        <a href="index.html" class="d-inline-block mb-3">
                            <img src="img/mjl.jpg" width="100px" height="auto" class="rounded">
                            <h3 class="mt-2" style="color: #0a6ea2;">Registrasi Akun Baru</h3>
                        </a>
                    </div>
                    
                    <form id="registerForm" method="POST" action="register-process.php">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="namaLengkap" name="nama_lengkap" placeholder="" required>
                            <label for="namaLengkap">Nama Lengkap</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                            <label for="email">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="noHp" name="no_hp" placeholder="" required>
                            <label for="noHp">Nomor Telepon</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="confirmPassword" name="confirm_password" placeholder="Konfirmasi Password" required>
                            <label for="confirmPassword">Konfirmasi Password</label>
                        </div>
                        
                        <button type="submit" class="btn py-3 w-100 mb-4" style="background-color: #0a6ea2; border-color: #0a6ea2; color: white;">Daftar Sekarang</button>
                        
                        <p class="text-center mb-0">Sudah punya akun? <a href="login.php">Login disini</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Validasi form sebelum submit
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Password dan Konfirmasi Password tidak cocok!');
                return false;
            }
            
            alert('Registrasi berhasil! Silakan login.');
        });
    </script>
</body>

</html>
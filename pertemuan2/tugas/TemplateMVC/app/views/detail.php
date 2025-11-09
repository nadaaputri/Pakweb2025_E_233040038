<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
<link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    
    <!-- Menampilkan nama pengguna dengan sanitasi HTML -->
    <h1>Selamat Datang, <?= htmlspecialchars($user['name']); ?></h1>

    <!-- Menampilkan email pengguna -->
    <p>Email: <?= htmlspecialchars($user['email']); ?></p>
    <!-- Link untuk kembali ke halaman daftar pengguna -->
     <br><br>
    <a class="btn btn-secondary" href="<?= BASEURL; ?>/user" class="btn">Kembali ke Daftar</a>

</div>
<script src="<?= BASEURL; ?>/js/bootstrap.bundle.min.js"></script>
</body>
</html>

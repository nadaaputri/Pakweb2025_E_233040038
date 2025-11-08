<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
<link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css"></head>
<body>
<div class="container">

    <h1>Daftar Pengguna</h1>

    <!-- Tabel untuk menampilkan daftar semua pengguna -->
    <table class="user-table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

        <!-- Loop untuk menampilkan setiap pengguna -->
        <?php foreach ($users as $user): ?>
            <tr>
                <!-- Menampilkan nama pengguna dengan sanitasi HTML -->
                <td><?= htmlspecialchars($user['name']); ?></td>

                <!-- Menampilkan email dengan sanitasi HTML -->
                <td><?= htmlspecialchars($user['email']); ?></td>

                <!-- Link untuk melihat detail pengguna berdasarkan ID -->
                <td>
                     <a type="button" class="btn btn-warning" href="<?= BASEURL; ?>/user/ubah/<?= $user['id']; ?>" class="btn-small">Ubah</a>

                    <a type="button" class="btn btn-secondary" href="<?= BASEURL; ?>/user/detail/<?= $user['id']; ?>" class="btn-small">Detail</a>

                    <a type="button" class="btn btn-danger" href="<?= BASEURL; ?>/user/hapus/<?= $user['id']; ?>" class="btn-small" onclick="return confirm('Anda akan menghapus data ini?');">Hapus</a>
                </td>
               
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
    <a type="button" class="btn btn-primary" href="<?= BASEURL; ?>/user/tambah">Tambah Data User</a>
    <br><br>
</div>
<script src="<?= BASEURL; ?>/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
</head>
<body>
    
    <h3>Tambah Data User</h3>

    <form action="<?= BASEURL; ?>/user/prosesTambah" method="post">
        
        <label for="name">Nama:</label>
        <br>
        <input type="text" id="name" name="name" required>
        <br><br>

        <label for="email">Email:</label>
        <br>
        <input type="email" id="email" name="email" required>
        <br><br>

        <button type="submit">Tambah Data</button>

    </form>
    
    <br>
    <a href="<?= BASEURL; ?>/user">Kembali ke Daftar</a>

</body>
</html>
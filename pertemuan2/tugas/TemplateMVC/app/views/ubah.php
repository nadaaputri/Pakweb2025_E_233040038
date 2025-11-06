<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
</head>
<body>
    <h3>Ubah Data User</h3>

    <form action="<?= BASEURL; ?>/user/prosesUbah" method="post">
        <input type="hidden" name='id' value="<?= $user['id']; ?>">

        <label for="name">Nama:</label>
        <br>
        <input type="text" id="name" name="name" <?= $user['name']; ?> required>
        <br><br>

        <label for="email">Email:</label>
        <br>
        <input type="email" id="email" name="email" <?= $user['email']; ?> required>
        <br><br>

        <button type="submit">Ubah Data</button>
    </form>

    <br>
    <a href="<?= BASEURL; ?>/user">Kembali ke Daftar</a>

</body>
</html>
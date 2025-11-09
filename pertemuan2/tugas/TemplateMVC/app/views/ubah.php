<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
</head>
<body>
    <h3 class="text-center mb-5">Ubah Data User</h3>

    <form class="text-center" action="<?= BASEURL; ?>/user/prosesUbah" method="post">
        <input type="hidden" name='id' value="<?= $user['id']; ?>">

        <div class="mb-3">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" <?= $user['name']; ?> required>
        </div>

        <div class="mb-5">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" <?= $user['email']; ?> required>
        </div>
        <div class="d-flex justify-content-evenly">
            <a class="btn btn-secondary" href="<?= BASEURL; ?>/user">Kembali ke Daftar</a>
            <button class="btn btn-primary" type="submit" >Ubah Data</button>
        </div>

    </form>

</body>
</html>
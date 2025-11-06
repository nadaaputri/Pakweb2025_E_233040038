<?php

/**
 * Controller User
 * Mengatur tampilan daftar user dan detail user
 */
class User extends Controller
{
    // Method utama - routing berdasarkan parameter id
    public function index()
    {
        $data["judul"] = "Data user";
        $data['users'] = $this->model('User_model')->getAllUsers();
        $this->view('list', $data);
    }

    // Tampilkan detail user berdasarkan id
    public function detail($id)
    {
        $data["judul"] = "Detail user";
        $data['user'] = $this->model('User_model')->getUserById($id);
        $this->view('detail', $data);
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Data User';
        // Langsung panggil view-nya
        $this->view('tambah', $data);
    }

    /**
     * Memproses data dari form tambah
     * Dipanggil dari form action
     */
    public function prosesTambah()
    {
        // Panggil model untuk tambah data, kirimkan data $_POST
        if( $this->model('User_model')->tambahDataUser($_POST) > 0 ) {
            // Jika berhasil, redirect kembali ke halaman utama user
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            // Jika gagal, redirect juga (bisa ditambahi pesan error)
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }
}

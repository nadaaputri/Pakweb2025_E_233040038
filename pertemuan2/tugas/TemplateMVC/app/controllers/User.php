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
        $this->view('footer', $data);
        $this->view('header', $data);
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

    public function ubah($id)
    {
        $data['judul'] = 'Ubah Data User';
        $data['user'] = $this->model('User_model')->getUserById($id);
        // Langsung panggil view-nya
        $this->view('ubah', $data);
        $this->view('footer', $data);
        $this->view('header', $data);
    }

    public function prosesUbah(){
        if( $this->model('User_model')->ubahDataUser($_POST) > 0 ){
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }

    public function hapus($id){
        if( $this->model('User_model')->hapusDataUser($id) > 0 ){
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }
}

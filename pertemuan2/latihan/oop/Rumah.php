<?php

//Definisi class Rumah
class Rumah {   

    //BAGIAN PROPERTY
    public $warna ;
    public $jumlahKamar;    
    public $alamat;

    //BAGIAN CONSTRUCTOR
    public function __construct($warna, $alamat) {
        $this->warna = $warna;
        $this->alamat = $alamat;
    }


    //BAGIAN METHOD
    //ini adalah perilaku/aksi
    //'public adalah 'visibility'
    public function kunciPintu() {
        return "Pintu sudah dikunci.";
    }

    //public function gantiWarna($warnaBaru) {
      //  $this->warna = $warnaBaru;
    //}
}

function pasangListrik(Rumah $dataRumah){
        return "Listrik sedang dipasang di rumah " . $dataRumah->warna . " yang beralamat di " . $dataRumah->alamat;
    }

// BAGIAN OBJECT (RUMAH JADI)

$rumahSaya = new Rumah("Merah", "Jln. Merdeka No. 10");

echo pasangListrik($rumahSaya);
echo "<br>";

//CONTOH ERROR
// 3. Coba panggil fungsi dengan data string (SALAH)
$teksBiasa = "Ini cuma string";
//Baris di bawah ini jika dijalanakan akan ERROR:
//echo pasangListrik($teksBiasa);
//PHP akan error karena $teksBiasa BUKAN object 'Rumah'
?>
<?php

class ContohStatic {
    public static $angka = 1;

    public static function hallo(){
        return "Hallo";
    }
}

echo ContohStatic::$angka; // mengakses properti static
echo "<br>";
echo ContohStatic::hallo(); // mengakses method static

define("NAMA", "Hikmal Ryvaldi");
const NRP = 2230400;

echo NAMA
echo "<br>";
echo NRP;
?>
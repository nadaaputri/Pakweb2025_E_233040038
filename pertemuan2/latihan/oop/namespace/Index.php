<?php

require_once 'App/Init.php';

//'import' class user dari namespace App\Service dan beri alias 'ServiceUser'
use App\Service\User as ServiceUser;
//'import' class user dari namespace App\Produk dan beri alias 'ProdukUser'
use App\Produk\User as ProdukUser;

new ServiceUser();
echo "<br>";
new ProdukUser();
?>
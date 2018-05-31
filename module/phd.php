<?php
include 'bomphd.php';

/*
    https://github.com/nee48/BomSmsPhD
    Made by Handika Pratama
    Modified by まやちゃん
*/

$init = new Bom();

//Eksekusi Sms Boomber
echo "Nomor Target (tanpa 0/62)\nInput : ";
$a = trim(fgets(STDIN));
$init->no = "$a";
echo "Jumlah Pesan\nInput : ";
$b = trim(fgets(STDIN));
$loop = "$b";
for ($i=0; $i < $loop; $i++) {
    $init->Verif($init->no);
}

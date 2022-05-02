<?php
if(!isset($_FILES['gorsel'])) { echo "Dosya seçilmemiş"; exit(); }

$dosyaAdi = $_FILES['gorsel']['name'];
$dosyaBoyutu = $_FILES['gorsel']['size'];
$dosyaKopyasininYolu  = $_FILES['gorsel']['tmp_name'];

$dosyaUzantisi = explode('.',$dosyaAdi);
$dosyaUzantisi = end($dosyaUzantisi);
$dosyaUzantisi = strtolower($dosyaUzantisi);

if (!in_array($dosyaUzantisi, ['jpeg','jpg','png'])) { 
    echo 'Dosya uzantısı geçersiz. Lütfen jpg veya png dosya seçin'; 
    exit();
}

if ($dosyaBoyutu > 4 * 1024 * 1024) { 
    echo 'Dosya boyutu 4 mb üzerinde olamaz.'; 
    exit();
}

$dosyaYolu = 'gorseller/'.$dosyaAdi; // Bu php dosyasının olduğu aynı yerde gorseller klasörü de olmalı.
$uploadEdildi = move_uploaded_file($dosyaKopyasininYolu, $dosyaYolu);
if(!$uploadEdildi) { echo "Dosya upload edilemedi..."; exit(); }
echo "Dosya images klasörüne upload edildi.";
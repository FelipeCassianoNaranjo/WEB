<?php
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

//$ip = '77.111.246.46';
$ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
$ipInfo = json_decode($ipInfo);

$timezone = $ipInfo->timezone ?? "UTC";
$dt = new DateTime("now", new DateTimeZone($timezone));

$country = $ipInfo->country ?? "N/A";
$city = $ipInfo->city ?? "N/A";

echo 'Endereço IP: ' . $ip . '<br>';
echo 'Data: ' . $dt->format('d/m/Y') . '<br>';
echo 'Hora: ' . $dt->format('H:i:s') . '<br>';
echo 'País: ' . $country . '<br>';
echo 'Cidade: ' . $city . '<br>';
?>
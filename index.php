<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>

  <h1>I Found You</h1>
</body>

</html>

<?php


function get_client_ip()
{
  if (isset($_SERVER['HTTP_CLIENT_IP'])) {
    return $_SERVER['HTTP_CLIENT_IP'];
  } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    return $_SERVER['HTTP_X_FORWARDED_FOR'];
  } elseif (isset($_SERVER['HTTP_X_FORWARDED'])) {
    return $_SERVER['HTTP_X_FORWARDED'];
  } elseif (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
    return $_SERVER['HTTP_FORWARDED_FOR'];
  } elseif (isset($_SERVER['HTTP_FORWARDED'])) {
    return $_SERVER['HTTP_FORWARDED'];
  } elseif (isset($_SERVER['REMOTE_ADDR'])) {
    return $_SERVER['REMOTE_ADDR'];
  } else {
    return 'ip tidak ditemukan';
  };
};

$ip = get_client_ip();

$api_url = "http://ip-api.com/json/${ip}";
$response = file_get_contents($api_url);

$data = json_decode($response, true);

if ($data && $data['status'] === 'success') {
  echo "IP Address : " . $data['query'] . "<br />";
  echo "Negara : "
    . $data['country'] . "<br />";
  echo "Wilayah: " . $data['regionName'] . "<br />";
  echo "Kota : " . $data['city'] . "<br />";
  echo "Kode Pos : " . $data['zip'] .
    "<br />";
  echo "Latitudo : " . $data['lat'] . "<br />";
  echo "Longitudo : " .
    $data['lon'] . "<br />";
  echo "ISP : " . $data['isp'] . "<br />";
} else {
  echo
  "Data Tidak Ditemukan";
} ?>
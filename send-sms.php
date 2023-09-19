<?php
// Add http header to send sms with token


$url = "https://api.engagespark.com/v1/sms/phonenumber";

$headers = array(
   "Content-Type: application/json",
   "Authorization: Token f16883a83b739fc11ad0ff4620328d283691a0f9"
);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$data = <<<DATA
{
    "orgId": 15670,
    "to": "639707060100",
    "from": "Nexus Link",
    "message": "Sample message to you."
}
DATA;

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

$resp = curl_exec($curl);
curl_close($curl);

echo $resp;
?>
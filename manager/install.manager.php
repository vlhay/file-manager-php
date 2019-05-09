<?php


$fileUrl = 'https://raw.githubusercontent.com/PMTpro/manager/develop/manager/manager.zip';
$saveTo = 'manager.zip';
 $path = 'manager';

$userAgent = $_SERVER['HTTP_USER_AGENT'];
$fp = fopen($saveTo, "w+");
 
if ($fp === false) {
    echo 'Lỗi';
    exit;
}
 
$ch = curl_init($fileUrl);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 100);
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_exec($ch);
 
if (curl_errno($ch)) {
    echo 'Lỗi';
    exit;
}
 
curl_close($ch);
fclose($fp);

$zip = new ZipArchive; 

$zip->open($saveTo); 
$zip->extractTo($path); 
$zip->close(); 

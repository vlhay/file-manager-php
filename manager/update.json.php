<?php

$data = array(
    'count' => '5',
    'version' => '1.0',
    'link' => 'https://raw.githubusercontent.com/PMTpro/manager/develop/manager/manager.zip'
);

header("Content-type: application/json; charset=utf-8");

echo json_encode($data);

exit();

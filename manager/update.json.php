<?php

$data = array(
    'count' => '1154',
    'version' => '1.15.24',
    'link' => 'http://localhost:8000/manager.zip'
);

header("Content-type: application/json; charset=utf-8");
echo json_encode($data);
exit();

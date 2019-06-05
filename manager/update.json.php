<?php

$data = array(
    'count' => '4',
    'version' => '1.0',
    'link' => 'http://localhost:8000/manager.zip'
);

header("Content-type: application/json; charset=utf-8");
echo json_encode($data);
exit();

<?php

$data = array(
    'count' => '6',
    'version' => '1.0',
    'link' => 'https://raw.githubusercontent.com/pmtpro/php-manager/develop/manager/manager.zip'
);

file_put_contents('update.json', json_encode($data));

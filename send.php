<?php

const TOKEN = '5722929443:AAEfUvl5lXHiPqe8iVYcvp54bLBRfSJXTns';

$url = 'https://api.telegram.org/bot' . TOKEN . '/sendMessage';


$params = [
    'chat_id' => 1252510650,
    'text' => 'Я - Бот!'
];
$url = $url . '?' . http_build_query($params);


$response =json_decode(file_get_contents($url),
    JSON_OBJECT_AS_ARRAY
);

if ($response['ok']){
    foreach ($response['result'] as $update){
        echo $update['message']['text'];
        ?><br><?php
    }
}

?><br><?php
var_dump($response);
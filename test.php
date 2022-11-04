<?php

const TOKEN = '5722929443:AAEfUvl5lXHiPqe8iVYcvp54bLBRfSJXTns';
const BASE_URL = 'https://api.telegram.org/bot' . TOKEN . '/';

function sendRequest($method, $params = []){
    if (!empty($params)){
        $url = BASE_URL . $method . '?' . http_build_query($params);
    }else {
        $url = BASE_URL . $method;

    }
    return json_decode(file_get_contents($url),
        JSON_OBJECT_AS_ARRAY
    );
}

$updates = sendRequest('getUpdates');

$today = date("F j, Y, g:i a",strtotime('+ 3 hour'));

foreach ($updates['result'] as $update){
    $chat_id = $update['message']['chat']['id'];
    sendRequest('sendMessage', ['chat_id' => $chat_id, 'text' =>"Привет ты ". $today]);
}

//var_dump(sendRequest('sendMessage', ['chat_id' => 1252510650, 'text' => 'Проба']));
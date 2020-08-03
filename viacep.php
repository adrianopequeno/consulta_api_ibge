<?php

//    $cep = '58701120';
//
//    $url = 'https://viacep.com.br/ws/'.$cep.'/json/';
//
//    $result = json_decode($url);
//
//    $ch = curl_init($url);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//    $resultado = json_decode(curl_exec($ch));
//
//    var_dump($resultado);


    $url = 'https://br-cidade-estado-nodejs.glitch.me/estados/';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $resultado = json_decode(curl_exec($ch));

    $res[] = $resultado;


    echo $resultado['id'];



//    $url = 'http://educacao.dadosabertosbr.com/api/cidades/pb';
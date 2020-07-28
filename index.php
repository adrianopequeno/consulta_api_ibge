<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consumindo API IBGE</title>
</head>
<body>
    <?php
        $url = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $resultado = json_decode(curl_exec($ch));

//        var_dump($resultado);

//        foreach ($resultado as $estados ) {
//            echo 'Estado: '.$estados->nome.'<br/>';
//        }
    ?>

    <form action="" method="post">
        <label>Estados do Brasil</label>
        <select name="estado">
            <?php foreach ($resultado as $estados ): ?>
                <option value="<?=$estados->sigla;?>"><?=$estados->nome;?></option>
            <?php endforeach;?>
        </select>

        <button type="submit">Enviar</button>
    </form>


    <hr>

    <h1>Select selecionado</h1>

    <?php
        $estado = filter_input(INPUT_POST, 'estado');
        echo "<h4>".$estado."</h4>";


        $urlCity = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/'.$estado.'/municipios';
        $city = curl_init($urlCity);
        curl_setopt($city, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($city, CURLOPT_SSL_VERIFYPEER, false);
        $result = json_decode(curl_exec($city));

//        var_dump($result);
    ?>

    <hr>

    <form action="" method="post">
        <label>Cidades do Estado <?=$estado?></label>
        <select name="city">
            <?php foreach ($result as $city ): ?>
                <option value="<?=$city->id;?>"><?=$city->nome;?></option>
            <?php endforeach;?>
        </select>

<!--        <button type="submit">Enviar</button>-->
    </form>

    <hr>

</body>
</html>
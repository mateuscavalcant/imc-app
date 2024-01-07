<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular IMC</title>
</head>
<body>
    <h1>Calcular IMC</h1>
    <form action="" method="post">
        <label for="altura_usuario">Digite a sua altura (em metros)</label>
        <input name="altura_usuario" id="altura_usuario" type="text" required/>
        
        <label for="peso_usuario">Digite o seu peso (em quilogramas)</label>
        <input name="peso_usuario" id="peso_usuario" type="text" required/>
        
        <button type="submit">Calcular</button>
    </form>

    <?php

// Função para classificar o IMC em uma faixa
function classificarIMC($imc) {
    $faixas = array(
        array('faixa' => 'Magreza', 'min' => 0, 'max' => 18.5),
        array('faixa' => 'Saudável', 'min' => 18.51, 'max' => 24.9),
        array('faixa' => 'Sobrepeso', 'min' => 25.0, 'max' => 29.9),
        array('faixa' => 'Obesidade Grau I', 'min' => 30.0, 'max' => 34.9),
        array('faixa' => 'Obesidade Grau II', 'min' => 35.0, 'max' => 39.9),
        array('faixa' => 'Obesidade Grau III', 'min' => 40, 'max' => PHP_FLOAT_MAX)
    );

    foreach ($faixas as $faixa) {
        if ($imc >= $faixa['min'] && $imc <= $faixa['max']) {
            return "Seu IMC é $imc, você está classificado como {$faixa['faixa']}";
        }
    }

    return "Seu IMC é $imc, você está classificado como Desconhecido";
}

// Verifica se os dados do formulário foram enviados
if (isset($_POST['altura_usuario']) && isset($_POST['peso_usuario'])) {
    $altura = floatval($_POST['altura_usuario']);
    $peso = floatval($_POST['peso_usuario']);

    if ($altura > 0 && $peso > 0) {
        $imc = $peso / ($altura * $altura);
        $imc = number_format($imc, 2);
        $resultado = classificarIMC($imc);
        echo $resultado;
    } else {
        echo "Valores inválidos de altura ou peso.";
    }
}

?>
</body>
</html>
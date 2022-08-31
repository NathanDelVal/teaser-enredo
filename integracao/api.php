<?php
header('Content-Type: application/json; charset=utf-8');

require 'pacotesIntegracoes/includeIntegracoes.php';

/* Importa todas as Configurações das integrações Registradas */
foreach ($integracoes as $integracao){
    $varName = $integracao . 'Configuracoes';
    $$varName = require 'pacotesIntegracoes/' . $integracao . '/configuracoes/configuracoes.php';
}

/**
 * {
    "formName": "contato",
    "name": "teste",
    "email": "teste",
    "phone": "teste",
    "message": "teste",
    "termos": "teste",
    "utm_source": "teste",
    "utm_medium": "teste",
    "utm_campaign": "teste"
    }
 */

$jsonData = json_decode(file_get_contents('php://input'), true);


if (!in_array($jsonData['formName'], $formConfiguracoes)) {
    echo json_encode([
        'status' => false,
        'message' => 'Formulario não cadastrado no sistema!'
    ]);
    exit;
}





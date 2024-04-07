<?php

require 'vendor/autoload.php';

use OpenAI\Api\ApiClient;
use OpenAI\Api\Endpoints\Completions;

// Configura la conexión a la API de OpenAI
$apiKey = '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'; // Reemplaza 'tu_clave_de_api' con tu clave de API de OpenAI
$client = new ApiClient($apiKey);
$completions = new Completions($client);

// Función para generar descripciones de programas simuladas
function generateProgramDescription($completions) {
    $prompt = "Generar una descripción para un nuevo programa.";
    $response = $completions->create($prompt);
    return $response['choices'][0]['text'];
}

// Función para generar nombres de empresas simulados
function generateCompanyName($completions) {
    $prompt = "Generar un nombre para una nueva empresa.";
    $response = $completions->create($prompt);
    return $response['choices'][0]['text'];
}

// Función para generar fechas simuladas
function generateRandomDate($start_date, $end_date) {
    // Genera una fecha aleatoria entre $start_date y $end_date
    return date("Y-m-d", mt_rand(strtotime($start_date), strtotime($end_date)));
}

// Función para generar datos simulados y llenar las tablas
function fillTables($completions) {
    // Generar datos simulados
    $programDescription = generateProgramDescription($completions);
    $companyName = generateCompanyName($completions);
    $startDate = '2024-01-01';
    $endDate = '2024-12-31';

    // Aquí puedes insertar los datos generados en tus tablas
    // Por ejemplo, insertar la descripción del programa en la tabla 'programs'
    // y el nombre de la empresa en la tabla 'companies'

    echo "Descripción del programa: $programDescription\n";
    echo "Nombre de la empresa: $companyName\n";
}

// Llamar a la función para llenar las tablas
fillTables($completions);

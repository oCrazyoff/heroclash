<?php
// Função para carregar variáveis do .env
function carregarEnv($caminho)
{
    if (!file_exists($caminho)) {
        throw new Exception("Arquivo .env não encontrado em: " . $caminho);
    }

    $linhas = file($caminho, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($linhas as $linha) {
        // Ignorar comentários
        if (strpos(trim($linha), '#') === 0) {
            continue;
        }

        // Separar chave e valor
        list($chave, $valor) = explode('=', $linha, 2);

        $chave = trim($chave);
        $valor = trim($valor, " \"'"); // já remove espaços e aspas

        // Salvar no ambiente
        putenv("$chave=$valor");
        $_ENV[$chave] = $valor;
    }
}

// função para definir o BASE_URL
if (!defined('BASE_URL')) {
    if ($_SERVER['HTTP_HOST'] == 'localhost') {
        define('BASE_URL', '/ecoflow/');
    } else {
        define('BASE_URL', '/');
    }
}

function gerarCSRF()
{
    $_SESSION["csrf"] = (isset($_SESSION["csrf"])) ? $_SESSION["csrf"] : hash('sha256', random_bytes(32));

    return ($_SESSION["csrf"]);
}

function validarCSRF($csrf)
{
    if (!isset($_SESSION["csrf"])) {
        return (false);
    }
    if ($_SESSION["csrf"] !== $csrf) {
        return false;
    }
    if (!hash_equals($_SESSION["csrf"], $csrf)) {
        return false;
    }

    return true;
}

function formatarReais(float $valor): string
{
    return 'R$ ' . number_format($valor, 2, ',', '.');
}

function formatarData(string $data): string
{
    $timestamp = strtotime($data);
    return date('d/m/Y', $timestamp); // Ex: 08/10/2025
}

function validarValor($valor)
{
    // Se tiver vírgula, assume formato brasileiro
    if (strpos($valor, ',') !== false) {
        // Remove separador de milhar
        $valor = str_replace('.', '', $valor);
        // Substitui vírgula decimal por ponto
        $valor = str_replace(',', '.', $valor);
    }
    // Caso contrário, assume formato americano (ponto como decimal)

    // Verifica se é um número válido
    if (!is_numeric($valor)) {
        return false;
    }

    return (float)$valor;
}
<?php
session_start();
require_once "funcoes_auth.php";
require_once "backend/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim(strip_tags($_POST['email']));
    $senha = trim($_POST["senha"]);

    // Verificar o email
    if (validarEmail($email) == false) {
        $_SESSION['resposta'] = "Email inválido!";
        header("Location: " . BASE_URL);
        exit;
    }

    // Verificar token CSRF
    $csrf = trim(strip_tags($_POST["csrf"]));
    if (validarCSRF($csrf) == false) {
        $_SESSION['resposta'] = "Método inválido!";
        header("Location: " . BASE_URL);
        exit;
    }

    // Validar senha
    if (validarSenha($senha) == false) {
        $_SESSION['resposta'] = "Senha inválida!";
        header("Location: " . BASE_URL);
        exit;
    }

    if (!empty($email) && !empty($senha)) {
        try {
            $stmt = $conexao->prepare("SELECT id, nome, email, senha_hash, cargo FROM usuarios WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($id, $nome, $email, $senha_db, $cargo);

            $usuarioEncontrado = $stmt->fetch();
            $stmt->close();

            if (!$usuarioEncontrado) {
                $_SESSION['resposta'] = "E-mail ou senha incorretos!";
                header("Location: " . BASE_URL);
                exit;
            }

            // Verifica se a senha está correta
            if (password_verify($senha, $senha_db)) {
                // Atualiza as variáveis de sessão
                $_SESSION["id"] = $id;
                $_SESSION["nome"] = $nome;
                $_SESSION["email"] = $email;
                $_SESSION["cargo"] = $cargo;

                $_SESSION['resposta'] = "Bem-vindo! " . $_SESSION['nome'];

                if ($cargo == 1) {
                    // Caso o usuário seja admin
                    header("Location: " . BASE_URL . "dashboard");
                    exit;
                } else {
                    // Caso seja comum
                    header("Location: " . BASE_URL . "cartas");
                    exit;
                }
            } else {
                $_SESSION['resposta'] = "E-mail ou senha incorretos!";
                header("Location: " . BASE_URL);
                exit;
            }
        } catch (Exception $erro) {
            // Caso houver erro ele retorna
            switch ($erro->getCode()) {
                // Erro de quantidade de parâmetros
                case 1136:
                    $_SESSION['resposta'] = "Quantidade de dados inseridos inválida!";
                    header("Location: " . BASE_URL);
                    exit;
                default:
                    $_SESSION['resposta'] = "Erro inesperado. Tente novamente.";
                    header("Location: " . BASE_URL);
                    exit;
            }
        }
    } else {
        $_SESSION['resposta'] = "Preencha todas as informações!";
        header("Location: " . BASE_URL);
        exit;
    }
} else {
    $_SESSION['resposta'] = "Variável POST inválida!";
    header("Location: " . BASE_URL);
    exit;
}
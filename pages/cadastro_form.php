<?php
$n_valida = true;
require_once "includes/inicio.php"
?>
<main>
    <div class="container-form-index">
        <form action="fazer_cadastro" method="POST">
            <!--csrf-->
            <input type="hidden" name="csrf" id="csrf" value="<?= gerarCSRF() ?>">
            <h1 class="logo">Hero Clash</h1>
            <h2>Cadastre-se</h2>
            <div class="input-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" placeholder="Digite seu nome">
            </div>
            <div class="input-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="Digite seu e-mail">
            </div>
            <div class="input-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
            </div>
            <div class="input-group">
                <label for="confirma-senha">Confirme sua senha</label>
                <input type="password" name="confirma-senha" id="confirma-senha"
                    placeholder="Digite sua senha novamente">
            </div>
            <button>Cadastrar</button>
            <p>Já tem uma conta? <a href="<?= BASE_URL ?>">Login</a></p>
        </form>
    </div>
</main>
<?php require_once "includes/fim.php" ?>
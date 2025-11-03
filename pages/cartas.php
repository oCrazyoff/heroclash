<?php
require_once "includes/inicio.php"
?>
<main>
    <h2 class="titulo">Minha Coleção<h2>
            <div class="container-cartas">
                <?php
                // puxando todas as cartas do usuario
                $sql = "SELECT * FROM usuario_colecao_cartas WHERE usuario_id = ?";
                $stmt = $conexao->prepare($sql);
                $stmt->bind_param("i", $_SESSION['id']);
                $stmt->execute();
                $colecao = $stmt->get_result();
                $stmt->close();

                if ($colecao->num_rows > 0):
                    while ($carta = $colecao->fetch_assoc()):
                        $sql_carta = "SELECT nome, descricao, caminho_arte, custo_mana, tipo_id, raridade_id FROM cartas WHERE id = ?";
                        $stmt_carta = $conexao->prepare($sql_carta);
                        $stmt_carta->bind_param("i", $carta['carta_id']);
                        $stmt_carta->execute();
                        $stmt_carta->bind_result($nome_carta, $descricao_carta, $arte_carta, $custo_mana_carta, $tipo_carta_id, $raridade_carta_id);
                        $stmt_carta->fetch();
                        $stmt_carta->close();
                ?>
                        <div class="carta">
                            <img src="<?= htmlspecialchars($arte_carta) ?>"
                                alt="Imagem da carta <?= htmlspecialchars($nome_carta) ?>">
                            <div class="txt-carta">
                                <h3><?= htmlspecialchars($nome_carta) ?></h3>
                                <p><?= htmlspecialchars($descricao_carta) ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <h3>Você não tem cartas</h3>
                <?php endif; ?>
            </div>
</main>
<?php require_once "includes/fim.php" ?>
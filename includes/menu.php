<div class="menu">
    <h1 class="logo">Hero Clash</h1>
    <nav>
        <a href="<?= BASE_URL . "cartas" ?>"><i class="bi bi-layers"></i> Cartas</a>
        <a href="<?= BASE_URL . "aventura" ?>"><i class="bi bi-map"></i> Aventura</a>
        <a href="<?= BASE_URL . "loja" ?>"><i class="bi bi-shop"></i> Loja</a>
    </nav>
    <div class="info-player">
        <p class="ouro">
            <i class="bi bi-coin"></i> <span><?= htmlspecialchars($_SESSION['ouro']) ?></span>
        </p>
        <p class="mana">
            <i class="bi bi-droplet-fill"></i>
            <span><?= htmlspecialchars($_SESSION['mana_atual']) ?>/<?= htmlspecialchars($_SESSION['mana_maxima']) ?></span>
        </p>
    </div>
</div>
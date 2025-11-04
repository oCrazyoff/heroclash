<?php
require_once "includes/inicio.php";
?>
<main>
    <h2 class="titulo">Mapa da Aventura</h2>
    <div class="container-mapa">
        <img src="https://http2.mlstatic.com/D_NQ_NP_676073-MLB53012308309_122022-O.webp" alt="Mapa das aventuras">
        <a href="#" class="fase1">
            <i class="bi bi-x"></i>
        </a>
        <a href="#" class="fase2">
            <i class="bi bi-x"></i>
        </a>
        <a href="#" class="fase3">
            <i class="bi bi-x"></i>
        </a>
        <a href="#" class="fase4">
            <i class="bi bi-x"></i>
        </a>
        <a href="#" class="fase5">
            <i class="bi bi-x"></i>
        </a>
    </div>
</main>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const container = document.querySelector(".container-mapa");
        const fases = Array.from(container.querySelectorAll("a"));
        const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");

        svg.setAttribute("class", "absolute top-0 left-0 w-full h-full pointer-events-none");
        container.prepend(svg);

        for (let i = 0; i < fases.length - 1; i++) {
            const p1 = fases[i].getBoundingClientRect();
            const p2 = fases[i + 1].getBoundingClientRect();
            const c = container.getBoundingClientRect();

            const line = document.createElementNS("http://www.w3.org/2000/svg", "line");
            line.setAttribute("x1", p1.left - c.left + p1.width / 2);
            line.setAttribute("y1", p1.top - c.top + p1.height / 2);
            line.setAttribute("x2", p2.left - c.left + p2.width / 2);
            line.setAttribute("y2", p2.top - c.top + p2.height / 2);
            line.setAttribute("stroke", "yellow");
            line.setAttribute("stroke-width", "3");

            svg.appendChild(line);
        }
    });
</script>
<?php require_once "includes/fim.php" ?>
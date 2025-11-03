-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2025 at 12:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heroclash`
--

-- --------------------------------------------------------

--
-- Table structure for table `cartas`
--

CREATE TABLE `cartas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `caminho_arte` varchar(255) DEFAULT NULL,
  `custo_mana` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL,
  `raridade_id` int(11) NOT NULL,
  `acao_id` int(11) NOT NULL,
  `acao_valor` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cartas`
--

INSERT INTO `cartas` (`id`, `nome`, `descricao`, `caminho_arte`, `custo_mana`, `tipo_id`, `raridade_id`, `acao_id`, `acao_valor`) VALUES
(1, 'Golpe Rápido', 'Um ataque veloz que causa 10 de dano.', 'https://www.tutkit.com/storage/media/help/12851/zwei-muay-thai-kaempfer-tauschen-schnelle-schlaege-und-kicks-aus-ausmalbild-kostenlos.jpg', 10, 0, 0, 0, 10),
(2, 'Bola de Fogo', 'Causa 40 de dano mágico ao inimigo.', 'https://static.vecteezy.com/ti/vetor-gratis/p1/2694852-icone-de-bola-de-fogo-caindo-gratis-vetor.jpg', 30, 1, 1, 0, 40),
(3, 'Curativo Leve', 'Recupera 25 de vida.', 'https://thumbs.dreamstime.com/b/%C3%ADcone-de-curativo-no-estilo-c%C3%B4mico-ilustra%C3%A7%C3%A3o-do-vetor-desenho-animado-gesso-em-fundo-branco-isolado-efeito-inicial-kit-260045644.jpg', 20, 2, 0, 1, 25),
(4, 'Poção de Mana', 'Recupera 20 de mana.', 'https://png.pngtree.com/png-vector/20240413/ourlarge/pngtree-a-blue-potion-bottle-with-wooden-lid-perfect-for-concocting-magical-png-image_12282809.png', 5, 2, 1, 2, 20),
(5, 'Fúria do Bárbaro', 'Aumenta seu ataque base em 15.', 'https://static.wikia.nocookie.net/tsrd/images/d/d7/Barbaro.jpg/revision/latest?cb=20160630201653&path-prefix=pt-br', 40, 2, 2, 4, 15),
(6, 'Pele de Pedra', 'Reforça sua defesa, reduzindo o dano recebido.', 'https://fbi.cults3d.com/uploaders/40846037/illustration-file/ca35a7b6-961e-453d-b28a-edfbb61b0a3f/image_6716.png', 25, 2, 1, 3, 10),
(7, 'Ira do Dragão', 'Causa 120 de dano devastador.', 'https://png.pngtree.com/thumb_back/fh260/background/20240805/pngtree-a-brave-knight-in-shining-armor-battles-fearsome-golden-dragon-rocky-image_16123998.jpg', 80, 1, 2, 0, 120);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha_hash` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL DEFAULT 0,
  `ouro` int(11) NOT NULL DEFAULT 1000,
  `mana_atual` int(11) NOT NULL DEFAULT 100,
  `mana_maxima` int(11) NOT NULL DEFAULT 100,
  `fase_atual_id` int(11) NOT NULL DEFAULT 1,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha_hash`, `cargo`, `ouro`, `mana_atual`, `mana_maxima`, `fase_atual_id`, `criado_em`) VALUES
(1, 'Walysson', 'adm@adm.com', '$2y$10$fCkHeI8gJjSvlNO1g6wteegQzFZvhprEIOiAP7oF7UjlQb.6qtshy', 0, 1000, 100, 100, 1, '2025-11-03 21:48:54');

-- --------------------------------------------------------

--
-- Table structure for table `usuario_colecao_cartas`
--

CREATE TABLE `usuario_colecao_cartas` (
  `usuario_id` int(11) NOT NULL,
  `carta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario_colecao_cartas`
--

INSERT INTO `usuario_colecao_cartas` (`usuario_id`, `carta_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cartas`
--
ALTER TABLE `cartas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `usuario_colecao_cartas`
--
ALTER TABLE `usuario_colecao_cartas`
  ADD PRIMARY KEY (`usuario_id`,`carta_id`),
  ADD KEY `carta_id` (`carta_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cartas`
--
ALTER TABLE `cartas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usuario_colecao_cartas`
--
ALTER TABLE `usuario_colecao_cartas`
  ADD CONSTRAINT `usuario_colecao_cartas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `usuario_colecao_cartas_ibfk_2` FOREIGN KEY (`carta_id`) REFERENCES `cartas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

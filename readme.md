# 🎮 Hero Clash

Um RPG de navegador com temática medieval-fantasia mágica, focado em coleção de cartas, progressão PvE e uma estética heroica.

> **Nota do Repositório:** Este projeto é baseado em um *Game Design Document* (GDD) detalhado, focado na criação de um mockup funcional ou protótipo das principais telas e sistemas do jogo.

---

## 📜 Conceito Geral

**Hero Clash** é um RPG de navegador com uma estética épica e heroica. A paleta de cores foca em tons escuros (preto, cinza, azul profundo) com detalhes vibrantes (dourado, vermelho e roxos mágicos), inspirado em jogos como *Hearthstone* e *Raid: Shadow Legends*, mas com uma interface otimizada para ser leve e limpa no navegador.

### 🎨 Identidade Visual
* **Fontes Heroicas:** (ex: Cinzel Decorative, MedievalSharp)
* **Cores Principais:** Preto, Dourado, Azul Profundo, Roxo.
* **Texturas:** Pedra esculpida, pergaminho antigo, metal envelhecido.
* **Interface:** Ícones com brilho, transições suaves e hierarquia de informação clara.

---

##  core Telas Principais

O jogo é estruturado em três telas principais, conectadas por uma barra de navegação superior fixa.

### 🧭 Navegação Superior (Fixa)

Visível em todas as telas, esta barra tem aparência de pedra esculpida com detalhes dourados e contém:
* **Logo:** "Hero Clash" (Tipografia dourada metálica).
* **Recursos:**
    * 💰 **Ouro:** Quantidade atual.
    * 🔷 **Mana:** Nível atual.
    * 🗝️ **Chaves:** Contagem de chaves possuídas (por tipo).
* **Botões de Navegação:** Cartas, Aventura, Loja.

---

### 🃏 Tela 1: Cartas / Deck

* **Fundo:** Um salão arcano com runas brilhantes e tochas flutuantes.
* **Função:** Exibe todas as cartas do jogador em uma grade, organizadas por tipo e raridade.

**Propriedades da Carta:**
* Nome e Arte Ilustrada
* Tipo (🗡️ Ataque, 🔮 Magia, 🛡️ Assistência)
* Raridade (Borda da carta)
* Custo de Mana
* Descrição do Efeito (ex: "Causa 25 de dano mágico")

**Raridade das Cartas:**
| Raridade | Cor da Borda |
| :--- | :--- |
| Comum | Cinza |
| Rara | Azul |
| Épica | Roxa |
| Lendária | Dourada (com brilho) |

**Painel "Deck Ativo":**
* Mostra as 5 cartas selecionadas para a batalha.
* Exibe o custo total de mana do deck.
* Botão "Salvar Deck para Batalha".

---

### 🗺️ Tela 2: Aventura (Mapa PvE)

* **Fundo:** Um pergaminho antigo com florestas, montanhas e ruínas.
* **Função:** Substitui uma lista de inimigos por um mapa interativo com 10 pontos (fases).

**Progressão:**
1.  O mapa exibe um caminho linear conectando 10 fases (ex: Goblin, Esqueleto... Lorde Elarion).
2.  Apenas a próxima fase desbloqueada é clicável; as demais ficam acinzentadas/bloqueadas.
3.  Ao clicar, um pop-up mostra:
    * Retrato e Nome do Inimigo.
    * Recompensas Possíveis (Ouro, chance de Carta).
    * Botão "Lutar".

**Combate (Simulado):**
* O jogador utiliza o "Deck Ativo" salvo.
* Barras de Vida e Mana são exibidas.
* Ao vencer, um painel exibe "Vitória!", o ouro recebido e informações sobre cartas ganhas.
    > "🎴 Ganhou uma nova carta!" ou "Carta repetida convertida em +ouro."

---

### 🏪 Tela 3: Loja (Baús e Chaves)

* **Fundo:** Interior de uma forja ou mercado medieval com baús empilhados.
* **Função:** Dividida em duas seções para aquisição de itens.

**Seção 1: Compra de Chaves**
O jogador pode comprar chaves usando Ouro.

| Chave | Cor | Custo (Ouro) | Utilidade |
| :--- | :--- | :--- | :--- |
| 🟤 Comum | Marrom | 1000 | Abrir Baú Comum |
| 🔵 Rara | Azul | 3000 | Abrir Baú Raro |
| 🟣 Épica | Roxa | 8000 | Abrir Baú Épico |
| 🟡 Lendária | Dourada | 15000 | Abrir Baú Lendário |

**Seção 2: Baús**
* Exibe os baús correspondentes (Comum, Raro, Épico, Lendário).
* Requer a chave correspondente para abrir.
* Ao abrir, o baú revela 3 cartas.
* Efeitos visuais de luz mágica são exibidos.
    > "Carta duplicada convertida em +ouro."

---

## 🛠️ Tecnologias Utilizadas (A definir)

* **Frontend:** `[HTML, CSS, JavaScript]` (Adicionar frameworks/libs, ex: React, Vue, Svelte)
* **Backend:** `[A definir]` (Ex: PHP, Node.js, Python)
* **Banco de Dados:** `[A definir]` (Ex: MySQL, PostgreSQL, MongoDB)

---

## 🚀 Como Executar o Projeto (Exemplo)

1.  Clone o repositório:
    ```bash
    git clone [https://github.com/](https://github.com/)[seu-usuario]/[seu-repositorio].git
    ```
2.  Navegue até o diretório:
    ```bash
    cd [seu-repositorio]
    ```
3.  Instale as dependências:
    ```bash
    npm install
    ```
4.  Inicie o projeto:
    ```bash
    npm run dev
    ```

---

## 👤 Autor

**Walysson Ribeiro**

© 2025 Hero Clash
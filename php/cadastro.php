<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styles.css" />
    <title>Cadastro de Checklist</title>
    <style>
      

        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <h1>Cadastrar Checklist</h1>
        </div>
        <!-- Botão para abrir o modal -->
        <button id="openModalBtn">Cadastrar Checklist</button>

        <!-- Modal para o Cadastro -->
        <div id="checklistModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeModal">&times;</span>
                <h2>Cadastro de Checklist</h2>
                <form id="checklistForm" action="../../services/create_check.php" method="POST">
                    <!-- Question 1 -->
                    <div id="question1">
                        <label for="veiculo">Veículo</label>
                        <input type="text" name="veiculo" id="veiculo" placeholder="Veículo" required />
                        <button type="button" onclick="nextQuestion(1)">Próximo</button>
                    </div>
                    <!-- Question 2 -->
                    <div id="question2" class="hidden">
                        <label for="km">KM</label>
                        <input type="text" name="km" id="km" placeholder="KM" required />
                        <button type="button" onclick="nextQuestion(2)">Próximo</button>
                    </div>
                    <!-- Question 3 -->
                    <div id="question3" class="hidden">
                        <label for="diesel">Diesel</label>
                        <input type="text" name="diesel" id="diesel" placeholder="Diesel" required />
                        <button type="button" onclick="nextQuestion(3)">Próximo</button>
                    </div>
                    <!-- Question 4 -->
                    <div id="question4" class="hidden">
                        <label for="oleo">Óleo</label>
                        <input type="text" name="oleo" id="oleo" placeholder="Óleo" required />
                        <button type="button" onclick="nextQuestion(4)">Próximo</button>
                    </div>
                    <!-- Question 5 -->
                    <div id="question5" class="hidden">
                        <label for="catraca">Catraca</label>
                        <input type="text" name="catraca" id="catraca" placeholder="Catraca" required />
                        <button type="button" onclick="nextQuestion(5)">Próximo</button>
                    </div>
                    <!-- Question 6 -->
                    <div id="question6" class="hidden">
                        <label for="aditivo">Aditivo</label>
                        <input type="text" name="aditivo" id="aditivo" placeholder="Aditivo" required />
                        <button type="button" onclick="nextQuestion(6)">Próximo</button>
                    </div>
                    <!-- Question 7 -->
                    <div id="question7" class="hidden">
                        <label for="motorista">Motorista</label>
                        <input type="text" name="motorista" id="motorista" placeholder="Motorista" required />
                        <button type="submit">Cadastrar</button>
                    </div>
                    <input type="hidden" name="id_user" value="<?php echo isset($_SESSION['user_id']) ? htmlspecialchars($_SESSION['user_id']) : ''; ?>" />
                </form>
            </div>
        </div>

        <br>
        <a href="/coletivosTeste/src/view/home/home.php" class="back-button">Voltar para Home</a>
    </div>

    <script>
        // Funções para abrir e fechar o modal
        function openModal() {
            document.getElementById('checklistModal').style.display = "block";
        }

        function closeModal() {
            document.getElementById('checklistModal').style.display = "none";
        }

        // Função para exibir a próxima pergunta
        function nextQuestion(currentQuestion) {
            var current = document.getElementById('question' + currentQuestion);
            var next = document.getElementById('question' + (currentQuestion + 1));
            if (next) {
                current.classList.add('hidden');
                next.classList.remove('hidden');
            }
        }

        // Ações para os botões e modais
        document.getElementById("openModalBtn").onclick = function() {
            openModal();
        };
        document.getElementById("closeModal").onclick = function() {
            closeModal();
        };

        // Fechar o modal se o usuário clicar fora do modal
        window.onclick = function(event) {
            if (event.target == document.getElementById('checklistModal')) {
                closeModal();
            }
        };
    </script>
</body>
</html>

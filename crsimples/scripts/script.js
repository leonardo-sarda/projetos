function generateReport() {
  const questions = [
    "Qual é o seu nome?",
    "Qual é o seu e-mail?",
    "Qual é a sua idade?",
  ];
  let reportContent = "<ul>";

  questions.forEach((question, index) => {
    const answer = localStorage.getItem("answer" + index) || "Não respondido";
    reportContent += `<li><strong>${question}</strong>: ${answer}</li>`;
  });

  reportContent += "</ul>";
  document.getElementById("report-content").innerHTML = reportContent;
}

// Gera o relatório ao carregar a página
window.onload = generateReport;

const questions = [
  {
    question: "Informe o Veículo?",
    type: "radio",
    options: [
      { value: "A", label: "Veículo A" },
      { value: "B", label: "Veículo B" },
    ],
  },
  { question: "Informe KM", type: "text" },
  { question: "Diesel", type: "text" },
  { question: "Óleo", type: "text" },
  { question: "Catraca", type: "text" },
  { question: "ADITIVO", type: "text" },
  { question: "MOTORISTA", type: "text" },
];
let currentQuestionIndex = 0;

function startRegister() {
  document.getElementById("modal").style.display = "block";
  showQuestion();
}

function showQuestion() {
  const question = questions[currentQuestionIndex];
  let html = `<p>${question.question}</p>`;

  if (question.type === "radio") {
    question.options.forEach((option) => {
      html += `
                    <label>
                        <input type="radio" name="answer" value="${option.value}">
                        ${option.label}
                    </label><br>
                `;
    });
  } else {
    html += `<input type="text" id="answer" placeholder="Digite sua resposta" />`;
  }

  document.getElementById("modal-body").innerHTML = html;
  document.getElementById("answer")?.focus();
}

function nextQuestion() {
  const answer = document.getElementById("answer").value;
  if (answer.trim() === "") {
    alert("Por favor, responda a pergunta.");
    return;
  }

  // Armazena a resposta no localStorage
  localStorage.setItem("answer" + currentQuestionIndex, answer);
  currentQuestionIndex++;

  if (currentQuestionIndex < questions.length) {
    // Atualiza o índice da pergunta no localStorage
    localStorage.setItem("currentQuestionIndex", currentQuestionIndex);
    showQuestion();
  } else {
    alert("Cadastro completo!");
    closeModal();
  }
}

function closeModal() {
  document.getElementById("modal").style.display = "none";
  // Limpa o índice da pergunta quando o modal é fechado
  localStorage.removeItem("currentQuestionIndex");
}

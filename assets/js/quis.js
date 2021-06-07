const quizData = [
    {
        
        question: "Apa gejala yang dirasakan dari COVID-19, kecuali?",
        a: "Demam (suhu tubuh di atas 38 derajat Celsius)",
        b: "Batuk kering",
        c: "Sesak napas",
        d: "Cedera kaki",
        correct: "d",
    },
    {
        question: "Bagaimana cara penularan virus COVID19?",
        a: "Cipatran air liur",
        b: "udara",
        c: "tatapan",
        d: "suara",
        correct: "a",
    },
    {
        question: "Kalangan yang rentan untuk terkena COVID19?",
        a: "Bayi dan orangtua",
        b: "Anak muda",
        c: "Dewasa",
        d: "Remaja",
        correct: "a",
    },
    {
        question: "Apa yang anda lakukan jika anda mengalami gejala COVID19?",
        a: "Bertemu orang sekitar",
        b: "Menyentuh benda sekitar",
        c: "Berkeliaran",
        d: "Isolasi mandiri",
        correct: "d",
    },
    {
        question: "Apa itu isolasi mandiri?",
        a: "Tetap tinggal dirumah",
        b: "Pergi bekerja",
        c: "Pergi ke tempat beribadah untuk beribadah",
        d: "Pergi ke tempat makan",
        correct: "a",
    },
];

const quiz = document.getElementById('quiz')
const answerEls = document.querySelectorAll('.answer')
const questionEl = document.getElementById('question')
const a_text = document.getElementById('a_text')
const b_text = document.getElementById('b_text')
const c_text = document.getElementById('c_text')
const d_text = document.getElementById('d_text')
const submitBtn = document.getElementById('submit')

let currentQuiz = 0
let score = 0

loadQuiz()

function loadQuiz() {
    deselectAnswers()

    const currentQuizData = quizData[currentQuiz]

    questionEl.innerText = currentQuizData.question
    a_text.innerText = currentQuizData.a
    b_text.innerText = currentQuizData.b
    c_text.innerText = currentQuizData.c
    d_text.innerText = currentQuizData.d
}

function deselectAnswers() {
    answerEls.forEach(answerEl => answerEl.checked = false)
}

function getSelected() {
    let answer

    answerEls.forEach(answerEl => {
        if(answerEl.checked) {
            answer = answerEl.id
        }
    })

    return answer
}

submitBtn.addEventListener('click', () => {
    const answer = getSelected()
    
    if(answer) {
        if(answer === quizData[currentQuiz].correct) {
            score++
        }

        currentQuiz++

        if(currentQuiz < quizData.length) {
            loadQuiz()
        } else {
            let nilai = (score);
            quiz.innerHTML = `
                <h2>Kamu mendapatkan nilai ${nilai}</h2>

                <button onclick="location.reload()" style="
                            background: #1e5474;
                            color: white;
                            text-decoration: none;
                            padding: 5px 10px;
                            display: inline-block;
                            margin-top: 0px;
                            border-radius: 3px;
                            width: 224px;
                            ">Ulangi</button>
            `
        }
    }
})

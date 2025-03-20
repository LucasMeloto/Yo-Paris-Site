// Fazer o menu mobile funcionar
const hamburger = document.querySelector(".hamburger");
const nav = document.querySelector(".nav-burg");

hamburger.addEventListener("click", () => nav.classList.toggle("active"));
    


// ADICIONANDO O OUVINTE  PARA O EVENTO SCROLL
window.addEventListener('scroll', function() {
    if (this.window.scrollY >= 0) {
        document.querySelector('.cabecalho').classList.add('fixed-scroll');
    } else {
        document.querySelector('.cabecalho').classList.remove('fixed-scroll');
    }
});


// Fazer o filtro funcionar
const filtrobtn = document.querySelector(".filtros"),
    items = document.querySelectorAll(".item");

filtrobtn.addEventListener("click", () => {
    filtrobtn.classList.toggle("active");
});

document.querySelectorAll('.filtros').forEach(function(filtro) {
    filtro.addEventListener('click', function() {
        const target = document.querySelector(filtro.getAttribute('data-target'));
        console.log("Clicou no filtro:", filtro);
        if (target) {
            target.classList.toggle('active');
            console.log("Classe 'active' aplicada no alvo:", target);
        } else {
            console.error("Elemento alvo não encontrado");
        }
    });
});

function updatePrice(value) {
    document.getElementById("minPrice").innerText = value;
  }

items.forEach(item => {
    item.addEventListener("click", () => {
        item.classList.toggle("checked");

        let checked = document.querySelectorAll(".checked"),
            btnText = document.querySelector(".btn-text");

        if (checked && checked.length > 0) {
        } else {
        }
    });
});
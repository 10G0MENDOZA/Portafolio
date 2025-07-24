document.addEventListener("DOMContentLoaded", () => {
    const texto = "Apasionado por el desarrollo web, especializado en interfaces modernas y escalables usando tecnologías como HTML, CSS, JavaScript, PHP, Laravel y React. Comprometido con crear experiencias digitales que impacten.";
    const destino = document.getElementById("typewriter-index");
    let index = 0;
    let yaEscrito = false;

    function escribir() {
        if (index < texto.length) {
            destino.innerHTML += texto.charAt(index);
            index++;
            setTimeout(escribir, 40);
        }
    }

    // Cuando la sección aparece en pantalla, empieza a escribir
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !yaEscrito) {
                escribir();
                yaEscrito = true;
            }
        });
    });

    observer.observe(destino);
});

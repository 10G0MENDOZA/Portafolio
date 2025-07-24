
document.addEventListener("DOMContentLoaded", () => {
    const texto = "Soy Diego Mendoza, un desarrollador frontend apasionado por crear soluciones digitales limpias, atractivas y funcionales.";
    const destino = document.getElementById("typewriter-text");
    let index = 0;

    // Detectar si el texto ya se escribió para no repetir
    let yaEscrito = false;

    // Función que escribe letra por letra
    function escribir() {
        if (index < texto.length) {
            destino.innerHTML += texto.charAt(index);
            index++;
            setTimeout(escribir, 40); // velocidad de escritura
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


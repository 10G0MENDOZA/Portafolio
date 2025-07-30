function ocultafoto () {



const boton = document.getElementById("botn-menu")  ;   
const imagen = document.getElementById("imagen-responsive");

boton.addEventListener("clik", () => {
    imagen.classList.toggle("oculta");

});
}
const imagenes = [
  'img/menu_principal2_.png',
  'img/proyecto2.jpg',
  'img/proyecto3.jpg'
];

let indiceActual = 0;

function abrirModal(indice) {
  indiceActual = indice;
  document.getElementById('modalImagen').style.display = 'flex';
  document.getElementById('imagenModal').src = imagenes[indice];
  document.body.style.overflow = 'hidden';
}

function cerrarModal() {
  document.getElementById('modalImagen').style.display = 'none';
  document.body.style.overflow = 'auto';
}

function cambiarImagen(direccion) {
  indiceActual += direccion;
  if (indiceActual < 0) indiceActual = imagenes.length - 1;
  if (indiceActual >= imagenes.length) indiceActual = 0;
  document.getElementById('imagenModal').src = imagenes[indiceActual];
}

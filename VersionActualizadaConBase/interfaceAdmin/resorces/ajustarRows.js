const textarea = document.getElementById('CuadroTextosAjustables');

textarea.addEventListener('input', () => {
    textarea.style.height = 'auto'; // Restablecer la altura a auto para calcular la altura real del contenido
    textarea.style.height = textarea.scrollHeight + 'px'; // Establecer la altura del textarea según el contenido
});
const input = document.getElementById('imagenInput');
const container = document.getElementById('imagenContainer');

input.addEventListener('change', () => {
    const file = input.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = new Image();
            img.src = e.target.result;
            container.innerHTML = ''; // Limpiar contenido previo
            container.appendChild(img); // Agregar la imagen al contenedor
        }
        reader.readAsDataURL(file);
    }
});

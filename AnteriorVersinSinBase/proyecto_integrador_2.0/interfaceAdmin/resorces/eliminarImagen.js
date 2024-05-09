const imagenInput = document.getElementById('imagenInput');
        const imagenContainer = document.getElementById('imagenContainer');
        const discardButton = document.getElementById('btnEliminar');
        const label = imagenContainer.querySelector('.label');

        // Mostrar el nombre de la imagen seleccionada
        imagenInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                label.textContent = file.name;
                discardButton.style.display = 'inline-block';
            } else {
                label.textContent = 'Ingresa una imagen...';
                discardButton.style.display = 'none';
            }
        });

        // Descartar la imagen seleccionada
        discardButton.addEventListener('click', function() {
            imagenInput.value = ''; // Vaciar el valor del input file
            label.textContent = 'Ingresa una imagen...';
            discardButton.style.display = 'none';
        });
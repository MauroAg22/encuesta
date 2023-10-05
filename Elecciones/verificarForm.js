function validarFormulario() {
    let dniInput = document.forms["miFormulario"]["dni"];
    let dni = dniInput.value.trim(); // Obtener el valor del campo y quitar espacios en blanco

    // Verificar si el campo está vacío
    if (dni === "") {
        alert("El campo DNI no puede estar vacío");
        dniInput.focus(); // Colocar el foco en el campo DNI
        return false; // Evitar que el formulario se envíe
    } else if (isNaN(dni)) {
        alert("El campo DNI debe contener solo números");
        dniInput.focus(); // Colocar el foco en el campo DNI
        return false; // Evitar que el formulario se envíe
    } else {
        document.getElementById("btnVotar").disabled = false;
        return true;
    }

    // Si se pasa ambas validaciones, el formulario se enviará
}
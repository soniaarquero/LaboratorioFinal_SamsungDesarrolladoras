function consultarUsuarios() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById("resultadoConsulta").innerHTML = xhr.responseText;
            } else {
                console.log("Error al realizar la consulta");
            }
        }
    };
    xhr.open("GET", "register.php?consulta=true", true);
    xhr.send();
}

document.addEventListener("DOMContentLoaded", function() {
    // Agregar evento de escucha al formulario de registro
    var registrationForm = document.getElementById("registrationForm");
    registrationForm.addEventListener("submit", function(event) {
        event.preventDefault(); // Evitar el envío del formulario por defecto

        // Obtener los valores de los campos del formulario
        var nombre = document.getElementById("nombre").value;
        var apellido1 = document.getElementById("apellido1").value;
        var apellido2 = document.getElementById("apellido2").value;
        var email = document.getElementById("email").value;
        var login = document.getElementById("login").value;
        var password = document.getElementById("password").value;

        // Validar los campos del formulario antes de enviar los datos
        if (
            nombre.trim() === "" ||
            apellido1.trim() === "" ||
            apellido2.trim() === "" ||
            email.trim() === "" ||
            login.trim() === "" ||
            password.trim() === ""
        ) {
            alert("Por favor, complete todos los campos del formulario.");
            return;
        }

        if (!validateEmail(email)) {
            alert("Por favor, ingrese un correo electrónico válido.");
            return;
        }

        if (password.length < 4 || password.length > 8) {
            alert("La contraseña debe tener entre 4 y 8 caracteres.");
            return;
        }

        // Crear un objeto FormData para enviar los datos al archivo PHP
        var formData = new FormData();
        formData.append("nombre", nombre);
        formData.append("apellido1", apellido1);
        formData.append("apellido2", apellido2);
        formData.append("email", email);
        formData.append("login", login);
        formData.append("password", password);

        // Enviar la solicitud AJAX al archivo PHP para registrar los datos
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    alert(xhr.responseText); // Mostrar mensaje de éxito o error
                    registrationForm.reset(); // Limpiar el formulario
                } else {
                    alert("Error al registrar los datos.");
                }
            }
        };
        xhr.open("POST", "register.php", true);
        xhr.send(formData);
    });
});

function validateEmail(email) {
    // Expresión regular para validar el formato del correo electrónico
    var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return emailRegex.test(email);
}

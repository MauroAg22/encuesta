// Definir una función para realizar la solicitud AJAX y mostrar los datos
function cargarDatos() {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "archivo.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let respuesta = xhr.responseText;
            let resultados = JSON.parse(respuesta);

            const resultadoDiv = document.getElementById("resultado");
            
            resultadoDiv.innerHTML = "<ul>";
            for (let candidato in resultados) {
                resultadoDiv.innerHTML += "<li>El " + candidato + " tiene " + resultados[candidato] + " acumulados</li>";
            }
            resultadoDiv.innerHTML += "</ul>";



            const porcentajes = document.getElementById("porcentajes");
            let totalVotos = resultados["candidato1"] + resultados["candidato2"] + resultados["candidato3"] + resultados["candidato4"];
            let promedios = [], i = 0;

            for (let candidato in resultados) {
                promedios.push(parseFloat((resultados[candidato] / totalVotos * 100).toFixed(2)));
            }


            porcentajes.innerHTML = "<ul>";
            
            for (let candidato in resultados) {
                porcentajes.innerHTML += "<li>El " + candidato + " tiene un promedio de " + promedios[i] + "% de votos</li>";
                i++;
            }

            porcentajes.innerHTML += "</ul>";


        }
    };
    xhr.send();
}

// Llamar a la función cargarDatos cuando la página se carga
window.onload = cargarDatos;

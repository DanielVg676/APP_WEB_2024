function operaciones() {
    let n1 = parseFloat(document.getElementById("n1").value);
    let tipoope = document.getElementById("tipo").value;
    let ope = 0;
    let backgroundImage = '';

    if (isNumber(n1)) {
        switch (tipoope) {
            case "pesos-dolares":
                ope = n1 * 0.050;
                backgroundImage = 'dolares.png';
                break;
            case "dolares-pesos":
                ope = n1 * 20.02;
                backgroundImage = 'pesos.jpeg';
                break;
            case "euros-pesos":
                ope = n1 * 21.69;
                backgroundImage = 'pesos.jpeg';
                break;
            case "pesos-euros":
                ope = n1 * 0.046;
                backgroundImage = 'euros.jpg';
                break;
        }

        let respuesta = document.getElementById("resultado");
        respuesta.innerHTML = `
            <div class="resultado-container" style="background-image: url('${backgroundImage}'); background-size: cover; padding: 20px; border-radius: 8px;">
                <h2>Resultado de la Conversión</h2>
                <p><strong>${n1}</strong> convertido de <strong>${tipoope.replace("-", " a ")}</strong> es igual a:</p>
                <h1>${ope.toFixed(2)}</h1>

            </div>`;
    } else {
        let respuesta = document.getElementById("resultado");
        respuesta.innerHTML = `
            <div class="error-container">
                <h2>Error</h2>
                <p>Por favor, ingrese un número válido.</p>
            </div>`;
        alert('Ingrese solo un número, por favor...');
    }
}

function isNumber(n) {
    return !isNaN(n) && isFinite(n);
}

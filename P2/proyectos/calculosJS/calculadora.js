function operaciones() {

    let n1 = parseInt(document.getElementById("n1").value);
    let n2 = parseInt(document.getElementById("n2").value);
    let tipoope = document.getElementById("tipo").value

    if (isNumber(n1) && isNumber(n2)) {
        switch (tipoope) {
            case "+":
                ope = n1 + n2; break;
            case "-":
                ope = n1 - n2; break;
            case "/":
                ope = n1 / n2; break;
            case "*":
                ope = n1 * n2; break;
        }
        let respuesta = document.getElementById("resultado");
        respuesta.innerHTML = `<h3>${n1} ${tipoope} ${n2} = ${ope}</h3>`
    }
    else {
        let respuesta = document.getElementById("resultado");
        respuesta.innerHTML = `<h3>Porfavor ingrese un numero</h3>`
        alert('Ingrese solo un numero por favor...')
    }
}

function isNumber(n) {
    return !isNaN(parseInt(n) && isFinite(n));
}
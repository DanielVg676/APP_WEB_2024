//Este es un comentario

/*Esto es un comentario
de varias lineas

*/


//alertas
// alert("Soy una ventana de alerta")

//variables

var nombre = "Daniel Aurelio Villarreal Gallegos";
let nombre2 = "Daniel el travieso";
let edad=20;
let logica=true;
let=estatura=1.80;

//Mostrar concatenacion

let concatenacion="La persona: "+nombre+", tiene la edad de: "+edad+" años";

//Escribir en el documento con variable
//document.write(concatenacion);

//Escribir algo en el documento sin variable
//document.write("La persona: "+nombre+", tiene la edad de: "+edad+" años")

//Para darle un enter al texto podemos usar el "ln" o el "br" pero concatenado

//document.writeln(concatenacion);
//document.write(concatenacion + "br");


//Mostrar en pantalla con document.getElementByID

let datos=document.getElementById("informacion");
datos.innerHTML=`
    <br>
    <hr>
    <h1> La persona: ${nombre}, tiene una edad de: ${edad} años</h1>
    <hr>
`;

//let datos2 = document.getElementById("informacion2");
datos.innerHTML+= `
    <h1>La edad es: ${edad} </h1>
`;

//condicionales if

if (estatura>=1.90)
    {
    //document.write("Es una persona alta")

    datos.innerHTML+=`
        <hr>
        <h3>Es una persona de estatura preomdedio</h3>
        
    `;
}
else
    //document.write("Es una persona de estatura promedio")

    datos.innerHTML+=`
        <hr>
        <h3>Es una persona de estatura promedio</h3>
        <hr>
    `;


    //Condicionales if



for(let i=1;i<=5;i++)
{
    datos.innerHTML+=`<hr><h3>For: el numero es: ${i} </h3>`
}


let i=1;
while(i<=5)
{
    datos.innerHTML+=`<hr><h3>while: el numero es: ${i} </h3>`
    i++;
}





//funciones

// 1.- Que no recibe parametros y no regresa valor

function suma()
{
    let n1=2;
    let n2=4;
    suma= n1+n2;
    console.log("La suma es: "+suma)
    datos.innerHTML+=`<hr><h3>La suma es: ${suma} </h3>`
}

suma()



//2.- Que no recibe parametros pero si regresa valores

function suma2()
{
    let n1=2;
    let n2=4;
    suma= n1+n2;
    return suma;
}

let sum=suma2()
datos.innerHTML+=`<hr><h3>La suma es: ${sum} </h3>`



//3.- Que no recibe parametros y no regresa valor

function suma3(numero1, numero2)
{
    suma= numero1+numero2;
    datos.innerHTML+=`<hr><h3>La suma es: ${suma} </h3>`
}

suma3(2,3)


//4.- Recibe y regresa valor

function suma4(numero1, numero2)
{
    let n1=numero1;
    let n2=numero2;
    suma=n1+n2;
    return suma;
}

sum=suma4(8,8);
datos.innerHTML+=`<hr><h3>La suma es: ${sum} </h3>`



//arreglos

let animales = []
animales[0]="perico";
animales[1]="Leon";
animales[2]="Perro";

//let animales [leon, perico, gato, zorro];

console.log(animales)
datos.innerHTML+=`<hr><h3>El rey de la selva es: ${animales[1]}</h3>`;


const tamano= animales.length
for (let i=0; i<=tamano ;i++)
{
    console.log(animales)
    datos.innerHTML+=`<hr><h3>El animal es: ${animales[i]}</h3>`;
    i++
}

//Funciones de flecha


//Funciones normales

function sumaR(a,b)
{
    return a+b
}

datos.innerHTML+=`<hr><h3>La suma R es: ${sumaR(2,3)}</h3>`;

const sumaFlecha=(a,b)=>a+b;

datos.innerHTML+=`<hr><h3>La suma de flecha es: ${sumaFlecha(5,23)}</h3>`;


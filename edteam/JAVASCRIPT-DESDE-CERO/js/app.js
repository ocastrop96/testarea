/**
 * ARRAYS
 */
// let amigos = ["Pedro", "Gabriel", "Erick", "Daniel"]
// console.log(amigos);

/**
 * MÉTODOS QUE MODIFICAN EL ARRAY
 */
// Agregar elementos al array  MÉTODO PUSH()

// let dato = amigos.push("Gastón");

// Quitar elementos al array MÉTODO POP()

// let dato = amigos.pop();
// console.log(dato);
// console.log(amigos);

/** MÉTODOS QUE NO MODIFICAN EL ARRAY */

// Partir nuestro array en 2 arrays

// let dato = amigos.slice(0, 2);
// console.log(dato);
// console.log(amigos);

// for (let i = 0; i < amigos.length; i++) {
//     console.log(amigos[i]);
// }

/** FOR EACH DE ARRAY 
 *  Necesita como parametro una función
*/
// let dato = amigos.forEach(amigo => { `Hola ${amigo}` });
// let dato = amigos.map(amigo => `Hola ${amigo}`);

// console.log(amigos);
// console.log(dato);

/** DIFERENCIAS ENTRE FOREACH Y MAP
 * 
 * FOREACH: PERMITE RECORRER EL ARREGLO
 * 
 * MAP: PERMITE NO SOLO RECORRER EL ARREGLO, SINO AÑADIRLE MÁS ATRIBUTOS COMO UN NUEVO ARREGLO
 * 
 */

//MÉTODOS PARA REALIZAR BUSQUEDAS EN UN ARRAY

// FILTER()
// let numeros = [10, 436, 45, -74, 33, 9, 2, 54]
// let nuevoArray = [];
// usando map
// numeros.map(num=>{
//     if (num > 20) {
//         nuevoArray.push(num);
//     }
// })
// Usando filter
// let dato2 = numeros.filter(num => num > 20)

// console.log(dato2);
// console.log(numeros);

// Usando find Devuelve el Dato que buscamos

// let dato3 = numeros.find(num => num % 2 === 1)
// console.log(dato3);

// Usando includes devuelve True o False

// let dato4 = numeros.includes(35)
// console.log(dato4);

// Usando some devuelve true o false, en base a condición

// let dato5 = numeros.some(num => num < 0)
// console.log(dato5);

// Usando every 

// let dato6 = numeros.every(num => typeof num === "number")
// console.log(dato6);



/***************
 * STRINGS
 */
// Slice corta texto
let texto = "Alberto Junior Quiroga Muñóz"
let dato = texto.slice(3,10)
// console.log(dato);
// Split divide texto

let textosp = "Alberto Junior Quiroga Muñóz"
let datosp = textosp.split(" ")
console.log(datosp);

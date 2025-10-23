var age;
console.log(age); // undefined


function doSomething(name) {

    console.log(name);
}

doSomething(); // undefined

let person = {name: "Person1"};

console.log(person.name); // undefined
console.log(person.age); // undefined

let fruits = ["Apple", "Banana", "Orange"];

console.log(fruits[0]); // undefined
console.log(fruits[5]); // undefined

var varNull = null;
var initialized;

console.log(varNull==initialized);  // null
console.log(varNull===initialized); // false

console.log(typeof null);      // object
console.log(typeof undefined); // undefined

var age;
console.log(age); // undefined


function doSomething(name) {

    console.log(name);
}

doSomething(); // undefined

let person = {name: "Person1"};

console.log(person.name); // undefined
console.log(person.age); // undefined